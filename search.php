<?php include 'headers/header.php'; ?>
<?php include 'usernav.php'; ?>
<?php 
    $searched = $_GET['search'];
?>

<div class="container" style="min-height: 100vh;">
    <h3 class="text-muted text-center pt-5 pb-5">Results against "<?php echo "$searched" ?>"</h3>
<div style="min-height: 20vh;">
    <div class='card-group'>


    <?php
    $blogs = mysqli_query( $conn, "SELECT * FROM `blogs` where (LOWER(category) LIKE LOWER('%$searched%')) or (LOWER(tags) LIKE LOWER('%$searched%'))" );
    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $result['id'], $key);
          echo "
                 <div class='col-md-4 col-sm-6 col-xl-3 card-width'>
              <div class='card ml-lg-2 mb-lg-5'>
                        <img class='card-img-top' style='width:100%; height: 300px' src='".$image_src."' >
                        <div class='card-body overflow-hidden' style='min-height: 20vh;'>
                            <h5 class='card-title'>".$result['title']."</h5>
                        </div>
                        <div class='card-footer'>
                            <a href='fullblog.php?id=".urlencode(base64_encode($result['id'])).'&mac='.urlencode($mac)."' id='id' class='btn btn-primary text-light w-100'>Read</a>  
                        </div>
                 </div>
          </div>
                  
          "; 
        }
      }


      else{
        echo "
            <h3 class='alert alert-danger w-100 text-center text-danger m-auto'>(&#128566;Sorry! No Result Found against this Category/Tag)</h3>
        ";
    }
}
        ?>
    </div>
        <h3 class='text-success pt-5 mt-5 mb-3'>->But you can checkout other Posts</h3>
    <div class='card-group'>
        <?php
        $blogs = mysqli_query( $conn, "SELECT * FROM `blogs` LIMIT 4" );
    if ($blogs) {

      if (mysqli_num_rows($blogs) > 0) {
        while ( $result = mysqli_fetch_assoc( $blogs ) ) { 
        $image = $result['img'];
        $image_src = "uploads/blogs/".$image; 
        $key = "Blanksky";
        $mac = hash_hmac('sha256', $result['id'], $key);
          echo "
          <div class='col-md-4 col-sm-6 col-xl-3 card-width'>
              <div class='card ml-lg-2 mb-lg-5'>
                        <img class='card-img-top' style='width:100%; height: 300px' src='".$image_src."' >
                        <div class='card-body overflow-hidden' style='min-height: 20vh;'>
                            <h5 class='card-title'>".$result['title']."</h5>
                        </div>
                        <div class='card-footer'>
                            <a href='fullblog.php?id=".urlencode(base64_encode($result['id'])).'&mac='.urlencode($mac)."' id='id' class='btn btn-primary text-light w-100'>Read</a>  
                        </div>
                 </div>
          </div>
                  
          "; 
        }
      }
    }
      }
    }
?>

   </div>  

</div>


</div>

<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>