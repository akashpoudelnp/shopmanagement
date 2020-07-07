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
     <h2 class="m-0 text-dark">Welcome   <?php echo $voter_info['fname']."!"; ?></h2> 
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
       <!--Content GOes here -->
       <?php  
       $eleamt="0";
       $sql1= $conn->query("Select * from `election`");
       while($check=$sql1->fetch_assoc()){
          $eleamt= $eleamt+$check['estatus'];
         }
      if($eleamt<1)
       {
       ?>
             <div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-person-booth"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ongoing Elections</span>
                <span class="info-box-number">There is no election running right now</span>
              </div>
              <!-- /.info-box-content -->
            </div>

            <?php 
       }else{
            ?>
<!--  If there are elections then  -->
<div class="info-box">
              <span class="info-box-icon bg-success"><i class="fas fa-person-booth"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Ongoing Elections</span>
          <a href="elections.php" >     <span class="info-box-number">There is <?php echo $eleamt; ?> election running right now</span>
             </a>
              </div>
              <!-- /.info-box-content -->
            </div>

       <?php } ?>
<?php
require("footer.php");
?>