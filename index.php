<?php
include_once 'conn.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $class=$_POST['class'];
    $subject=$_POST['subject'];
    $obj->insert($name,$class,$subject);
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
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</div>
</div>
</form>
<div class="container">
    
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

  <?php
  $obj->show();
    ?>
    
</div>
  </body>
</html>