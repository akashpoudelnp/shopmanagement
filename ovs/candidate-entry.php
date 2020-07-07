<?php require("db.php"); ?>
<?php require("header.php"); ?>

<?php
$title="Home";
if($_POST)
	{
		$cname=$_POST['cname'];
        $eleid=$_POST['eleid'];
        $image = $_FILES['image']['name'];
    $target_dir = "storage/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $imname=$target_file;
   if(empty($cname)||empty($image)){
    
   }
        $sql ="INSERT INTO candidate (cname,eid,cphoto)
                            VALUES ('$cname', '$eleid','$imname')";

    if ($conn->query($sql)=== TRUE)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], $imname);
	   echo '<div class="alert alert-success alert-dismissible">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
       <h4><i class="icon fas fa-poll"></i> Success!</h4>
  Candidate Entry successful
     </div>';
   
	} 
	else 
	{
		echo "ERROR OCCURED";
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
    <form method="post" enctype='multipart/form-data'>
        <h2 class="text-center">Candidate Entry</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Candidate Name" name="cname" required="required">
        </div>
        <div class="form-group">
          <label>Upload Candidate Photo</label>  <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <select name="eleid">
       
            <option value="0">Choose an Election</option>
            <?php     $geteid = $conn->query("SELECT * FROM `election`");
            unset($eid);
       while($getit = $geteid->fetch_assoc()){
        ?>
            <option value="<?php echo $getit['eid'];  ?>" > <?php echo $getit['etitle'];   ?></option>
            
<?php } ?>
            </select>
        </div>
      
        <div class="form-group">
            <button type="submit" class="btn btn-md btn-danger">Entry Candidate</button>
        </div>
        <div class="clearfix">
        <a href="#" class="btn btn-md btn-primary"> Complete</a><br>
            
        </div>        
    </form>
    
</div>
       <!-- Content Ends here -->
<?php
require("footer.php");
?>