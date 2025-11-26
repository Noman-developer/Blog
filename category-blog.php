<?php include'headers/header.php' ?>
<?php include'usernav.php' ?>
<style>
    @media only screen and (max-width: 1025px) and (min-width: 768px){
        .category{
            font-size: 20px;
        }
    }
    @media only screen and (min-width: 576px){
        .card-width{
            width: 50% !important;
        }
    }
</style>



<div class="container p-0" style="height: 100vh;">
        <div>
           <div class="card-group">
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
    $blogs = mysqli_query( $conn, "SELECT b.* FROM blogs AS b INNER JOIN categories AS c ON b.category_id = c.id WHERE c.id = '$id';");

    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $result['id'], $key);
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
          echo "
          <div class='col-md-4 col-sm-6 col-xl-3 card-width'>
              <div class='card ml-lg-2 mb-lg-5 mt-4'>
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
            <h3 class='m-auto text-muted pt-5 pb-5'>No Blog currently for against this Category</h3>
        ";
      }
    }
?>
</div>

        
    </div>
    <div class="m-auto pt-5 pb-5">
    	<a href="index.php" class="btn btn-primary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i> Home</a>
    </div>
</div>


<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>