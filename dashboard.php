    <head>
        <title>
            Welcome
        </title>
    </head>

<div class="container-box">
    <div style="background:#d1cddc;" class="align_mid">
        <?php
            if(loggedin()){
            
                //PATIENT DASHBOARD
                
                if(isset($_SESSION['patient_id'])){
                    echo '<br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\'; ">This is your dashboard. <br /><br /> View your medical history here. </span></center>';
                    echo '<img src="images/image_1.jpg" style="margin-left:385px;margin-top:8px" height="70" width="300"></img>';
                    
                    $query = "SELECT * FROM `patient` WHERE `id`='".mysql_real_escape_string($_SESSION['patient_id'])."'";
                        if($query_run = mysql_query($query))
                        {
                            $query_num_rows = mysql_num_rows($query_run);
                            $user_row = mysql_fetch_assoc($query_run);
                        
                            if($query_num_rows == 1)
                            {
                                $id = $user_row['id'];
                                $patient_name = $user_row['patient_name'];
                                $disease = $user_row['disease'];
                                $medicine_1 = $user_row['medicine_1'];
                                $medicine_2 = $user_row['medicine_2'];
                                $medicine_3 = $user_row['medicine_3'];
                                $medicine_4 = $user_row['medicine_4'];
                                $medicine_5 = $user_row['medicine_5'];
                                $dose_1 = $user_row['dose_1'];
                                $dose_2 = $user_row['dose_2'];
                                $dose_3 = $user_row['dose_3'];
                                $dose_4 = $user_row['dose_4'];
                                $dose_5 = $user_row['dose_5'];
                                $last_visited = $user_row['last_visited'];
                                $next_appointment = $user_row['next_appointment'];
                                $doctor_name = $user_row['doctor_name'];
                            
                                echo '<br /><center><span style="color:red">Last Visited: '.$last_visited.'</span><br />
                                                    <span style="">ID: '.$id.'</span><span style="margin-left:150px"></span>
                                                    Name: '.$patient_name.'<br /><br />
                                                    Disease: '.$disease.'<br />
                                                    Medicine: '.$medicine_1.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_1.'<br />
                                                    Medicine: '.$medicine_2.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_2.'<br />
                                                    Medicine: '.$medicine_3.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_3.'<br />
                                                    Medicine: '.$medicine_4.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_4.'<br />
                                                    Medicine: '.$medicine_5.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_5.'<br /> <br />
                                                    
                                                    <center><a href="#"><span style="color:#000;font-size:20px;font-family:\'junction regular\';text-decoration:underline; "> PRINT REPORT </span></a></center>
                                                    
                                                    <span style="color:red">Next appointment: '.$next_appointment.'</span><br />
                                                    Doctor name: '.$doctor_name.'<br />'.
                                                    
                                                    //<table border=1>
                                                    //            <tr>
                                                    //                <th>MEDICINE</th>
                                                    //                <th>DOSE</th>
                                                    //            </tr>
                                                    //            <tr>
                                                    //                <td>'.$user_row['medicine_1'].'</td>
                                                    //                <td>'.$user_row['dose_1'].'</td>
                                                    //            </tr>
                                                    //            <tr>
                                                    //                <td>'.$user_row['medicine_2'].'</td>
                                                    //                <td>'.$user_row['dose_2'].'</td>
                                                    //            </tr>
                                                    //            <tr>
                                                    //                <td>'.$user_row['medicine_3'].'</td>
                                                    //                <td>'.$user_row['dose_3'].'</td>
                                                    //            </tr>
                                                    //            <tr>
                                                    //                <td>'.$user_row['medicine_4'].'</td>
                                                    //                <td>'.$user_row['dose_4'].'</td>
                                                    //            </tr>
                                                    //            <tr>
                                                    //                <td>'.$user_row['medicine_5'].'</td>
                                                    //                <td>'.$user_row['dose_5'].'</td>
                                                    //            </tr>
                                                    //</table>
                                            '</center>';
                            }
                        }
                        echo '<br/><center><form action="upload_file.php" method="post" enctype="multipart/form-data">
                                <label for="file">Upload Report:</label>
                                <input type="file" name="file[]" id="file" multiple="multiple">
                                <input type="submit" name="submit" value="Submit">
                              </form><center>';
                    
                }
                
                //DOCTOR'S DASHBOARD
                elseif(isset($_SESSION['doctor_id'])){
                    echo '<img src="images/doctor.png" style="position:absolute;top:30px;left:150px" height="150px" width="160px"/>';
                    echo '<img src="images/kit.png" style="position:absolute;top:25px;left:660px" height="40" width="40"/>';
                    echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\';text-decoration:underline; "> DOCTOR\'S DASHBOARD </span></center>';
                    
                    //SEARCHING PATIENT
                    if(isset($_POST['search']) && isset($_POST['patient_id']) && !empty($_POST['patient_id'])){
                    
                        echo '<br /><br /><center><form action="'.htmlspecialchars($current_file) .'" method="post">
                                            Search Patient<span style="margin-left:5px">: <input type="text" name="patient_id" />
                                            <input type="submit" value="Search" name="search"></input>
                                        </form>
                                </center>';
                            
                         $patient_id = $_POST['patient_id'];
                         $query = "SELECT * FROM `patient` WHERE `id`='".mysql_real_escape_string($patient_id)."'";
                                                           if($query_run = mysql_query($query)){
                                                                $query_num_rows = mysql_num_rows($query_run);
            
                                                                if($query_num_rows == 0)
                                                                    echo '<center><p style="clear:both"> <span style="color:red;">*Invalid patient id.</span><br /><br /></center>';
                                                                else if($query_num_rows == 1){
                                                                    $user_row = mysql_fetch_assoc($query_run);
                           
				                                                        $_SESSION['patient'] = $user_row['id'];     //patient session from doctor panel
                                                                        
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
                                                                                            <span style="color:red">Proceed to check up. </span><a href="checkup.php"> Click here.</a>
                                                                                    </center>';
                                                                        echo '<br /><center><span style="color#000;font-size:20px;font-family:\'junction regular\';text-decoration:underline">PATIENT\'S PAST HISTORY </span><br /><br /></center>';
                                                                        $disease = $user_row['disease'];
                                                                        $medicine_1 = $user_row['medicine_1'];
                                                                        $medicine_2 = $user_row['medicine_2'];
                                                                        $medicine_3 = $user_row['medicine_3'];
                                                                        $medicine_4 = $user_row['medicine_4'];
                                                                        $medicine_5 = $user_row['medicine_5'];
                                                                        $dose_1 = $user_row['dose_1'];
                                                                        $dose_2 = $user_row['dose_2'];
                                                                        $dose_3 = $user_row['dose_3'];
                                                                        $dose_4 = $user_row['dose_4'];
                                                                        $dose_5 = $user_row['dose_5'];
                                                                        $last_visited = $user_row['last_visited'];
                                                                        $next_appointment = $user_row['next_appointment'];
                                                                        
                                                                        echo   '<center>Disease: '.$disease.'<br />
                                                                                        Medicine: '.$medicine_1.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_1.'<br />
                                                                                        Medicine: '.$medicine_2.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_2.'<br />
                                                                                        Medicine: '.$medicine_3.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_3.'<br />
                                                                                        Medicine: '.$medicine_4.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_4.'<br />
                                                                                        Medicine: '.$medicine_5.' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Dose: '.$dose_5.'<br />
                                                                                        <span style="color:red">Last Visited: '.$last_visited.'</span><br />
                                                                                        <span style="color:red">Next appointment: '.$next_appointment.'</span>
                                                                                </center>';
                                                                }
                                                            }
                    }
                    else{
                        echo '<br /><br /><center><form action="'.htmlspecialchars($current_file) .'" method="post">
                                        Search Patient<span style="margin-left:5px">: <input type="text" name="patient_id" />
                                        <input type="submit" value="Search" name="search"></input>
                                    </form>
                            </center>';
                        
                        // PATIENT'S TREATED
                        echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\';text-decoration:underline; "> PATIENT\'S TREATED </span></center>';
                        
                        $query = "SELECT * FROM `patient` WHERE `doctor_name`='".mysql_real_escape_string($_SESSION['doctor_name'])."'";
                        if($query_run = mysql_query($query)){
                            $query_num_rows = mysql_num_rows($query_run);
                            if($query_num_rows > 0){
                            
                                echo '<br /><br /><center>
                                                            <table border=1>
                                                                <tr>
                                                                    <th>PATIENT ID</th>
                                                                    <th>PATIENT NAME</th>
                                                                    <th>LAST VISITED</th>
                                                                    <th>NEXT APPOINTMENT</th>
                                                                    <th>VIEW PROFILE</th>
                                                                    <th>PRINT</th>
                                                                </tr>';
                                                                
                                while($user_row = mysql_fetch_assoc($query_run))
                                { 
                                      echo '<tr>
                                                <td>'.$user_row['id'].'</td>
                                                <td style="text-transform:capitalize;">'.$user_row['patient_name'].'</td>
                                                <td>'.$user_row['last_visited'].'</td>
                                                <td>'.$user_row['next_appointment'].'</td>
                                                <td><a href="#">View Profile</a></td>
                                                <td><a href="#">Print Report</a></td>
                                            </tr>';
                                            
                                }
                                
                                echo '</table>
                                      <center>';
                            }
                            else{
                                echo '<br /><center><span style="color:red;">No patient treated.</span></center>';
                            }
                        }
                    }
                }

                //ADMIN DASHBOARD
                
                else{
                
                    echo '<br /><br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\';text-decoration:underline; "> ADMIN PANEL </span></center>';
                    echo '<center><img src="images/login.png" style="margin-top:4px" height="100px" width="100px"/>';
                    echo '<br />Welcome <span style="text-transform:capitalize">'.$_SESSION['admin'].'</span></center>';
                    echo '<br /><center><span style="color:#254830;font-size:20px;font-family:\'junction regular\';text-decoration:underline; "> PENDING REQUESTS </span></center>';
                    if(isset($_GET['id']) && !empty($_GET['id'])){
                        $query = "SELECT * FROM `doctor` where `id`='".mysql_real_escape_string($_GET['id'])."'";
                        if($query_run = mysql_query($query)){
                           $user_row = mysql_fetch_assoc($query_run);
                           if($user_row["confirm"] == 0){
                               $query = "UPDATE doctor SET `confirm`=1 where `id`='".mysql_real_escape_string($_GET['id'])."'";
                               mysql_query($query);     
                           }
                        }
                    }
                    $query = "SELECT * FROM `doctor`";
                        if($query_run = mysql_query($query)){
                            while($user_row = mysql_fetch_assoc($query_run)){ 
                                    $doctor_id = $user_row['id'];
                                    $doctor_name = $user_row['doctor_name'];
                                    
                                    echo '<br /><center>Doctor id: '.$doctor_id.'<br />
                                                        Doctor Name: '.$doctor_name.'<br />
                                                </center>';
                                    
                                    if($user_row["confirm"] == 0) {
                                        echo '<center><a href="index.php?id='.$doctor_id.'&status=confirm">Click to confirm</a></center>';
                                    }
                                    else{
                                        echo '<center><span style="color:red;">Confirmed</span></center>';
                                    }
                                }
                        }
                }
            }
            else{
                    header('Location: index.php');
            }
        ?>
    </div>
</div>