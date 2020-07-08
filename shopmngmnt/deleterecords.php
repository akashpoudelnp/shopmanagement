<?php require("db.php"); ?>
<?php
if($_GET)
{
        $todate=$_GET['date'];
        $pid=$_GET['pid'];
        $sq="DELETE from `precords` where pid='$pid'";
       
        if($conn->query($sq)==true)
        {

            $sql2="SELECT * from `dailystats` WHERE dselldate='$todate' ";
$chkr = $conn->query($sql2);
$total=0;
    $totalcp=0;
    $profit=0;
    $loss=0;
    $sql3="SELECT * from `precords` WHERE psdate='$todate' ";
    $ch2 = $conn->query($sql3);
    while($ret2=$ch2->fetch_assoc())
    {
        $total=$total+$ret2['psp'];
        $totalcp=$totalcp+$ret2['pcp'];
        
    }
    if($totalcp<$total)
        {
           $profit=$total-$totalcp; 
           $loss=0;       
        }
        else{
            $loss=$totalcp-$total; 
            $profit=0;
        }

   
        $sql5="UPDATE dailystats SET dtotal='$total' ,dprofit='$profit' ,dloss='$loss' "; 
        $ch5 = $conn->query($sql5);
            header('location:view.php');
        }
        else{
            echo "Error FUk urself";
        }

}

?>