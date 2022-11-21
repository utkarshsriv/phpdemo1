<?php
include_once 'conn.php';
if(isset($_POST['submit'])){
    $id=$_GET['id'];
    $obj->delete($id);
    header("location:index1.php");
}
?>
  <?php
include_once 'nav.php';
  ?>
                    <form method="post">
                    <div class="container">
                        <h3>Are you sure to Delete!</h3>
                        <button class=" btn btn-success" type="submit" name="submit"><span class=" glyphicon glyphicon-trash"></span>YES</button>
                        <a href="index1.php" class=" btn btn-danger">No</a>
                        </div>
                    </form>

