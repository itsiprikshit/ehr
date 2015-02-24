<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function loggedin()
{
    if((isset($_SESSION['patient_id']) && !empty($_SESSION['patient_id'])) || (isset($_SESSION['doctor_id']) && !empty($_SESSION['doctor_id'])) || (isset($_SESSION['admin']) && !empty($_SESSION['admin'])))
        return true;
    else
        return false;
}
?>