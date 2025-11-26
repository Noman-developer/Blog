<?php include'headers/header.php' ?>

<!-- PHP Inclusion -->
<?php
include'headers/connection.php';
session_start();
if ( !empty($_POST)) {
    
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $check = mysqli_query( $conn,"SELECT * FROM login WHERE (email='$email' and password='$password')" );
    if ($check) {
        
        if (mysqli_num_rows($check)>0) {
            $admin = mysqli_fetch_assoc( $check );
            $_SESSION['admin'] = $admin;
            $msg = "Logged in successfully!";
            $sts = "success";
            header("Refresh: 2; url=admin.php");
        }
        else{
            $msg = "Invalid Email/Password";
            $sts = "danger";
            header("Refresh: 2; url= login.php");
        }
        
    }
    else{
        $msg = "Invalid Email/Password";
        $sts = "danger";

        header("Refresh: 5; url=login.php");
    }
   }
?>
      <?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$sts?> text-center font-weight-bold">
                  <?=$msg?>
                </div>
      <?php endif ?>
<section class="vh-100 mt-5">
  <div class="container-fluid h-custom"  style="height: 100vh;">
    	<h1 class="text-center">Login to Account</h1>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="images/draw.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <form method="POST">

          <!-- Email input -->
          <div class="form-outline mb-4">
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" name="email">
            <label class="form-label" for="form3Example3">Email address</label>
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password">
            <label class="form-label" for="form3Example4">Password</label>
          </div> 
          <div class="text-center text-lg-start mt-4 pt-2 mb-4">
            <a href="index.php" class="btn btn-secondary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>
