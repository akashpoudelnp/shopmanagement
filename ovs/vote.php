<?php require("db.php"); ?>
<?php
require("header.php");
$title="Home";
?>
<?php  
if($_GET){
   
    $elecid=$_GET['election'];
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
           <?php
           
           $sql9=$conn->query("SELECT * from `election` where `eid`='$elecid'");
      $fetchelec=$sql9->fetch_assoc();

           ?>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><?php echo $fetchelec['etitle']; ?>
                    (
                        <?php 
                    
                   if( $fetchelec['estatus']==1)
                   echo "Running";
                   else
                   echo "Not Running";
                   ?>
                    )
                    
                    </h3>
                </div>
                <!-- /.card-header -->
               <?php //for calculatin percentage
               
               $ctotal="0";
               $sql8=$conn->query("Select * from `candidate` where `eid`='$elecid'");
           while($totall=$sql8->fetch_assoc()){ 
                              $ctotal=$totall['cvotes']+$ctotal;   
                                                 }
                                                 if($ctotal==0){
                                                     $ctotal='1';
                                                 }
               ?>
                <div class="card-body">
           <?php  
           $sql7=$conn->query("Select * from `candidate` where `eid`='$elecid'");
while($chart=$sql7->fetch_assoc()){   
    $cpcnt=  (($chart['cvotes'])/$ctotal)*100;
    ?>

            <!--progress start here-->    
            <br>
             <p><img alt="Avatar" class="img-circle" width="70" src=" <?php echo $chart['cphoto'];  ?>"><b> <?php echo $chart['cname'];  ?></b></p>
             <div class="progress " style="height:40px;">
                 <div class="progress-bar bg-maroon" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                     style="font-size:25px; width:<?php echo $cpcnt;  ?>%">
                    Votes:<?php 
                    
                    echo $chart['cvotes'];  ?>
                 </div>
             </div>
             <br>
         <!--progress ends here-->               
<?php } ?>
                </div>
               
                <!-- /.card-body -->
            </div>
  <!-- persons -->
            <?php
//if voted only then thuis below div will run
$elecid=$_GET['election'];
$void=$voter_info['vid'];
$ch=$conn->query("SELECT * FROM `votes` where `vid`='$void' AND `eid`='$elecid'");
if($ch->num_rows >=1){
    die;

}else{
$sql4=$conn->query("SELECT * from `candidate` where `eid`='$elecid'");
while($elee=$sql4->fetch_assoc()){
            ?>
          

            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
              <div class="card bg-light">
                
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b> <?php echo $elee['cname'];  ?></b></h2>
                      <p class="text-muted text-sm"><b>Votes: </b> <?php echo $elee['cvotes'];  ?> </p>
                      
                    </div>
                    <div class="col-5 text-center">
                      <img src=" <?php echo $elee['cphoto'];  ?>" alt="" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                  <?php
                if($fetchelec['estatus']=='1'){
                  ?>
                  <form method="POST" action="processvote.php">
                   <input type="hidden" name="cid" value="<?php echo $elee['cid'];  ?>">
                   <input type="hidden" name="eid" value="<?php echo $elee['eid'];  ?>">
                   <input type="hidden" name="vid" value="<?php echo $voter_info['vid'];  ?>">
                    <button type="submit" class="btn btn-md btn-primary">
                      <i class="fas fa-poll"></i> Vote
                    </button>
                    </form>
                <?php } else{} ?>
                  </div>
                </div>
              </div>
            </div>
<?php   } //this is of while  ?>
<?php 

}//this is of if not voted
}else{ ?>
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
<h3>The Page Doesnot Exists</h3>
<?php  } ?>
            <?php
require("footer.php");
?>