<?php include'headers/header.php' ?>
<!-- UpdateBlog -->
<?php
    $key = "Blanksky";
    $decrypted_id = urldecode(base64_decode($_GET['id']));
    $decrypted_mac = urldecode($_GET['mac']);
    if (hash_equals(hash_hmac('sha256', $decrypted_id, $key),$decrypted_mac)) {
      $id = $decrypted_id;
    }
    else{
      die('Invalid Id');
    };
$query = "SELECT * FROM blogs WHERE id = '$id'";
$result = mysqli_query($conn , $query);
$row = mysqli_fetch_assoc($result);
if (!empty($_POST)) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $tags = $_POST['tags'];
  $category = $_POST['category'];
  $imgName = "";
  if ( isset($_FILES['blog_img']) && $_FILES['blog_img']['name'] != "" ) {

    $imgName = $_FILES['blog_img']['name'];
    $target_dir = "uploads/blogs/";
    move_uploaded_file($_FILES['blog_img']['tmp_name'],$target_dir.$imgName);

  } 
  
  $q = mysqli_query($conn,"UPDATE blogs SET title='$title',description='$description',tags='$tags',category='$category',img='$imgName' WHERE id = '$id' ");
  if($q){
    $msg = "Updated successfully! Reloading 2 Seconds";
    $sts = "success";
    header("Refresh: 3; url=admin.php");
  }else{
    $msg = "Not Updated!";
    $sts = "danger";
    header("Refresh: 3; url=update-blog.php");


  }
}
?>
<?php include'admin-nav.php' ?>

<div class="container mt-5 mb-5 card shadow">
        <div>
     
    
            <form method='POST' enctype='multipart/form-data'>
            <?php if (!empty($msg)): ?>
                <div class='alert alert-<?=$sts?> text-center font-weight-bold'>
                  <?=$msg?>
                </div>
            <?php endif ?>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Title' name='title' value="<?php echo $row['title'] ?>" required>
            </div>
            <textarea id='editor' cols='50' rows='10' name='description' placeholder='Check old blog and replace with new-one here...'><?php echo $row['description'] ?></textarea required>
            <br>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Tags' name='tags' value="<?php echo $row['tags'] ?>" required>
            </div>
            <div class='form-group'>
                <input type='text' class='form-control' placeholder='Category' name='category' value="<?php echo $row['category'] ?>" required>
            </div>
            <div class='form-group'>
                <input type='file' class='form-control' name='blog_img' value="<?php echo $row['img'] ?>" required>
            </div>
            <div class='form-group d-flex'>
                <button class='btn btn-primary' type='submit' id='submit'>Update</button>
            </div>
          </form>
        
    </div>
    <div class="m-auto">
    	<a href="all-blogs.php" class="btn btn-secondary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i> Home</a>
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