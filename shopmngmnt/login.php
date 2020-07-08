<?php require("db.php"); ?>
<?php
if($logged && $shopset){
	header("Location: index.php");
}
else if(!$shopset){
    header("Location: setup.php");
}
else if(!$logged && $shopset){
    
if($_POST)
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $chk="SELECT * from `userinfo` where username='$username' && password='$password'";
    $run=$conn->query($chk);
    if($run->num_rows>0)
    {
   $_SESSION['username'] = $username;
   $_SESSION['login_true'] = TRUE;
        $_SESSION['modescheme']==0;
 header("Location:index.php"); 
    }
    else{
        $mess="Login Unsuccessfull! Re-check Your Username or Password";
       
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login | POUDEL ELEX</title>
  <link rel="icon" type="image/png" sizes="undefinedxundefined" href="assets/img/2.png">
    <link rel="icon" type="image/png" sizes="undefinedxundefined" href="assets/img/2.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Newsletter-Subscription-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body >
<nav id="navchange" class="navbar navbar-light navbar-expand-md navigation-clean" style="background-color: rgb(0, 222, 129);">
    <div class="container">
    <a class="navbar-brand" href="index.php"><b>POUDEL</b> Electronics</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
    </div>
    
</nav>
<div class="contact-clean" >
        <form method="post">
            <h2 class="text-center">Login</h2>
          
            <div class="form-group"><input type="text" class="form-control" name="username" placeholder="UserName" required /></div>
            <div class="form-group"><input class="form-control" type="text" name="password" placeholder="Password" required></div>
           
            <div class="form-group"><input class="btn btn-primary" type="submit" value="Log-In" ></div>
            <code><?php if(!empty($mess)){echo $mess;} ?></code>
            <br>
        </form>
    </div>
</body>
</html>
<?php }?>