<?php require_once('../../Connections/DatabaseConnect.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "../../index.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "xForm")) {
  $updateSQL = sprintf("UPDATE tblschools SET `Level`=%s, Municipality=%s, School_Name=%s WHERE School_ID=%s",
                       GetSQLValueString($_POST['Level'], "text"),
                       GetSQLValueString($_POST['District'], "text"),
                       GetSQLValueString($_POST['SchoolName'], "text"),
                       GetSQLValueString($_POST['ID'], "int"));

  mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
  $Result1 = mysql_query($updateSQL, $DatabaseConnect) or die(mysql_error());

  $updateGoTo = "index.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsDistrict = "SELECT Distinct(Municipality) FROM tblschools";
$rsDistrict = mysql_query($query_rsDistrict, $DatabaseConnect) or die(mysql_error());
$row_rsDistrict = mysql_fetch_assoc($rsDistrict);
$totalRows_rsDistrict = mysql_num_rows($rsDistrict);

$colname_rsSchools = "-1";
if (isset($_GET['School_ID'])) {
  $colname_rsSchools = $_GET['School_ID'];
}
mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsSchools = sprintf("SELECT * FROM tblschools WHERE School_ID = %s", GetSQLValueString($colname_rsSchools, "int"));
$rsSchools = mysql_query($query_rsSchools, $DatabaseConnect) or die(mysql_error());
$row_rsSchools = mysql_fetch_assoc($rsSchools);
$totalRows_rsSchools = mysql_num_rows($rsSchools);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsLevel = "SELECT Distinct(`Level`) FROM tblschools";
$rsLevel = mysql_query($query_rsLevel, $DatabaseConnect) or die(mysql_error());
$row_rsLevel = mysql_fetch_assoc($rsLevel);
$totalRows_rsLevel = mysql_num_rows($rsLevel);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.css"/>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2 well">
<center><h2>Update School</h2></center>
<br />
<form action="<?php echo $editFormAction; ?>" method="POST" name="xForm">
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">School ID</span>
  <input name="ID" type="text" readonly="" class="form-control" value="<?php echo $row_rsSchools['School_ID']; ?>" />
</div>
<br />
  <div class="input-group">
  <span class="input-group-addon" id="basic-addon1">School Name</span>
  <input name="SchoolName" class="form-control" type="text" value="<?php echo $row_rsSchools['School_Name']; ?>" aria-describedby="basic-addon1"/>
</div>
<br />
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">Level</span>
  <select class="form-control" name="Level">
<?php do { ?>
<option value="<?php echo $row_rsLevel['Level']; ?>" <?php if($row_rsLevel['Level'] == $row_rsSchools['Level']){echo "selected=\'selected\'";} ?> ><?php echo $row_rsLevel['Level']; ?></option>
 <?php } while ($row_rsLevel = mysql_fetch_assoc($rsLevel)); ?>
</select>
</div>
<br />
<div class="input-group">
  <span class="input-group-addon" id="basic-addon1">District</span>
  <select class="form-control" name="District">
  <?php do { ?>
  <option value="<?php echo $row_rsDistrict['Municipality']; ?>" <?php if($row_rsDistrict['Municipality'] == $row_rsSchools['Municipality']){ echo "selected=\'selected\'";} ?>><?php echo $row_rsDistrict['Municipality']; ?></option>
<?php } while ($row_rsDistrict = mysql_fetch_assoc($rsDistrict)); ?>
</select>
</div>
<br />


  
<input type="hidden" name="MM_update" value="xForm" />
<button type="submit" class="btn btn-primary">UPDATE</button>
</form>
</div>
</div>
</div>
</body>
</html>
<?php
mysql_free_result($rsDistrict);

mysql_free_result($rsSchools);

mysql_free_result($rsLevel);
?>
