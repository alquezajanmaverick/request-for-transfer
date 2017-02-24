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

$currentPage = $_SERVER["PHP_SELF"];

$maxRows_rsSchools = 10;
$pageNum_rsSchools = 0;
if (isset($_GET['pageNum_rsSchools'])) {
  $pageNum_rsSchools = $_GET['pageNum_rsSchools'];
}
$startRow_rsSchools = $pageNum_rsSchools * $maxRows_rsSchools;

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsSchools = "SELECT * FROM tblschools";
$query_limit_rsSchools = sprintf("%s LIMIT %d, %d", $query_rsSchools, $startRow_rsSchools, $maxRows_rsSchools);
$rsSchools = mysql_query($query_limit_rsSchools, $DatabaseConnect) or die(mysql_error());
$row_rsSchools = mysql_fetch_assoc($rsSchools);

if (isset($_GET['totalRows_rsSchools'])) {
  $totalRows_rsSchools = $_GET['totalRows_rsSchools'];
} else {
  $all_rsSchools = mysql_query($query_rsSchools);
  $totalRows_rsSchools = mysql_num_rows($all_rsSchools);
}
$totalPages_rsSchools = ceil($totalRows_rsSchools/$maxRows_rsSchools)-1;

$maxRows_rsSchools = 10;
$pageNum_rsSchools = 0;
if (isset($_GET['pageNum_rsSchools'])) {
  $pageNum_rsSchools = $_GET['pageNum_rsSchools'];
}
$startRow_rsSchools = $pageNum_rsSchools * $maxRows_rsSchools;

$colname_rsSchools = "-1";
if (isset($_GET['School_Name'])) {
  $colname_rsSchools = $_GET['School_Name'];
  mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsSchools = sprintf("SELECT * FROM tblschools WHERE School_Name LIKE %s", GetSQLValueString("%" . $colname_rsSchools . "%", "text"));
  
}
else
{
mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsSchools = sprintf("SELECT * FROM tblschools");	
}
$query_limit_rsSchools = sprintf("%s LIMIT %d, %d", $query_rsSchools, $startRow_rsSchools, $maxRows_rsSchools);
$rsSchools = mysql_query($query_limit_rsSchools, $DatabaseConnect) or die(mysql_error());
$row_rsSchools = mysql_fetch_assoc($rsSchools);

if (isset($_GET['totalRows_rsSchools'])) {
  $totalRows_rsSchools = $_GET['totalRows_rsSchools'];
} else {
  $all_rsSchools = mysql_query($query_rsSchools);
  $totalRows_rsSchools = mysql_num_rows($all_rsSchools);
}
$totalPages_rsSchools = ceil($totalRows_rsSchools/$maxRows_rsSchools)-1;

$queryString_rsSchools = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsSchools") == false && 
        stristr($param, "totalRows_rsSchools") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsSchools = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsSchools = sprintf("&totalRows_rsSchools=%d%s", $totalRows_rsSchools, $queryString_rsSchools);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="../../assets/fancy/jquery.fancybox.css"/>
<script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../../assets/fancy/jquery.fancybox.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css"/>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>

</head>

<body>


</body>
<div class="container-fluid bg-warning" style="height:100vh;">
	<div class="row">
    	<br />
    	<center><button class="btn btn-primary glyphicon glyphicon-home" onclick="window.location.assign('../Dashboard/')"></button><h1 class="text-white">List of Schools</h1></center>
        <br />
      <form action="" method="get" name="xForm" class="col-md-8 col-md-offset-2">
        <input name="School_Name" id="School_Name" class="form-control"/>
        </form>
      <br />
        <br />
        <div class="col-md-8 col-md-offset-2">
          <table class="table table-responsive table-condensed table-hover" align="center">
              <thead class="bg-primary">
            <td>School_ID</td>
                <td>Level</td>
                <td>Municipality</td>
                <td>School_Name</td>
                <td colspan="2"><center><a href="insert.php" data-fancybox-type="iframe" class="various btn btn-success btn-sm glyphicon glyphicon-plus"></a></center></td>
              </thead>
              <?php do { ?>
            <tr>
                  <td><a href="details.php?recordID=<?php echo $row_rsSchools['School_ID']; ?>"> <?php echo $row_rsSchools['School_ID']; ?>&nbsp; </a></td>
                  <td><?php echo $row_rsSchools['Level']; ?>&nbsp; </td>
                  <td><?php echo $row_rsSchools['Municipality']; ?>&nbsp; </td>
                  <td><?php echo $row_rsSchools['School_Name']; ?>&nbsp; </td>
                  <td><center><a data-fancybox-type="iframe" class="various btn btn-warning btn-xs glyphicon glyphicon-pencil" href="update.php?School_ID=<?php echo $row_rsSchools['School_ID']; ?>" rel="modal:open"></a>
                  </center></td>
                  <td><center><a class="btn btn-danger btn-xs glyphicon glyphicon-trash" href="delete.php?School_ID=<?php echo $row_rsSchools['School_ID']; ?>"></a></center></td>
            </tr>
                <?php } while ($row_rsSchools = mysql_fetch_assoc($rsSchools)); ?>
          </table>
            <br />
            <center>
            <h4>Records <?php echo ($startRow_rsSchools + 1) ?> to <?php echo min($startRow_rsSchools + $maxRows_rsSchools, $totalRows_rsSchools) ?> of <?php echo $totalRows_rsSchools ?></h4>
            <br />
            
            <table border="0">
              <tr>
                <td><?php if ($pageNum_rsSchools > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsSchools=%d%s", $currentPage, 0, $queryString_rsSchools); ?>"><img src="First.gif" /></a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_rsSchools > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsSchools=%d%s", $currentPage, max(0, $pageNum_rsSchools - 1), $queryString_rsSchools); ?>"><img src="Previous.gif" /></a>
                    <?php } // Show if not first page ?></td>
                <td><?php if ($pageNum_rsSchools < $totalPages_rsSchools) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsSchools=%d%s", $currentPage, min($totalPages_rsSchools, $pageNum_rsSchools + 1), $queryString_rsSchools); ?>"><img src="Next.gif" /></a>
                    <?php } // Show if not last page ?></td>
                <td><?php if ($pageNum_rsSchools < $totalPages_rsSchools) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsSchools=%d%s", $currentPage, $totalPages_rsSchools, $queryString_rsSchools); ?>"><img src="Last.gif" /></a>
                    <?php } // Show if not last page ?></td>
              </tr>
            </table>
      </div>
        </center>
        <form action="" method="get">
        </form>
        
  </div>
</div>
<script>
	$(document).ready(function() {
	$(".various").fancybox({
		maxWidth	: 800,
		maxHeight	: 600,
		fitToView	: false,
		width		: '70%',
		height		: '100%',
		autoSize	: true,
		closeClick	: false,
		openEffect	: 'elastic',
		closeEffect	: 'elastic',
		arrows		:  false
	});
});
</script>
</body>
</html>
<?php
mysql_free_result($rsSchools);
?>
