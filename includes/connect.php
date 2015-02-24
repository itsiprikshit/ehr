<?php

	require("config.php");
    $conn = @mysql_connect(mysql_host, mysql_user, mysql_pass);

	if (!$conn)
			die(conn_error);
    else
    {
        if(!@mysql_select_db(mysql_db))
        {
            $sql = 'CREATE Database '.mysql_db;
            $create_db = mysql_query($sql, $conn);

            if(!$create_db)
                die('Could not create database.');
        }
        else
            mysql_select_db(mysql_db);
    }
?>
