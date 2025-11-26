<?php
include'headers/connection.php';
session_start();
if ( !isset($_SESSION['admin']) ) {
    header("Location:login.php");
}
?>
<?php 
if (!empty($_POST)) {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $tags = $_POST['tags'];
  $category = $_POST['category'];
  $category_id = $_POST['category_id'];
  $imgName = "";
  if ( isset($_FILES['blog_img']) && $_FILES['blog_img']['name'] != "" ) {

    $imgName = $_FILES['blog_img']['name'];
    $target_dir = "uploads/blogs/";
    move_uploaded_file($_FILES['blog_img']['tmp_name'],$target_dir.$imgName);

  } 
  
  $q = mysqli_query($conn,"INSERT INTO blogs (title,description,tags,category,img,category_id) VALUES('$title','$description','$tags','$category','$imgName','$category_id')");
  if($q){
    $msg = "Submitted successfully! Reloading 2 Seconds";
    $sts = "success";
    header("Refresh: 3; url=all-blogs.php");
  }else{
    $msg = "Not Submitted!";
    $sts = "danger";
    header("Refresh: 3; url=all-blogs.php");
    }
}
?>

<?php include'headers/header.php' ?>
<?php include'admin-nav.php' ?>


<div class="container">
        <h3 class="text-center">Submit new post</h3>
    <div class="row" id="row_style">
        <div class="col-md-4 offset-md-4">
          <form method="POST" enctype="multipart/form-data">
            <?php if (!empty($msg)): ?>
                <div class="alert alert-<?=$sts?> text-center font-weight-bold">
                  <?=$msg?>
                </div>
            <?php endif ?>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" name="title" required>
            </div>
            <textarea id="editor" cols="30" rows="10" name="description" placeholder="Submit your text post here..."></textarea required>
            <br>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tags" name="tags" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Other Category" name="category" required>
            </div>


            <!-- Dynamic Options -->
            <?php 
                $sql = "SELECT * FROM categories";
                $result = mysqli_query($conn, $sql);


                echo "<select class='form-select form-control' aria-label='Default select example' name='category_id' required>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['id'] . "'>" . $row['categories'] . "</option>";
                }
                echo "</select>";

            ?>
            <div class="form-group">
                <input type="file" class="form-control" name="blog_img" required>
            </div>
            <div class="form-group d-flex">
                <a href="admin.php" class="btn btn-secondary text-decoration-none"><i class="fa-sharp fa-solid fa-arrow-left"></i></a>
                <button class="btn btn-primary" type="submit" id="submit">Submit Blog</button>
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
<link rel="stylesheet" type="text/css" href="https://www.shieldui.com/shared/components/latest/css/light/all.min.css" />
<script type="text/javascript" src="https://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>

<script>
    $(function () {
        $("#editor").shieldEditor({
            height: 260
        });
    })
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
