<?php require("db.php"); ?>
<?php require("header.php"); 
$da=date("d/m/yy");
$title="";

?>
<div class="container text-center" id="usertextContainer"  style="color: rgb(94,98,102);margin-top: 95px;">
    <div id="titlebox" class="titlebox">
        <hr>
        <h2 class="titleboxtext">&nbsp;Hi <?php echo $menam; ?>!</h2>
    </div>
    <div id="datebox" class="datebox">
        <h5 class="dateboxtext" style="color: rgb(152,152,152);font-style: italic;"><?php echo $da; ?></h5>
    </div>
    <hr>
</div>
<?php  
                $todate=date("y:m:d");
                $sql1="SELECT * from `dailystats` WHERE dselldate='$todate' ";
                $chkr = $conn->query($sql1);
                if($chkr->num_rows >=1)
                {  ?>
<div class="container">
       <div class="card">
       <div class="card-header">
       <div class="card-title"><h3>Todays Statistics</h3></div>
       </div>
      <div class="card-body">
      <?php
      $prof=0;
      $los=0;
      
      $mes="";
     $date=date("y:m:d");
     $sql2="SELECT * from `dailystats` WHERE dselldate='$todate' ";
$nn1 = $conn->query($sql2);
$daily=$nn1->fetch_assoc();
if($daily['dprofit']>0){
    $prof=$daily['dprofit'];
    $mes="Today You got a profit of Rs ".$prof;
}
else{
    $los=$daily['dloss'];
    $mes="There is a Loss of Rs ".$los." today";
}
      ?>
      <h5><?php echo $mes;  ?></h5>
      <h5>You Earned a Sum of Rs  <?php echo $daily['dtotal'];  ?></h5>
      </div>
       </div>
       </div>


              <?php      
                }else{
    ?>
<div class="container" id="recordStatusContainer">
    <div class="intro">
        <h2 class="text-center">No Sales Records Till Now</h2>
        <br>
       <a class="btn" role="button" id="btnEntry" href="entry.php"
            style="filter: saturate(100%);background-color: #ade16a;width: 400px;">Entry records</a>
    </div>
    
</div>
</div>
<?php } ?>
<?php require("footer.php"); ?>