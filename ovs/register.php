<?php require('db.php');
$title="Register";
?>
<?php require('light-nav.php'); ?>
<?php
if($_POST)
	{
    //id,fname,lname,address,phone,dob,citizenship,voterid,password,

		
		$fname=$_POST['fname'];
$lname=$_POST['lname'];          
		$address=$_POST['address'];
    $phone=$_POST['phone'];
		$password=$_POST['password'];
        $citizenship=$_POST['citizenship'];
	 $dob=$_POST['dob'];
     $voterid="NP".$citizenship.$lname;

$sql = "SELECT `citizenship`, `voterid` FROM `voters` WHERE `citizenship`='$citizenship' OR `voterid`='$voterid'";
$result = $conn->query($sql);
if($result->num_rows >= 1) {
   echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
             Voter With Same citizenship or voterid already exists.
              </div>';
} else {
 



   $sql ="INSERT INTO voters (fname,lname,address,phone,dob,citizenship,voterid,password)
  VALUES ('$fname','$lname', '$address','$phone','$dob','$citizenship','$voterid','$password')";


	if ($conn->query($sql)=== TRUE) {
	
		header("Location:voterid.php?chk=$citizenship");
   
	} 
	else 
	{
		echo "ERROR OCCURED";
	}

  }
	}
	?>
   <div class="login-form">
    <form method="post">
        <h2 class="text-center">Register</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="First Name" name="fname" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Last Name" name="lname" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Address" name="address" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Citizenship Number" name="citizenship" required="required">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" required="required">
        </div>
        <div class="form-group">
            <input type="password" oninput="checkpass()" id="fpass" class="form-control" placeholder="Password" name="password" required="required">
            <img id="passtoggle" class="float-right" onmouseenter="showpass()" onmouseleave="hidepass()" src="images/eye.png" width="20">
        </div>
        <div class="form-group">
            <input type="password" oninput="checkpass()" id="lpass" class="form-control" placeholder="Retype Password" name="rpassword" required="required">
            <input type="text" class="form-control" id="output" disabled class="f-op">
       </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger">Register</button>
        </div>
        <div class="clearfix">
        <a href="#">Login Now</a><br>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    
</div>
<script type="text/javascript">
	function checkpass() {
		var p1=document.getElementById('fpass');
		var p2= document.getElementById('lpass');
		var op= document.getElementById('output');
		
		if(p1.value.indexOf("/")!=-1||p1.value.indexOf(",")!=-1)
		{
			alert("Password Shouldnt contain the special Characters");
			p1.value="";
		}
		if(p2.value.indexOf("/")!=-1)
		{
			alert("Password Shouldnt contain the special Characters");
			p2.value="";
		}
		if(p1.value==p2.value)
		{
			op.value="Password Match";
		}
		else{
			op.value="Password DO not Match";
			op.style="font-color:red;"
		}
	}
	function hidepass()
	{
		var toggle= document.getElementById('passtoggle');
		var p1= document.getElementById('fpass');
		var p2= document.getElementById('lpass');
			toggle.src="images/eye.png";
			p1.type="password";
			p2.type="password";
			
	}
	function showpass(){
		var toggle= document.getElementById('passtoggle');
		var p1= document.getElementById('fpass');
		var p2= document.getElementById('lpass');
		toggle.src="images/eye-slash.png";
		p1.type="text";
		p2.type="text";
	}
</script>
</body>
</html>


 