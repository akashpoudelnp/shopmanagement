<?php require("db.php"); ?>
<?php require("header.php"); 
$title="Settings";
$sqlx1="SELECT * FROM `userinfo`";
$run=$conn->query($sqlx1);
if($_POST)
{
    $name=$_POST['name'];
    $sqlx2="UPDATE `userinfo` SET name='$name' where `uid`='$uuid'";
    $runthis=$conn->query($sqlx2);
}


?>
<div class="container" style="margin-top:100px;">
    <div class="card">
        <div class="card-header">
            <div class="card-title">
               <h3> <i class="fa fa-gears"></i>&nbsp;Settings</h3>
            </div>
        </div>
        <div class="card-body">
            <h4>Change User Name</h4>
            <hr>

            <form method="post">
            <input type="text" name="name" id="name" placeholder="Rename Your Name"><br>
            <button type="submit" class="btn btn-primary mt-2">Change Name</button>
            </form>
            <br>
            
        </div>
    </div>
</div>

<?php require("footer.php"); ?>
