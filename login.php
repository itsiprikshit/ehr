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
	<title>Login</title>
</head>

<?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
    include_once 'includes/header.php';
?>

<script type="text/javascript">

    function tabSwitch(new_tab, new_content) {
	document.getElementById('content_1').style.display = 'none';
	document.getElementById('content_2').style.display = 'none';
	document.getElementById(new_content).style.display = 'block';  
			    
	document.getElementById('tab1').className = '';
	document.getElementById('tab2').className = '';
	document.getElementById(new_tab).className = 'active';    
}
</script>

<body>
    <div class="container-box">
        <div class="align_mid" style="background:#d1cddc;">
            <div style="position:absolute;color:#333;left:100px;top:20px">
                <h1 style="font-family: 'junction regular';float:left">Login form</h1>
                <h1 style="font-family: 'junction regular';float:left;margin-left:150px;font-size:22px;text-transform:uppercase"><a href="register.php">Click to Register</a></h1>
                <h1 style="font-family: 'junction regular';float:left;margin-left:80px">Select:</h1>
                
                <ul id="tabs">
			        <li><a href="javascript:tabSwitch('tab1', 'content_1');" class="active" id="tab1">Patient</a></li>
			        <li><a href="javascript:tabSwitch('tab2', 'content_2');" id="tab2">Doctor</a></li>
		        </ul>
                
                <img src="images/login.png" style="position:absolute; top:100px;left:320px;" height="100px" width="100px"/>
                    <?php
                        if(!loggedin()) 
                        {
                            //patient login
                            
                            if(isset($_POST['login_patient'])){
                            
                                if(isset($_POST['patient_id']) && isset($_POST['password']))
                                {
                                    if(!empty($_POST['patient_id']) && !empty($_POST['password']))
                                    {
                                        $patient_id = $_POST['patient_id'];
                                        $password = $_POST['password'];
                                        
                                                           $query = "SELECT * FROM `patient` WHERE `id`='".mysql_real_escape_string($patient_id)."' AND `password`='".mysql_real_escape_string($password)."'";
                                                           if($query_run = mysql_query($query)){
                                                                $query_num_rows = mysql_num_rows($query_run);
            
                                                                if($query_num_rows == 0)
                                                                    echo '<p style="clear:both"> <span style="color:red;">*Invalid id and password.</span><br /><br />';
                                                                else if($query_num_rows == 1)
                                                                {
                                                                    $user_row = mysql_fetch_assoc($query_run);
                           
				                                                        $_SESSION['patient_id'] = $user_row['id'];
                                                                        header("Location: index.php");
                                                                }
                                                            }
                                                            
                                    }
                                    else 
                                        echo '<p style="clear:both"><span style="color:red">*All fiedls are reqired.</span><br /><p>';
                                }
                            }
                                
                            
                            //doctor login
                            
                            elseif(isset($_POST['login_doctor'])){
                                if(isset($_POST['doctor_id']) && isset($_POST['password']))
                                {
                                    if(!empty($_POST['doctor_id']) && !empty($_POST['password']))
                                    {
                                        $doctor_id = $_POST['doctor_id'];
                                        $password = $_POST['password'];
            
                                                           $query = "SELECT * FROM `doctor` WHERE `id`='".mysql_real_escape_string($doctor_id)."' AND `password`='".mysql_real_escape_string($password)."'";
                                                           if($query_run = mysql_query($query)){
                                                                $query_num_rows = mysql_num_rows($query_run);
                                                                if($query_num_rows == 0)
                                                                    echo '<p style="clear:both"> <span style="color:red;">*Invalid id and password.</span><br /><br />';
                                                                else if($query_num_rows == 1){
                                                                    $user_row = mysql_fetch_assoc($query_run);
                                                                        if($user_row['confirm'] == 0){
                                                                            echo '<p style="clear:both"> <span style="color:red;">*Your id has not been confirmed yet.</span><br /><br />';
                                                                        }
                                                                        else{
				                                                            $_SESSION['doctor_id'] = $user_row['id'];
				                                                            $_SESSION['doctor_name'] = $user_row['doctor_name'];
                                                                            header("Location: index.php");
                                                                        }
                                                                    }
                                                                }
                                                            
                                    }
                                    else 
                                        echo '<p style="clear:both"><span style="color:red">*All fiedls are reqired.</span><br /><p>';
                                    }
                                }
                            }
                            else if(loggedin()){
                                header('Location: index.php');
                            }
                    ?>
                    
            <!-- content_1 -->
            <div id="content_1">
                    <form action="<?php echo htmlspecialchars($current_file); ?>" method="post" style="clear:both">
                        <span style="color:red;"> * Required fields. </span> <br /> <br />
                        Patient Id<span style="margin-left:34px">:</span><input type="text" name="patient_id" maxlength="100" value="" /> <span style="color:red;"> * <?php if(isset($patient_id_err))echo $patient_id_err; ?></span> <br /><br />
                        Password<span style="margin-left:34px">:</span><input type="password" name="password" /> <span style="color:red;"> * </span> <br /><br />
                        <input type="submit" class="nav-btn" value="Login" name="login_patient"></input>
                    </form>
            </div>
            
            <!-- content_2 -->
            
            <div id="content_2">
                <form action="<?php echo htmlspecialchars($current_file); ?>" method="post" style="clear:both">
                        <span style="color:red;clear:left"> * Required fields. </span> <br /> <br />
                        Doctor ID<span style="margin-left:35px">:</span><input type="text" name="doctor_id" maxlength="100" value="" /> <span style="color:red;"> * <?php if(isset($doctor_id_err))echo $doctor_id_err; ?></span> <br /><br />
                        Password<span style="margin-left:34px">:</span><input type="password" name="password" /> <span style="color:red;"> * </span> <br /><br />
                        <!-- Mobile<span style="margin-left:76px">:<input type="text" name="mob" /> <span style="color:red;"> * <?php if(isset($mob_err))echo $mob_err; ?></span> <br /><br /> -->
                        <input type="submit" class="nav-btn" value="Login" name="login_doctor"></input>
                </form>
            </div>
            
        </div>
    </div>
</div>
    <?php 
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
    
    <?php include_once 'includes/footer.php'; ?>

</body>
</html>