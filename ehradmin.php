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
	<title>Admin</title>
</head>
     
    <?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
    include_once 'includes/header.php';
    ?>
    
<body>

<div class="container-box">
    <div class="align_mid" style="background:#d1cddc;">
        <div style="position:absolute;color:#333;left:100px;top:20px">
            <h1 style="font-family: 'junction regular';float:left">Admin Login</h1>
            <?php
                if(!loggedin()){
                    if(isset($_POST['username']) && isset($_POST['password']))
                    {
                        $admin = $_POST['username'];
                        $password = $_POST['password'];
    
                        if(!empty($admin) && !empty($password))
                        {
                            $query = "SELECT * FROM `admin` WHERE `admin`='".mysql_real_escape_string($admin)."' AND `admin_password`='".mysql_real_escape_string($password)."'";
                            if($query_run = mysql_query($query))
                            {
                                $query_num_rows = mysql_num_rows($query_run);
                                if($query_num_rows == 0)
                                    echo '<p style="clear:both"><span style="color:red">*Invalid Username and password.</span><br /><p>';
                                else if($query_num_rows == 1)
                                {
                                    $user_row = mysql_fetch_assoc($query_run);
				                    $_SESSION['admin'] = $user_row['admin'];
                                    header("Location: index.php");
                                }
                            }
                        }
                        else
                            echo '<p style="clear:both"><span style="color:red">*All fiedls are reqired.</span><br /><p>';
                    }
                }
                else{
                    header("Location: index.php");
                }
            ?>
        
            <form action="<?php echo htmlspecialchars($current_file); ?>" method="post" style="clear:both">
                        <span style="color:red"> * Required fields. </span> <br /> <br />
                        Username<span style="margin-left:30px">:</span><input type="text" name="username" maxlength="100" value="" /> <span style="color:red"> * </span> <br /><br />
                        Password<span style="margin-left:34px">:</span><input type="password" name="password" /> <span style="color:red"> * </span> <br /><br />
                        <input type="submit" class="nav-btn" value="Login" name="login_admin"></input>
            </form>
        </div>
    </div>
</div>
</div>
</div>

<?php    include_once 'includes/footer.php'; ?>
</body>
</html>