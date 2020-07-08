<?php require("db.php"); ?>
<?php
    $todate=date("y:m:d");
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
if($chkr->num_rows==0)
{
        $sql4="INSERT INTO dailystats (dtotal,dprofit,dloss,dselldate) VALUES ('$total','$profit','$loss','$todate')";
        $ch4 = $conn->query($sql4);
        if($ch4){
            header('location:entry.php');
        }
    }
    else{
        $sql5="UPDATE dailystats SET dtotal='$total' ,dprofit='$profit' ,dloss='$loss'"; 
        $ch5 = $conn->query($sql5);
        if($ch5){
           header('location:entry.php');
        }
    }

?>