<?php require("db.php"); ?>
<?php require("header.php"); ?>
<?php
$title="Create Election";
if($_POST)
	{
   
		
		$etitle=$_POST['etitle'];
$edesc=$_POST['edesc'];          
		$edate=date("y:m:d");
    

$sql = "SELECT `etitle` FROM `election` WHERE `etitle`='$etitle'";
$result = $conn->query($sql);
if($result->num_rows >= 1) {
   echo '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            ELection Exists
              </div>';
} else {
 
   $sql ="INSERT INTO election (etitle,edesc,edate)
  VALUES ('$etitle', '$edesc','$edate')";


	if ($conn->query($sql)=== TRUE) {
	
		header("Location:candidate-entry.php");
   
	} 
	else 
	{
		echo "ERROR OCCURED";
	}

  }
	}
	?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">



                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Second One</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <!--Content GOes here -->
            <div class="login-form">
                <form method="post">
                    <h2 class="text-center">Create Election Now</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Election Title" name="etitle"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Election Description" name="edesc"
                            required="required">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-danger">Register</button>
                    </div>

                </form>

            </div>
            <!-- Content Ends here -->
            <?php
require("footer.php");
?>