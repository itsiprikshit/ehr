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
	<title>Register</title>
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
                <h1 style="font-family: 'junction regular';float:left">Registration form</h1>
                <h1 style="font-family: 'junction regular';float:left;margin-left:70px;font-size:22px;text-transform:uppercase"><a href="login.php">Click to Login</a></h1>
                <h1 style="font-family: 'junction regular';float:left;margin-left:80px">Select:</h1>
                
                <ul id="tabs">
			        <li><a href="javascript:tabSwitch('tab1', 'content_1');" class="active" id="tab1">Patient</a></li>
			        <li><a href="javascript:tabSwitch('tab2', 'content_2');" id="tab2">Doctor</a></li>
		        </ul>
            
                    <?php
                        if(!loggedin()) 
                        {
                            //patient registeration
                            
                            if(isset($_POST['register_patient'])){
                            
                                if(isset($_POST['patient_name']) && isset($_POST['password']) && isset($_POST['dob']) && isset($_POST['mob']) && isset($_POST['adhar']) && isset($_POST['correspondance_add']) && isset($_POST['permanent_add']))
                                {
                                    if(!empty($_POST['patient_name']) && !empty($_POST['password']) && !empty($_POST['dob']) && !empty($_POST['mob']) && !empty($_POST['adhar']) && !empty($_POST['correspondance_add']) && !empty($_POST['permanent_add']))
                                    {
                                        $patient_name = $_POST['patient_name'];
                                        $password = $_POST['password'];
                                        $dob = $_POST['dob'];
                                        $mob = $_POST['mob'];
                                        $correspondance_add = $_POST['correspondance_add'];
                                        $permanent_add = $_POST['permanent_add'];
                                        $adhar = $_POST['adhar'];
                                        $current_date = date("Y-m-d");
                                    
                                        $patient_name = test_input($patient_name);
            
                                        if (!preg_match("/^[a-zA-Z ]*$/",$patient_name))
                                            $patient_name_err ='Only alphabets and white spaces allowed.';
                                        else
                                        {
                                                    if(strlen($patient_name) > 50)           //because even if maxlength field is changed in html this will prevent it from exceeding 
                                                        $patient_name_err ='You\'ve exceeded maximum length.';          
                                                    else
                                                    {
                                                            $query = "INSERT INTO `patient`";
                                                            $query .= "VALUES('','{$patient_name}','{$password}','{$dob}','','','','','','','{$current_date}','','{$mob}','{$correspondance_add}','{$permanent_add}','{$adhar}','','','','','','','')";
                                            
                                                            mysql_query($query);
                                                            
                                                            $query = "SELECT * FROM `patient`";
                                                            mysql_query($query);
                                                            $id = mysql_num_rows(mysql_query($query));
                                                            
                                                            echo '<script>alert("Registration successfull")</script>';
                                                            echo '<script>alert("Your login id : '.(39+$id-1).'\nYour password : '.$password.'")</script>';
                                                            //echo '<h3 style="clear:both;font-weight:400"><center>Registration successfull.</center></h3>';
                                                            //echo '<p style="clear:both;"><center>Your login id : '.$id.'</p></center>';
                                                            //echo '<p style="clear:both;"><center>Your password : '.$password.'</center></p>';
                                                    }
                                        }
                                    }
                                    else{
                                        echo '<p style="clear:both"><span style="color:red">*All fiedls are reqired.</span><br /><p>';
                                    }
                                }
                            }
                                
                            
                            //doctor registeration
                            
                            elseif(isset($_POST['register_doctor'])){
                                if(isset($_POST['doctor_name']) && isset($_POST['password']) && isset($_POST['dob']))
                                {
                                    if(!empty($_POST['doctor_name']) && !empty($_POST['password']) && !empty($_POST['dob']))
                                    {
                                        $doctor_name = $_POST['doctor_name'];
                                        $password = $_POST['password'];
                                        $dob = $_POST['dob'];
                                        $joining_date = date("Y-m-d");
                                        $doctor_name = test_input($doctor_name);
            
                                        if (!preg_match("/^[a-zA-Z ]*$/",$doctor_name))
                                            $doctor_name_err ='Only alphabets and white spaces allowed.';
                                        else{
                                                    if(strlen($doctor_name) > 50)           //because even if maxlength field is changed in html this will prevent it from exceeding 
                                                        $doctor_name_err ='You\'ve exceeded maximum length.';          
                                                    else{
                                                            $query = "INSERT INTO `doctor`";
                                                            $query .= "VALUES('','{$doctor_name}','{$password}','{$dob}','','{$joining_date}')";
                                            
                                                            if(mysql_query($query)){
                                                            
                                                                $query = "SELECT * FROM `doctor`";
                                                                mysql_query($query);
                                                                $id = mysql_num_rows(mysql_query($query));
                                                            
                                                                echo '<script>alert("Registration successfull")</script>';
                                                                echo '<script>alert("Your login id : '.(2+$id).'")</script>';
                                                                //echo '<h3 style="clear:both;font-weight:400"><center>Registration successfull.</center></h3>';
                                                            }
                                                            else
                                                                echo '<script>alert("Registration not successfull")</script>';
                                                                //echo '<h3 style="clear:both;font-weight:400"><center>Registration not successfull, id already exists.</center></h3>';
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
                        Patient Name<span style="margin-left:34px">:</span><input type="text" name="patient_name" maxlength="100" value="" /> <span style="color:red;"> * <?php if(isset($patient_name_err))echo $patient_name_err; ?></span> <br /><br />
                        Date of birth<span style="margin-left:42px">:</span><input type="text" name="dob" /> <span style="color:red;"> * YYYY-MM-DD &nbsp; <?php if(isset($dob_err))echo $dob_err; ?></span> <br /><br />
                        Password<span style="margin-left:60px">:</span><input type="password" name="password" /> <span style="color:red;"> * </span> <br /><br />
                        <div style="margin-top:-135px;margin-left:500px"> 
                            Correspondace address<span style="margin-left:7px">:</span><textarea style="background:none;color:#333;border:.1px #000 solid;" rows="3" cols="18" name="correspondance_add"> </textarea><span style="color:red;"> * </span> <br /><br />
                            Permanent address<span style="margin-left:38px">:</span><textarea style="background:none;color:#333;border:.1px #000 solid;" rows="3" cols="18" name="permanent_add"> </textarea><span style="color:red;"> * </span> <br /><br />
                        </div>
                        <div style="margin-top:-50px">
                            Mobile number<span style="margin-left:24px">:</span><input type="text" name="mob" /> <span style="color:red;"> * </span> <br /><br />
                            Aadhar<span style="margin-left:79px">:</span><input type="text" name="adhar" /> <span style="color:red;"> * </span> <br /><br />
                        </div>
                        <input style="margin-left:380px" type="submit" class="nav-btn" value="Register" name="register_patient"></input>
                    </form>
            </div>
            
            <!-- content_2 -->
            
            <div id="content_2">
                <form action="<?php echo htmlspecialchars($current_file); ?>" method="post" style="clear:both">
                        <span style="color:red;clear:left"> * Required fields. </span> <br /> <br />
                        Doctor Name<span style="margin-left:35px">:<input type="text" name="doctor_name" maxlength="100" value="" /> <span style="color:red;"> * <?php if(isset($doctor_name_err))echo $doctor_name_err; ?></span> <br /><br />
                        Date of birth<span style="margin-left:38px">:<input type="text" name="dob" /> <span style="color:red;"> * YYYY-MM-DD &nbsp; <?php if(isset($dob_err))echo $dob_err; ?></span> <br /><br />
                        Password<span style="margin-left:60px">:<input type="password" name="password" /> <span style="color:red;"> * </span> <br /><br />
                        <!-- Mobile<span style="margin-left:76px">:<input type="text" name="mob" /> <span style="color:red;"> * <?php if(isset($mob_err))echo $mob_err; ?></span> <br /><br /> -->
                        <input type="submit" class="nav-btn" value="Register" name="register_doctor"></input>
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