<?php require("db.php"); ?>
<?php 
if($shopset)
{
   header('location:login.php');
}else{

?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Setup | Shop Management System </title>
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
</head>

<body>
    <nav id="navchange" class="navbar navbar-light navbar-expand-md navigation-clean"
        style="background-color: rgb(0, 222, 129);">
        <div class="container">
            <a class="navbar-brand" href="index.php"><b>Shop </b> Management System</a><button data-toggle="collapse"
                class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span
                    class="navbar-toggler-icon"></span></button>
        </div>

    </nav>
    <div class="container ">
        <div class="card mt-2">
        <div class="card-header"><h4>Setup Shop</h4></div>
            <div class="card-body">
            <form action="setup-backend.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="shop_name" placeholder="Enter Your Shop Name">
                </div>
                <div class="form-group">
                    <label for="color">Choose your Shop Accent Color</label> <input class="form-control" type="color" name="shop_color">
                </div>
                <div class="form-group"> <input class="form-control" type="text" name="name" placeholder="Enter Your Name"></div>

                <div class="form-group"> <input class="form-control" type="text" name="username" placeholder="Create A Username"></div>
                <div class="form-group"> <input class="form-control" type="password" name="password" placeholder="Create a Password"></div>
                <input class="btn btn-primary pull-right" name="btnxrbp" type="submit" value="Setup">
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php } ?>