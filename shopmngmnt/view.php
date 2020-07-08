<?php require("db.php"); ?>
<?php require("header.php"); 
$title="View Todays";
$totalcp=0;
$pl=0;
$fpl=0;
$total=0;
?>
<style>

    table{
        font-size:13px;
    }

</style>
<div class="container" style="margin-top:80px;">
       <!--Content GOes here -->
<!-- Default box -->
<div class="card">
  <div class="card-header">
        <div class="row">
            <div class="col col-lg-8 col-sm-12">
               <h3 class="card-title">Sales Record</h3>
        
            </div>
             <div class="col col-lg-4 col-sm-12" style="float:right;">
             <div class="card-tools">
<form method="POST">      <input type="date" name="sdate" class="form-group"/><input type="submit" value="Search" class="btn btn-primary ml-2"></form>
    </div>
             </div>
        </div>
    
    
    
  </div>
  <div class="card-body p-0">
   <?php if($_POST){
      

 ?>

<?php
            $sdate=$_POST['sdate'];
            $sqlx="SELECT * from `precords` WHERE psdate='$sdate'";
            $result=$conn->query($sqlx);
            if($result->num_rows==0)
            {
                echo'<h5 class="text-center"> No Data found of '. $sdate.'</h5>';
                die;
            }else{

            ?>
    <table class="table table-striped projects">
       
       
        <thead>

    
            <tr>
                <th style="width: 1%">
                 #
                </th>
                <th style="width: 10%">
                    Product Name
                </th>
                <th style="width: 10%">
                 Cost Price
                </th>
                <th >
                Selling Price
                </th>
                <th  style="width: 10%">
                  Profit
                </th>
                <th>
                Delete Record
                </th>

               
               
            </tr>
        
        </thead>


        <tbody>

            
        <?php
        $counter="1";
    while($tabledata=$result->fetch_assoc()){

    ?>
             <tr>
               <td>
           <?php  echo $counter; ?>
               </td>
               <td>
               <?php  echo $tabledata['pname']; ?>
               </td>
               <td>
               <?php  echo $tabledata['pcp']; ?>
               </td>
               <td>
               <?php  echo $tabledata['psp']; ?>
               </td>
               <td>
               <?php 
               if($tabledata['pcp']<$tabledata['psp'])
               {
                   $prof=0;
                   $cp=(int)$tabledata['pcp'];
                  $sp= (int)$tabledata['psp'];
                  $prof=$sp-$cp;
                   echo "<b>Profit:</b>".$prof;
               }
               else{
                   $los=$tabledata['pcp']-$tabledata['psp'];
                echo "<b>Loss:</b>".$los;
               }
            
               ?>
               </td>
               <td>
               <a  class="btn btn-danger"  href="deleterecords.php?pid=<?php echo $tabledata['pid']; ?>&date=<?php echo $tabledata['psdate']; ?>">Delete This</a>
               </td>
                
        </tr>

                                         <?php

                                     $total=$total+$tabledata['psp'];
                                     $totalcp=$totalcp+$tabledata['pcp'];
                                        $counter++;
                                        }
                                        
                                        if($totalcp<$total)
        {
           $pl=$total-$totalcp; 
           $fpl="Profit:".$pl;
             
        }
        else{
            $pl="Loss:".$totalcp-$total; 
           
        }
                                        ?>
                                        <tr>
                                        <td></td>
                                        <td>Total Sale:<?php echo $total;  ?></td>
                                        <td>Total <?php echo $fpl;  ?></td>
                                        <td></td>
                                        <td> <a class="btn btn-success" href="printpreview.php?sdate=<?php echo $sdate; ?>">Print Preview</a> </td>
                                        </tr>

                </tbody>
    </table>
            <?php }?>
   <?php }else{ ?>
  <h5 class="text-center"> No Entries</h5>
   <?php }?>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->




  </div>

<?php require("footer.php"); ?>

    