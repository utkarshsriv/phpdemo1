<?php
include_once 'nav.php';
include_once 'conn.php';

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $obj->insert($name,$class,$subject);
  }
?>

<?php

include_once 'deleteModal.php';
if (isset($_SESSION['email']))
{
  # code...
  echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Hurrah!</strong> LoggedIn Successfully,Now you can do other operations and Insert your data also.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <div class="container">
<form action=""method="post">
        <h1>Enter the details for your data </h1>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">student name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your name" name="name">
</div>
<div class="mb-3">
<label for="exampleFormControlInput1" class="form-label">class</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your class" name="class">
  <label for="exampleFormControlInput1" class="form-label">subject</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter your subject" name="subject">
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</form> 
</div><div class="container">
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Class</th>
      <th scope="col">Subject</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  ';

  $query="select * from students";
  $obj->show($query);
  
  echo'</div>
  ';
    
}else {
  echo '<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">YOU Are Not Login yet,So you can not do anything right Now</h1>
    <p class="lead">Click here for login now <a href="index.php">Login</a></p>
  </div>
</div>';
}
?>
</body>
</html>

  





