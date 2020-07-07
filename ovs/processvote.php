<?php require("db.php"); ?>
<?php
if($_POST)
{
    $totalvote="0";
$cid=$_POST['cid'];
$eid=$_POST['eid'];
$vid=$_POST['vid'];
$sql8=$conn->query("Select * from `candidate` where `eid`='$eid'");
$canvote=$sql8->fetch_assoc();
$totalvote=$canvote['cvotes']+1;
$sq=$conn->query("UPDATE candidate set cvotes='$totalvote' WHERE cid='$cid' ");
$sql9=$conn->query("INSERT INTO votes (eid,vid) VALUES ('$eid','$vid') ");
$sql10=$conn->query("Select * from `votes` where `eid`='$eid'");
header('location:index.php');

}
?>