<?php

require "dbconnect.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $username=str_replace('<','&lt;',$username);
    $username=str_replace('>','&gt;',$username);
    $password=$_POST['password'];
    $password=str_replace('<','&lt;',$password);
    $password=str_replace('>','&gt;',$password);
    

    $log=false;

    // $sql="SELECT * FROM `users`WHERE `username`='$username' AND `password`='$password'";
    // hash method verify
     $sql="SELECT * FROM `accounts`WHERE `username`='$username'";

    $result=mysqli_query($con,$sql);
    $row=mysqli_num_rows($result);
    if($row==1){
        while($ver=mysqli_fetch_assoc($result)){
            if($ver['password']==$password){

                $log=true;
                echo "loggedd in successfully";
                session_start();
                $_SESSION['username']=$username;
                $_SESSION['loggedin']=true;
                header('location: welcome.php');
            }
            else{
                echo"invalid Credentials"; 
            }
        }
    }
    else{
        echo "invalid credentils ";
    }
    

}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Login</title>
  </head>
  <body>
  <div class="container shadow-lg p-3 mb-5 bg-body rounded my-4 mb-5 col-md-7">
  <h1 style="display:flex; justify-content:center; align-items:center;" class="mt-5">Login</h1>
  <div class="container" style="display:flex; justify-content:center; align-items:center; flex-direction:row;">
  <form method="post" class="col-md-5">
  <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1"name="username" aria-describedby="emailHelp">
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary mb-5">Submit</button>
</form>
</div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

  
  </body>
</html>