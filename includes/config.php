<?php

define("conn_error","Could not connect !");
define("mysql_host",getenv('OPENSHIFT_MYSQL_DB_HOST'));
define("mysql_user",getenv('OPENSHIFT_MYSQL_DB_USERNAME'));
define("mysql_pass",getenv('OPENSHIFT_MYSQL_DB_PASSWORD'));
define("mysql_db","medical");

?>
