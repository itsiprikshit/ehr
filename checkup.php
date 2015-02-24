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
	<title>Check up</title>
</head>

<?php
    include_once 'includes/connect.php';
    include_once 'includes/core.php';
    include_once 'includes/header.php';
?>

<body>
    <div class="container-box">
        <div class="align_mid" style="background:#d1cddc;">
                <?php 
                    if(loggedin() && isset($_SESSION['patient'])){
                        echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\'; ">Patient id : '.$_SESSION['patient'].'</span></center>';   
                        if(isset($_POST['checkup'])){
                            if(isset($_POST['disease']) && isset($_POST['medicine_1']) && isset($_POST['dose_1']) || (isset($_POST['medicine_2']) && isset($_POST['dose_2'])) || (isset($_POST['medicine_3']) && isset($_POST['dose_3'])) || (isset($_POST['medicine_4']) && isset($_POST['dose_4'])) || (isset($_POST['medicine_5']) && isset($_POST['dose_5'])) && isset($_POST['next_appointment'])){
                                if(strlen(trim($_POST['disease'])) && !empty($_POST['medicine_1']) && !empty($_POST['dose_1'])  && !empty($_POST['next_appointment']) || (!empty($_POST['medicine_2']) && !empty($_POST['dose_2'])) || (!empty($_POST['medicine_3']) && !empty($_POST['dose_3'])) || (!empty($_POST['medicine_4']) && !empty($_POST['dose_4'])) || (!empty($_POST['medicine_5']) && !empty($_POST['dose_5']))){
                                    $disease = $_POST['disease'];
                                    $medicine_1 = $_POST['medicine_1'];
                                    $medicine_2 = $_POST['medicine_2'];
                                    $medicine_3 = $_POST['medicine_3'];
                                    $medicine_4 = $_POST['medicine_4'];
                                    $medicine_5 = $_POST['medicine_5'];
                                    $dose_1 = $_POST['dose_1'];
                                    $dose_2 = $_POST['dose_2'];
                                    $dose_3 = $_POST['dose_3'];
                                    $dose_4 = $_POST['dose_4'];
                                    $dose_5 = $_POST['dose_5'];
                                    $last_visited = date("Y-m-d");
                                    $next_appointment = $_POST['next_appointment'];
                                    
                                    $query = "UPDATE patient SET `disease`='".mysql_real_escape_string($disease)."', `medicine_1` = '".mysql_real_escape_string($medicine_1)."', `dose_1` = '".mysql_real_escape_string($dose_1)."', `medicine_2` = '".mysql_real_escape_string($medicine_2)."', `dose_2` = '".mysql_real_escape_string($dose_2)."', `medicine_3` = '".mysql_real_escape_string($medicine_3)."', `dose_3` = '".mysql_real_escape_string($dose_3)."', `medicine_4` = '".mysql_real_escape_string($medicine_4)."', `dose_4` = '".mysql_real_escape_string($dose_4)."', `medicine_5` = '".mysql_real_escape_string($medicine_5)."', `dose_5` = '".mysql_real_escape_string($dose_5)."' , `doctor_name` = '".mysql_real_escape_string($_SESSION['doctor_name'])."', `last_visited` = '".mysql_real_escape_string($last_visited)."', `next_appointment` = '".mysql_real_escape_string($next_appointment)."' WHERE `id`='".mysql_real_escape_string($_SESSION['patient'])."'";
                                    if($query_run = mysql_query($query)){
                                        echo '<br /><center><span style="color:red;">Patient checked. <br /> <a href="index.php">Go back.</a></center>';
                                    }
                                }
                                else{
                                    echo '<center><p style="clear:both"><span style="color:red">All fiedls are reqired.</span><p></center>';
                                    echo '<center>
                                            <form action="'.htmlspecialchars($current_file).'" method="post">
                                                Disease <span style="margin-left:7px">:</span><textarea style="background:none;color:#333;border:.1px #000 solid;" rows="3" cols="18" name="disease"> </textarea><br /><br />
                                                Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_1"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                                Dose <span style="margin-left:4px">:</span><input type="text" name="dose_1"/><br /><br />
                                       
                                                Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_2"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                                Dose <span style="margin-left:4px">:</span><input type="text" name="dose_2"/><br /><br />
                                        
                                                Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_3"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                                Dose <span style="margin-left:4px">:</span><input type="text" name="dose_3"/><br /><br />
                                        
                                                Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_4"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                                Dose <span style="margin-left:4px">:</span><input type="text" name="dose_4"/><br /><br />
                                        
                                                Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_5"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                                Dose <span style="margin-left:4px">:</span><input type="text" name="dose_5"/><br /><br />
                                                
                                                Next appointment<span style="margin-left:38px">:</span><input type="text" name="next_appointment" /> <span style="color:red;"> * YYYY-MM-DD &nbsp;</span> <br /><br />
                                                <input type="submit" value="Submit" name="checkup"></input>
                                            </form>
                                          </center>';
                                }
                            }                        
                        }
                        else{
                            echo '<center>
                                  <br />
                                    <form action="'.htmlspecialchars($current_file).'" method="post">
                                        Disease <span style="margin-left:7px">:</span><textarea style="background:none;color:#333;border:.1px #000 solid;" rows="3" cols="18" name="disease"> </textarea><br /><br />
                                        
                                        Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_1"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Dose <span style="margin-left:4px">:</span><input type="text" name="dose_1"/><br /><br />
                                       
                                        Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_2"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Dose <span style="margin-left:4px">:</span><input type="text" name="dose_2"/><br /><br />
                                        
                                        Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_3"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Dose <span style="margin-left:4px">:</span><input type="text" name="dose_3"/><br /><br />
                                        
                                        Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_4"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Dose <span style="margin-left:4px">:</span><input type="text" name="dose_4"/><br /><br />
                                        
                                        Medicine <span style="margin-left:0px">:</span><input type="text" name="medicine_5"/> &nbsp;&nbsp;&nbsp;&nbsp;
                                        Dose <span style="margin-left:4px">:</span><input type="text" name="dose_5"/><br /><br />
                                        
                                        Next appointment<span style="margin-left:38px">:</span><input type="text" name="next_appointment" /> <span style="color:red;"> * YYYY-MM-DD &nbsp;</span> <br /><br />
                                        
                                        <input type="submit" value="Submit" name="checkup"></input>
                                    </form>
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
<script src="js/jquery-1.11.1.js"></script>
<script src="js/front.js"></script>

</body>
</html>