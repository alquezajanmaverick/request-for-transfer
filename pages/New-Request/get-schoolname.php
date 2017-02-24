<?php
include("../../Connections/PHPpdo.php");
$db = new DatabaseConnect();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$db->query("SELECT School_Name from tblschools where School_ID = ?");
$db->bind(1,$request->ID);
$x = $db->single();

echo($x['School_Name']);