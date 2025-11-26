<?php
include'headers/connection.php';
session_start();
if ( !isset($_SESSION['admin']) ) {
    header("Location:login.php");
}
?>
<?php 
if (!empty($_POST)) {
  $category = $_POST['category'];  
  $q = mysqli_query($conn,"INSERT INTO categories (categories) VALUES('$category')");
  if($q){
    $msg = "Submitted successfully! Reloading 2 Seconds";
    $sts = "success";
    header("Refresh: 3; url=all-categories.php");
  }else{
    $msg = "Not Submitted!";
    $sts = "danger";
    header("Refresh: 2; url=add-category.php");


  }
}
?>

<?php include'headers/header.php' ?>
<?php include'admin-nav.php' ?>


<div class="container" style='height:50vh;'>
        <h3 class="text-center">Add new Category</h3>
    <div class="row" id="row_style">
        <div class="col-md-4 offset-md-4">
          <form method="POST" enctype="multipart/form-data">
            <?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$sts?> text-center font-weight-bold">
                  <?=$msg?>
                </div>
            <?php endif ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Add Category" name="category" required>
            </div>
            <div class="form-group d-flex">
                <a href="admin.php" class="btn btn-secondary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                <button class="btn btn-primary" type="submit" id="submit">Submit</button>
            </div>
          </form>
        </div>
    </div>
</div>

<style>
    #row_style {
        margin-top: 30px;
    }

    #submit {
        display: block;
        margin: auto;
    }
</style>

<!-- you need to include the shieldui css and js assets in order for the charts to work -->
<link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script>
    $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })
</script>
<?php include'headers/copyright.php' ?>
<?php include'headers/footer.php' ?>