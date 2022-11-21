<?php
if (isset($_POST['submit'])) {
    # code...
    include_once 'conn.php';

    # code...
    $id=$_GET['id'];
    $name=$_POST['name'];
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $obj->update($id,$name,$class,$subject);
    if ( $obj->update($id,$name,$class,$subject)) {
        # code..
        echo"Updated successfully";
        header("location:index1.php");

    }else{
        echo "does not updated";
    }


}
?>
<?php
include_once 'nav.php';
?>
<div class="container">
    <form action=""method="post">
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">student name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name" name="name">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">class</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your class" name="class">
  <label for="exampleFormControlInput1" class="form-label">subject</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your subject" name="subject">
  <br>

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
  <a href="./index1.php" class="btn btn-success">Go back</a>
</div>
</div>
</form>
