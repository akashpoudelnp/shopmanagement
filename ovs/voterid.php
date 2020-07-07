<?php require('db.php') ?>
<?php require('light-nav.php') ?>
<?php  

$ctid = $_GET['chk'];
$usr = $conn->query("SELECT * FROM `voters` WHERE `citizenship`='$ctid'");
$voter_info = $usr->fetch_assoc();
?>
<div class="col-lg-10 mb-4 p-4">
<div class="card">

             <div class="card-body">
                <h3 class="box-title"><img src="images/avatar.png" class="img-circle" width="40">
                <?php echo $voter_info['fname']." ".$voter_info['lname']; ?>
                </h3>
               
                <hr>

                <p class="card-text">
               
                <b> Citizenship:  </b><?php echo $voter_info['citizenship']; ?><br>
                <h5>Your Voter ID is</h5>
                <input type="text" id="idvoter" class="copy-box" value="<?php echo $voter_info['voterid']; ?>" >
                <button onclick="copyVoter()">Copy VoterID</button><br>
                <p><b>Note:</b>Copy the Voter ID which is used for logging in.</p>
                </p>
                <hr>
                <a href="login.php" class="btn btn-md btn-danger">Log-In</a>
                
                </div>
         
            </div>
            </div>
 <script>
function copyVoter(){
var copyit= document.getElementById('idvoter');
copyit.select();
document.execCommand("copy"); 
 }
 </script>
</body>
</html>