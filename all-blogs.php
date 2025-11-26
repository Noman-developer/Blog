<?php
session_start();
if ( !isset($_SESSION['admin']) ) {
    header("Location:login.php");
}
?>

<?php include'headers/header.php' ?>
<?php include'admin-nav.php' ?>


<style>
    .blog-card{
        margin-bottom: 20px;
    }
</style>


<div class="container" style="min-height: 100vh;">
    <h1 class="text-muted text-center pt-5 pb-5">All Blogs</h1>
    <div class="card-group">
        
    <?php
    $blogs = mysqli_query( $conn, "SELECT * FROM `blogs`" );
    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $result['id'], $key);
          echo "
                 <div class='col-xl-4 col-md-6 col-sm-12'>
              <div class='card mb-4'>
                        <img class='card-img-top' style='width:100; height: 300px;' src='".$image_src."' >
                        <div class='card-body overflow-hidden' style='height: 20vh;'>
                            <h5 class='card-title'>".$result['title']."</h5>
                            <p class='card-text'>".$result['description']."</p>
                        </div>
                        <div class='card-footer d-flex'>
                        <a href='update-blog.php?id=".urlencode(base64_encode($result['id'])).'&mac='.urlencode($mac)."' id='id' class='btn btn-primary text-light w-100'>Update</a>  
                        <a href='delete-blog.php?id=".$result['id']."' id='id' class='btn btn-danger text-light w-100 ml-2'>Delete</a>  
                        </div>
                 </div>
          </div>
                  
          "; 
        }
      }
      else{
        echo "
            <h3 class='text-center text-muted'>No Blogs currently</h3>
        ";
      }
    }
?>  
</div>


</div>
<?php include'headers/copyright.php' ?>

<?php include'headers/footer.php' ?>