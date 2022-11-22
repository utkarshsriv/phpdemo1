<?php
  include_once 'conn.php';
  $id=$_GET['id'];
   $query="select * from students where id=$id";
  
   $stmt=$conn->prepare($query);
   $stmt->execute();
   if ($stmt->rowCount() > 0) {
       # code...
      
       $row=$stmt->fetch(PDO::FETCH_ASSOC);
   }
  
if (isset($_POST['submit'])) {
    # code...

    # code...
    $name=$_POST['name'];
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    
    $obj->update($id,$name,$class,$subject);
    if ( $obj->update($id,$name,$class,$subject)) {
        # code..
        echo"Updated successfully";
        header("location:index.php");

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
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="enter your name" name="name" value=" <?php echo ($row['name']);?>">
 
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">class</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your class" name="class" value="<?php echo ($row['class']);?>">
  <label for="exampleFormControlInput1" class="form-label">subject</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your subject" name="subject" value="<?php echo ($row['subject']);?>">
  <br>

  <button type="submit" class="btn btn-primary" name="submit">Update</button>
  <a href="./index1.php" class="btn btn-success">Go back</a>
</div>
</div>
</form>


  