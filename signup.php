<?php

include_once "nav.php";
include_once "conn.php";


if(isset($_POST['submit'])){
$email=$_POST['email'];
$pass=$_POST['pass'];
$confirm=$_POST['confirm'];


if ($pass==$confirm)
 {
    # code... 

    $hash=password_hash($pass,PASSWORD_BCRYPT);
    $query="INSERT INTO `users` (`email`, `password`) VALUES (:email,:pass)";
    $stmt=$conn->prepare($query);
    $stmt->bindparam(":email",$email);
    $stmt->bindparam(":pass",$hash);
    $res=$stmt->execute();

  if ($res) {
    # code...
  
    echo'<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Hurrah!</strong> SignUp Successfully,Now you can login by click <a href="index.php">here</a>.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
 

  }else{
    echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>OOPS something went wrong!</strong>Please try again.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
   
  }
}else{
   
    
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Uncertainly!</strong>Your password does not match each other please enter same password in each section.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
 
}
}
?>
<div class="container">
<h3 style="text-align:center;">
    Here Please Enter Your Details, and SignUp Now.
</h3>
<form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label" >Confirm Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="confirm">
  </div>
  
  <button type="submit" class="btn btn-primary" name="submit">SignUp</button>
</form>
</div>