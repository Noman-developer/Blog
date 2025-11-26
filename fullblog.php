<?php include'headers/header.php' ?>
<?php include'usernav.php' ?>

<div class="container mt-5 mb-5 card shadow">
        <div>
           
  <?php
    $key = "Blanksky";
    $decrypted_id = urldecode(base64_decode($_GET['id']));
    $decrypted_mac = urldecode($_GET['mac']);
    if (hash_equals(hash_hmac('sha256', $decrypted_id, $key),$decrypted_mac)) {
      $id = $decrypted_id;
    }
    else{
      die('Invalid Id');
    }
    $blogs = mysqli_query( $conn, "SELECT * FROM `blogs`  WHERE id = '$id'" );
    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
          echo "
                 <h2 class='text-muted text-center pt-5 pb-5'>".$result['title']."</h2>
                 <div class='text-center pb-5 pt-5'>
                 	<div>
                 		<img class='border shadow w-50' height='350px' src='".$image_src."' >
                 	</div>
                 	<div class='text-left pt-5'>
                 		<p class='card-text'>".$result['description']."</p>
                        <hr class='mt-5 mb-5 bg-success p-1'>
                 		<p class='card-text'><b>Tags:</b> ".$result['tags']."</p>
                        <p class='card-text'><b>Categories:</b> ".$result['category']."</p>
                 	</div>
                 </div>
                 				                  
          "; 
        }
      }
      else{
        echo "
            <h3 class='text-center text-muted'>No Featured Blog currently</h3>
        ";
      }
    }
?>

        
    </div>
    <div class="m-auto">
    	<a href="index.php" class="btn btn-primary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i> Home</a>
    </div>

    <!-- Other featured -->
    <div class="container-fluid featured-con">
            <h1 class="text-muted text-center pt-5 pb-5">Related Articles</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card-group">
                <?php
    $blogs = mysqli_query( $conn, "SELECT * FROM `blogs` LIMIT 3" );
    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $result['id'], $key);
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
          echo "
          <div class='col-md-4 col-sm-6 col-xl-4 card-width'>
              <div class='card ml-lg-2 mb-3'>
                        <img class='card-img-top' style='width:100; height: 300px' src='".$image_src."' >
                        <div class='card-body overflow-hidden' style='height: 20vh;'>
                            <h5 class='card-title'>".$result['title']."</h5>
                        </div>
                        <div class='card-footer'>
                            <p class='text-muted'><b>Posted: </b>".$result['time']."</p>
                            <a href='fullblog.php?id=".urlencode(base64_encode($result['id'])).'&mac='.urlencode($mac)."' id='id' class='btn btn-primary text-light w-100'>Read</a>  
                        </div>
                 </div>
          </div>
                  
          "; 
        }
      }
      else{
        echo "
            <h3 class='text-center text-muted'>No Featured Blog currently</h3>
        ";
      }
    }
?>  
            </div>
    </div>

    </div>
            
</div>



</div>





<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>