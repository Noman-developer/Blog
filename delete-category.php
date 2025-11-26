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

$del = "DELETE from categories where id = '$id'";
$result = mysqli_query($conn, $del);
if($result){
    $msg = "Deleting! wait";
    $sts = "success";
    header("Refresh: 3; url=all-categories.php");
  }else{
    $msg = "Not Deleted!";
    $sts = "danger";
    header("Refresh: 3; url=all-categories.php");
  }
?>
			<?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$sts?> text-center font-weight-bold">
                  <?=$msg?>
                </div>
            <?php endif ?>
<div class="p-0 m-0" style="width:100%; height: 100vh;">
	<img style="width:100%; height: 100vh;" src="images/5sec-count.gif">
</div>
<?php include'headers/footer.php' ?>