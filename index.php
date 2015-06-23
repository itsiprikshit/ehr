<!DOCTYPE html>
<link type="text/css" rel="stylesheet" href="css/front.css" />
<link type="text/css" rel="stylesheet" href="css/codrops/common.css" />
<link type="text/css" rel="stylesheet" href="css/codrops/normalize.css" />
<link type="text/css" rel="stylesheet" href="css/codrops/style2.css" />

<link href='http://fonts.googleapis.com/css?family=Titillium+Web' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

<html lang="en/us">
<head>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Text Park</title>
</head>

<?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
?>

<body>
    <?php
    if(!loggedin()){
        include('includes/header.php');
        echo '<content>';
            include 'views/home.php'; 
            include 'views/about.php';
            include 'views/services.php';
            include 'views/team.php';
            include 'views/contact_us.php';
            
        echo '</content>';
    }
    else{
        include('includes/header.php');
        include 'dashboard.php'; 
    }
    ?>
    
<script src="js/jquery-1.11.1.js"></script>
<script src="js/front.js"></script>
<script src="js/modernizr.custom.codrops.js"></script>

<?php include_once 'includes/footer.php'; ?>

</body>
</html>