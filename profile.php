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
	<title>Profile</title>
</head>

<?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
    include_once 'includes/header.php';
?>
<body>
    <div class="container-box">
    <div style="background:#d1cddc;" class="align_mid">
            <?php
                if(loggedin()){
            
                    //PATIENT PROFILE
                
                    if(isset($_SESSION['patient_id'])){
                        
                        echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\'; "> YOUR PROFILE </span></center>';
                    echo '<center><img src="images/login.png" style="margin-top:4px" height="100px" width="100px"/>';
                        
                        $query = "SELECT * FROM `patient` WHERE `id`='".mysql_real_escape_string($_SESSION['patient_id'])."'";
                        if($query_run = mysql_query($query))
                        {
                            $query_num_rows = mysql_num_rows($query_run);
                            $user_row = mysql_fetch_assoc($query_run);
                        
                            if($query_num_rows == 1)
                            {
                                $id = $user_row['id'];
                                $patient_name = $user_row['patient_name'];
                                $dob = $user_row['dob'];
                                $mobile = $user_row['mobile'];
                                $adhar = $user_row['adhar_num'];
                            
                                echo '<br /><center>ID: '.$id.'<br />
                                                    Name: '.$patient_name.'<br />
                                                    Date of birth: '.$dob.'<br />
                                                    Mobile: '.$mobile.'<br />
                                                    Adhar: '.$adhar.'<br />
                                                
                                            </center><br/>';
                                echo '<center>
                                        <img src="images/profile-1.png" style=";height:80px;width:80px"/>
                                        <img src="images/profile-2.png" style="margin-left:150px;height:80px;width:80px"/>
                                        <img src="images/profile-3.png" style="margin-left:150px;height:80px;width:50px"/><br/><br/>
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:40px "> Edit Profile
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:110px "> Change Password 
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:100px "> Change number
                                      </center>';
                            }
                        }
                    }
                
                    //DOCTOR PROFILE
                
                    elseif(isset($_SESSION['doctor_id'])){
                        
                        echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\'; "> WELCOME DOCTOR </span></center>';
                        echo '<center><img src="images/login.png" style="margin-top:4px" height="100px" width="100px"/>';
                        
                        $query = "SELECT * FROM `doctor` WHERE `id`='".mysql_real_escape_string($_SESSION['doctor_id'])."'";
                        if($query_run = mysql_query($query))
                        {
                            $query_num_rows = mysql_num_rows($query_run);
                            $user_row = mysql_fetch_assoc($query_run);
                        
                            if($query_num_rows == 1)
                            {
                                $id = $user_row['id'];
                                $doctor_name = $user_row['doctor_name'];
                                $dob = $user_row['dob'];
                                $joining_date = $user_row['joining_date'];
                            
                                echo '<br /><center>ID: '.$id.'<br />
                                                    Name: '.$doctor_name.'<br />
                                                    Date of birth: '.$dob.'<br />
                                                    Joinind date: '.$joining_date.'
                                                
                                            </center>';
                                echo '<br /><center>
                                        <img src="images/profile-1.png" style=";height:80px;width:80px"/>
                                        <img src="images/profile-2.png" style="margin-left:150px;height:80px;width:80px"/>
                                        <img src="images/profile-3.png" style="margin-left:150px;height:80px;width:50px"/><br/><br/>
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:40px "> Edit Profile
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:110px "> Change Password 
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:100px "> Change number
                                      </center>';            
                            }
                        }
                    }

                    //ADMIN PROFILE
                
                    else{
                        //echo "<br /><br /><center>Welcome <span style=\"color:red;\">{$_SESSION['admin']}.</span><br>You are the admin.<center>";
                        echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\'; "> WELCOME ADMIN </span></center>';
                        
                        $query = "SELECT * FROM `admin` WHERE `admin`='".mysql_real_escape_string($_SESSION['admin'])."'";
                        if($query_run = mysql_query($query))
                        {
                            $query_num_rows = mysql_num_rows($query_run);
                            $user_row = mysql_fetch_assoc($query_run);
                        
                            if($query_num_rows == 1)
                            {
                                $admin = $user_row['admin'];
                            
                                echo '<br /><center>Name: '.$admin.'<br />
                                            </center>';
                            }
                        }
                        echo '<br /><center>
                                        <img src="images/profile-1.png" style=";height:80px;width:80px"/>
                                        <img src="images/profile-2.png" style="margin-left:150px;height:80px;width:80px"/>
                                        <img src="images/profile-3.png" style="margin-left:150px;height:80px;width:50px"/><br/><br/>
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:40px "> Edit Profile
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:110px "> Change Password 
                                        <span style="color:#254830;font-size:15px;font-family:\'junction regular\';margin-left:100px "> Change number
                                      </center>';
                    }
                }
                else{
                        header('Location: index.php');
                }
            ?>
        </div>
    </div>

    <?php include_once 'includes/footer.php'; ?>
    
</body>
</html>