<?php require("db.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title><?php if(isset($shop_main_name)){ echo $shop_main_name;}else{echo "Shop Management";}?></title>
</head>
<body>
<?php
$totalcp=0;
$pl=0;
$fpl=0;
$total=0;
?>
  <!-- PRINT STARTS HERE -->
<div class="container" style="margin-top:80px;">
       <!--Content GOes here -->
<!-- Default box -->
<div class="card" id="cardb">
  <div class="card-header">
        <div class="row">
            <div class="col col-lg-8 col-sm-12">
                <h3 class="card-title"><?php if(isset($shop_main_name)){ echo $shop_main_name;}else{echo "Shop Management";}?></h3>
        
            </div>
             <div class="col col-lg-4 col-sm-12" style="float:right;">
                 <div class="card-tools">
                <h5>Records of Date: <i> <?php echo date('yy/m/d'); ?></i></h5>
                 </div>
            </div>
        </div>
    </div>
    
    
  
  <div class="card-body p-0">
   <?php if($_GET){
      

 ?>

<?php
            $sdate=$_GET['sdate'];
            $sqlx="SELECT * from `precords` WHERE psdate='$sdate'";
            $result=$conn->query($sqlx);
            if($result->num_rows==0)
            {
                echo'<h5 class="text-center"> No Data found of '. $sdate.'</h5>';
                die;
            }else{

            ?>
          
    <table border="1" style="border-color:#737170;" class="table table-striped projects">
       
       
        <thead>

    
            <tr>
                <th style="width: 1%">
                 #
                </th>
                <th style="width: 20%">
                    Product Name
                </th>
                <th style="width: 30%">
                   Product Cost Price
                </th>
                <th >
                Product Selling Price
                </th>
                <th  style="width: 30%">
                  Profit/Loss
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
                                        
                                           <td></td>
                                           <td></td>
                                           <td>Total Sale:<?php echo $total;  ?></td>
                                        <td>Total <?php echo $fpl;  ?></td>
                                
                                        </tr>

                </tbody>

    </table>
    <!-- PRINT ENDS HERE -->
    
            <?php }?>
   <?php }else{ ?>
  <h5 class="text-center"> No Entries</h5>
   <?php }?>
  </div>

  <!-- /.card-body -->
</div>

<!-- /.card -->
<button onclick="printDiv('cardb')">Print</button>
  </div>
  
  <script> 
      
      function printDiv(printarea) { 
            
          // Makes the content in the div tag 
          // as the main and only content  
          // and assigns to this variable 
          var printContents =  
              document.getElementById(printarea).innerHTML;  
            
          // Complete content of the page 
          var originalContent = document.body.innerHTML; 

          // printContents is assigned to innerHtml now 
          // the printable content is the div tag 
          document.body.innerHTML = printContents;  

          window.print(); // Prints the page 

          // originalContent is assigned to innerHtml 
          // now the printable content is the complete 
          // displayed page 
          document.body.innerHTML = originalContent;  
            
          // If prints the complete page 
          // window.print();  
      } 
  </script> 
</body>
</html>