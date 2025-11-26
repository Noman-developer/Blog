<?php include'headers/header.php' ?>
<?php include'navbar.php' ?>

<style>
    .sidebar:hover{
        background-color: lightblue;
    }
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
    @media only screen and (min-width: 767px){
        .card-header{
            padding-left: 28%;
        }
    }
    @media only screen and (max-width: 767px){
        .security-con{
            margin-bottom: 20%;
        }
    }
    @media only screen and (max-width: 391px){
        .security-con{
            margin-bottom: 25%;
        }
    }
    @media only screen and (max-width: 360px){
        .security-con{
            margin-bottom: 35%;
        }
    }
    @media only screen and (max-width: 336px){
        .security-con{
            margin-bottom: 50%;
        }
    }
    @media only screen and (max-width: 289px){
        .security-con{
            margin-bottom: 100%;
        }
        .featured-con{
            padding-top: 10%;
        }
    }
    @media only screen and (max-width: 259px){
        .featured-con{
            padding-top: 30%;
        }
    }
    @media only screen and (max-width: 259px){
        .featured-con{
            padding-top: 50%;
        }
    }
</style>
<div class="container security-con">
    <div class="container row align-items-center m-auto security">
        <div class="col-md-6">
            <img class="w-75" src="images/lock.webp" alt="Secured">
        </div>
        <div class="col-md-6">
            <h2>
                How we best?
            </h2>
            <p>
                We provide secure environment to our Readers and users. We use following security measures for Risks.
                <ul style="font-size: 18px;">
                    <li><b>Secure hosting platform: </b>We use best secured Hosting including SSL's for security.</li> 
                    <li><b>Up-to-Date: </b>We keep our data and security Antiviruses up-to-date.</li>
                    <li><b>HTTPS encryption: </b>We provides HTTPS security to our customers.</li>
                </ul>  
            </p>
        </div>
    </div>
</div>
    <div class="container-fluid featured-con">
            <h1 class="text-muted text-center pt-5 pb-5">Featured Blogs</h1>
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
    $blogs = mysqli_query( $conn, "SELECT * FROM `blogs`" );
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

    




<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>
