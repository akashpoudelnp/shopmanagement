<?php 
require('db.php');

if($logged){
	header("Location: index.php");
}
else {

if (isset($_POST['voterid']) and isset($_POST['password'])){
$voterid = $_POST['voterid'];

$password = $_POST['password'];

$usr = $conn->query("SELECT * FROM `voters` WHERE `voterid`='$voterid'");
$voter_info = $usr->fetch_assoc();
$status=$voter_info['verfstatus'];
if($status!=1)
{
  echo '<div class="alert alert-danger alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fas fa-poll"></i> Sorry!</h4>
  You are not verified yet.
     </div>';
}
else{

$sql = "SELECT * FROM voters WHERE voterid='$voterid' and password='$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
	
   $_SESSION['voterid'] = $voterid;
   $_SESSION['login_true'] = TRUE;
 
 header("Location:index.php"); 

   }
 else {

  echo '<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
  <h4><i class="icon fas fa-poll"></i> Oops!</h4>
Invalid Credentials, Please Check VoterID or Password and Retry.
</div>';
}
}
}
?>
<?php require('light-nav.php') ?>
  <div class="login-form">
    <form method="post">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Voter ID" name="voterid" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger">Log in</button>
        </div>
        <div class="clearfix">
        <a href="#">Create an account!</a><br>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    
</div>

<!-- Scripts Required -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>

  <?php } ?>

    