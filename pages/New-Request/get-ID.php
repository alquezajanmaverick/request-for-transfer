<?php
include("../../Connections/PHPpdo.php");
$db = new DatabaseConnect();
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);


$db->query("SELECT School_ID from tblschools where School_Name = ?");
$db->bind(1,$request->ID);
$x = $db->single();

echo($x['School_ID']);