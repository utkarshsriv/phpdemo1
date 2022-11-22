
<?php
include_once "nav.php";
include_once "conn.php";
if (isset($_SESSION['email'])) {
  # code...
  header("location:afterlogin.php");
}
if (isset($_POST['login'])) {
    # code...
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $query="select * from users where email=:email";
    $stmt=$conn->prepare($query);
    $stmt->bindparam(":email",$email);
    $res=$stmt->execute();
    if ($res) 
    {
     
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            $verify=password_verify($pass,$row['password']);
            if ($verify) 
            {
              $_SESSION['email']=$_POST['email'];
              
              header("location:afterlogin.php");
            }else
            {
                echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Password does not match !.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
              
                header("location:index.php");
            }
    
        }
    } else
    {
        echo'<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Wrong ! email or account has not been created yet with this email</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      


    }

}
?>
<!-- Modal -->
<div class="container">
    <h3 style="text-align:center;">Enter the details & Login now</h3>
      
     <div class="container mx-2 my-5">
     <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
<h3 style="text-align:center;">Don't have a account? <a href="signup.php" style="">SignUp Now</a></h3>
     </div>
    </div>
  </div>
</div>
    </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>