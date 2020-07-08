<?php 



if(isset($_POST['btnxrbp']))
{
                
$servername ="localhost";
$username = "root";
$password = "";
$dbname    = "shop";
//createconnection
$conn = new mysqli($servername, $username, $password, $dbname);
//checkconnection
if ($conn->connect_error) {
        die("Connection Error 420" . $conn->connect_error);

}

    $username2= $_POST['username'];
    $name= $_POST['name'];
    $password2= md5($_POST['password']);
    $shop_name= $_POST['shop_name'];
    $shop_color= $_POST['shop_color'];
    $sql1="INSERT INTO  shop_details (shopname,shop_color,shop_set) VALUES ('$shop_name','$shop_color','1')";
    $sql2="INSERT INTO  userinfo (username,name,password) VALUES ('$username2','$name','$password2')";
    $res1 =$conn->query($sql1);
    $res2 =$conn->query($sql2);

        if($res1==true && $res2==true)
        {
                header('location:login.php');
        }
}
?>