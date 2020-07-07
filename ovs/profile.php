<?php require("db.php"); ?>
<?php
require("header.php");
$title="Home";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">

                <div class="col-sm-6">
                         <h2 class="m-0 text-dark">
                         </h2> 
                </div><!-- /.col -->

            </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
       <!--Content GOes here -->
       <div class="row justify-content-center">

<!-- Profile Image -->
<div class="card w-50 h-20 card-primary card-outline h-100">
  <div class="card-body box-profile">
    <div class="text-center">
      <img class="profile-user-img img-fluid img-circle" src="<?php echo $voter_info['voterphoto'];?>" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center"><?php echo $voter_info['fname']."".$voter_info['lname'];?></h3>

    <p class="text-muted text-center"><b>VoterID: </b><code><?php echo $voter_info['voterid'];?></code></p>

    <ul class="list-group list-group-unbordered mb-3">
      <li class="list-group-item">
        <b>Citizenship Number</b> <a class="float-right"><?php echo $voter_info['citizenship'];?></a>
      </li>
      <li class="list-group-item">
        <b>Address</b> <a class="float-right"><?php echo $voter_info['address'];?></a>
      </li>
      <li class="list-group-item">
        <b>Phone</b> <a class="float-right"><?php echo $voter_info['phone'];?></a>
      </li>
    </ul>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.card -->
</div>
     
<?php
require("footer.php");
?>