<?php include 'headers/connection.php';?>
<?php include'headers/header.php' ?>
<?php
session_start();
if ( !isset($_SESSION['admin']) ) {
    header("Location:login.php");
}
?>
<?php
$id = $_GET['id'];

$del = "DELETE from blogs where id = '$id'";
$result = mysqli_query($conn, $del);
if($result){
    $msg = "Deleting! wait";
    $sts = "success";
    header("Refresh: 3; url=all-blogs.php");
  }else{
    $msg = "Not Deleted!";
    $sts = "danger";
    header("Refresh: 2; url=all-blogs.php");
  }
?>
			<?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$sts?> text-center font-weight-bold p-0 m-0">
                  <?=$msg?>
                </div>
            <?php endif ?>

<div class="p-0 m-0 text-center" style="width:100%; height: 100vh; background-color: #020202;">
  <img src="images/5sec-count.gif">
</div>
<?php include'headers/footer.php' ?>