<?php if(!$logged && !$shopset){
  header("Location: setup.php");
}
    else if(!$logged && $shopset){
        header("Location: setup.php");
    }
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?php if(!empty($title)){ echo $title;}else{echo "Shop Management";}  ?></title>
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
    <header>
        <nav id="navchange" class="navbar navbar-light navbar-expand-md fixed-top navigation-clean" style="background-color:  <?php if(isset($shop_main_color)){ echo $shop_main_color;}else{echo "blue";}?> ">
            <div class="container"><a class="navbar-brand" href="index.php">  <?php if(isset($shop_main_name)){ echo $shop_main_name;}else{echo "Shop Management";}?>  </a><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse"
                    id="navcol-1">
                    <ul class="nav navbar-nav ml-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link" href="index.php"><i class="fa fa-home"></i>&nbsp;Home</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="entry.php"><i class="fas fa-pencil-alt"></i>&nbsp;Entry Record</a></li>
                        <li class="nav-item" role="presentation"><a class="nav-link" href="view.php"><i class="fa fa-book"></i>&nbsp;View Records</a></li>
                        <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#">More</a>
                            <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="logout.php">Log-Out</a><a class="dropdown-item" role="presentation" href="settings.php"><i class="fa fa-gears"></i>&nbsp;Settings</a><a class="dropdown-item" role="presentation" href="about.php">About</a></div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>