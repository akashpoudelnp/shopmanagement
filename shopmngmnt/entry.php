
<?php require("db.php"); ?>
<?php require("header.php"); 
$title="Entry Records";
?>
   <?php
    if($_POST)
    {
        $pname=$_POST['pname'];
        $psp=$_POST['psp'];
        $pcp=$_POST['pcp'];
        $pdate=date("y:m:d");
        $sql1="INSERT INTO  precords (pname,psp,pcp,psdate) VALUES ('$pname','$psp','$pcp','$pdate')";
        if($conn->query($sql1)===true)
        {
       $message="Data Entry Successfull";
header('location:dailystats.php');

        }else{
            echo"Data Entry UNSUCCESSFULL";
        }
    }
   ?>
     
    <div class="contact-clean" style="margin-top: 50px;">
        <form method="post">
            <h2 class="text-center">Entry Todays Sells</h2>
            <div class="form-group">
                <code class="text-center">
                <?php  
                $todate=date("y:m:d");
                $sql2="SELECT * from `precords` WHERE psdate='$todate' ";
                $chkr = $conn->query($sql2);
                echo $chkr->num_rows." ";  ?>Product Entried Today
            
                </code>
            </div>
            <div class="form-group"><input type="text" class="form-control" name="pname" placeholder="Product Name" required /></div>
            <div class="form-group"><input class="form-control" type="number" name="pcp" placeholder="Product Cost Price" required=""></div>
            <div class="form-group"><input class="form-control" type="number" name="psp" placeholder="Product Selling Price" required=""></div>
            <div class="form-group"><p class="text-red"><?php if(!empty($message)){ echo $message;}   ?></p></div>
            <div class="form-group"><input class="btn btn-primary" type="submit" value="Entry" ></div>
            <br>
        </form>
    </div>
   
<?php require("footer.php"); ?>
