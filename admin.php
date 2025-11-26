<?php
include "headers/connection.php";
session_start();
if ( !isset($_SESSION['admin']) ) {
    header("Location:login.php");
}
?>
<?php include'headers/header.php' ?>
<?php include'admin-nav.php' ?>



<style>
    .sidebar:hover{
        background-color: lightblue;
    }
</style>

<div class="container-fluid mb-5">
    <h1 class="text-muted text-center pt-5 pb-5">Today Blogs</h1>
            <div class="row">
                                <div class="col-md-2 shadow h-auto mb-3 pt-5">
                    <h2 class="category">Categories</h2>
                    <nav class="nav flex-column">
                                <?php
                            $blogs = mysqli_query( $conn, "SELECT * FROM `categories`" );
                            if ($blogs) {

                              if (mysqli_num_rows($blogs) > 0) {
                                while ( $fetched = mysqli_fetch_assoc( $blogs ) ) {  
                                    $key = "Blanksky";
                                    $mac = hash_hmac('sha256', $fetched['id'], $key);
                                  echo "
                                        <a href='category-blog.php?id=".urlencode(base64_encode($fetched['id'])).'&mac='.urlencode($mac)."' id='id' class='nav-link text-muted pl-0 pl-sm-2 sidebar'>".$fetched['categories']."</a>
                                          
                                  "; 
                                }
                              }
                              else{
                                echo "
                                    <h3 class='text-center text-muted'>No Category Added</h3>
                                ";
                              }
                            }
                        ?>
                    </nav>
                </div>
<div class="col-md-10">
    <div class="card-group">
        
    <?php
    $result = mysqli_query( $conn, "SELECT * FROM `blogs` WHERE DATE(`time`) = CURDATE()" );
    if ($result) {

      if (mysqli_num_rows($result) > 0) {
        while ( $row = mysqli_fetch_assoc( $result ) ) { 
        $image = $row['img'];
        $image_src = "uploads/blogs/".$image;
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $row['id'], $key); 
          echo "
                 <div class='col-xl-3 col-md-6 col-sm-12'>
              <div class='card ml-lg-2 mb-lg-5'>
                        <img class='card-img-top' style='width:100; height: 300px;' src='".$image_src."' >
                        <div class='card-body overflow-hidden' style='height: 20vh;'>
                            <h5 class='card-title'>".$row['title']."</h5>
                            <p class='card-text'>".$row['description']."</p>
                        </div>
                        <div class='card-footer'>
                        <a href='fullblog.php?id=".urlencode(base64_encode($row['id'])).'&mac='.urlencode($mac)."' id='id' class='btn btn-primary text-light w-100'>Read</a>  
                        </div>
                 </div>
          </div>
                  
          "; 
        }
      }
      else{
        echo "
            <h3 class='text-center text-muted'>No Blog Posted today</h3>
            <p class='text-center text-muted'><b>(<a class='text-decoration-none' href='addblog.php'>Add</a>)</b></p>
        ";
      }
    }
?>  
</div>

</div>
</div>

</div>


<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>