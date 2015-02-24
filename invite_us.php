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
	<title>Invite us</title>
</head>

<?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
    include_once 'includes/header.php';
?>

<body>
    <div class="container-box">
        <div class="align_mid" style="background:#d1cddc;">
            <div style="position:absolute">
                <?php
                if(!loggedin()){
                    echo '<p style="margin-left:448px;font-size:40px;color:#ff6600;text-decoration:underline">SERVICES</p>';
                    echo '<p style="margin-left:340px;margin-top:0;font-size:25px;color:#333;">> Electronic Health Record System</p>';
                    echo '<button class="nav-btn" style="margin-left:442px;" onclick="location.href=\'login.php\'">Log in</button>&nbsp;&nbsp;';
                    echo '<button class="nav-btn" onclick="location.href=\'register.php\'">Register</button>';
                }
                else{
                    header('Location: index.php');
                }
                ?>
            </div>
        </div>
    </div>
<?php include_once 'includes/footer.php'; ?>
<script src="js/jquery-1.11.1.js"></script>
<script src="js/front.js"></script>

</body>
</html>
