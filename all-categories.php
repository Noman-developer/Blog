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


<div class="container-fluid" style="min-height: 100vh;">
    <h1 class="text-muted text-center pt-5 pb-5">All Categories</h1>
    <table class="table table-striped w-75 m-auto">
  <thead>
    <tr class="bg-dark text-light text-center">
      <th scope="col">Sr.</th>
      <th scope="col">Categories</th>
      <th scope="col">Time Inserted</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    
    <?php
    $cat = mysqli_query( $conn, "SELECT * FROM `categories`" );
    if ($cat) {

      if (mysqli_num_rows($cat) > 0) {
        $count=1;
        while ( $result = mysqli_fetch_assoc( $cat ) ) { 
          echo "
                 <tr scope='row' class='text-center'>
                    <td>$count</td>
                    <td>".$result['categories']."</td>
                    <td>".$result['time']."</td>
                    <td><a href='delete-category.php?id=".$result['id']."' id='id' '>Delete</a> | <a href='update-category.php?id=".$result['id']."'>Update</a></td>
                 </tr>  
                  
          ";
          $count++; 
        }
      }
      else{
        echo "
            <h3 class='text-center text-muted'>No Featured Blog currently</h3>
        ";
      }
    }
?>  

  </tbody>
</table>
</div>

<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>