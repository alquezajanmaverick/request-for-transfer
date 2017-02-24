<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_DatabaseConnect = "localhost";
$database_DatabaseConnect = "dbrft";
$username_DatabaseConnect = "root";
$password_DatabaseConnect = "";
$DatabaseConnect = mysql_pconnect($hostname_DatabaseConnect, $username_DatabaseConnect, $password_DatabaseConnect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>