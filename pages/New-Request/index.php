<?php require_once('../../Connections/DatabaseConnect.php'); ?>
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

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsLevel = "SELECT DISTINCT(`Level`) FROM tblschools";
$rsLevel = mysql_query($query_rsLevel, $DatabaseConnect) or die(mysql_error());
$row_rsLevel = mysql_fetch_assoc($rsLevel);
$totalRows_rsLevel = mysql_num_rows($rsLevel);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsMunicipality = "SELECT DISTINCT(Municipality) FROM tblschools";
$rsMunicipality = mysql_query($query_rsMunicipality, $DatabaseConnect) or die(mysql_error());
$row_rsMunicipality = mysql_fetch_assoc($rsMunicipality);
$totalRows_rsMunicipality = mysql_num_rows($rsMunicipality);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsSchoolID = "SELECT School_ID FROM tblschools";
$rsSchoolID = mysql_query($query_rsSchoolID, $DatabaseConnect) or die(mysql_error());
$row_rsSchoolID = mysql_fetch_assoc($rsSchoolID);
$totalRows_rsSchoolID = mysql_num_rows($rsSchoolID);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsschName = "SELECT School_Name FROM tblschools";
$rsschName = mysql_query($query_rsschName, $DatabaseConnect) or die(mysql_error());
$row_rsschName = mysql_fetch_assoc($rsschName);
$totalRows_rsschName = mysql_num_rows($rsschName);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsName = "SELECT School_Name FROM tblschools";
$rsName = mysql_query($query_rsName, $DatabaseConnect) or die(mysql_error());
$row_rsName = mysql_fetch_assoc($rsName);
$totalRows_rsName = mysql_num_rows($rsName);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsID = "SELECT School_ID FROM tblschools";
$rsID = mysql_query($query_rsID, $DatabaseConnect) or die(mysql_error());
$row_rsID = mysql_fetch_assoc($rsID);
$totalRows_rsID = mysql_num_rows($rsID);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsLevel2 = "SELECT DISTINCT(`Level`) FROM tblschools";
$rsLevel2 = mysql_query($query_rsLevel2, $DatabaseConnect) or die(mysql_error());
$row_rsLevel2 = mysql_fetch_assoc($rsLevel2);
$totalRows_rsLevel2 = mysql_num_rows($rsLevel2);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsDistrict2 = "SELECT DISTINCT(Municipality) FROM tblschools";
$rsDistrict2 = mysql_query($query_rsDistrict2, $DatabaseConnect) or die(mysql_error());
$row_rsDistrict2 = mysql_fetch_assoc($rsDistrict2);
$totalRows_rsDistrict2 = mysql_num_rows($rsDistrict2);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsName2 = "SELECT School_Name FROM tblschools";
$rsName2 = mysql_query($query_rsName2, $DatabaseConnect) or die(mysql_error());
$row_rsName2 = mysql_fetch_assoc($rsName2);
$totalRows_rsName2 = mysql_num_rows($rsName2);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsID2 = "SELECT School_ID FROM tblschools";
$rsID2 = mysql_query($query_rsID2, $DatabaseConnect) or die(mysql_error());
$row_rsID2 = mysql_fetch_assoc($rsID2);
$totalRows_rsID2 = mysql_num_rows($rsID2);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsLevel3 = "SELECT DISTINCT(`Level`) FROM tblschools";
$rsLevel3 = mysql_query($query_rsLevel3, $DatabaseConnect) or die(mysql_error());
$row_rsLevel3 = mysql_fetch_assoc($rsLevel3);
$totalRows_rsLevel3 = mysql_num_rows($rsLevel3);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsDistrict3 = "SELECT DISTINCT(Municipality) FROM tblschools";
$rsDistrict3 = mysql_query($query_rsDistrict3, $DatabaseConnect) or die(mysql_error());
$row_rsDistrict3 = mysql_fetch_assoc($rsDistrict3);
$totalRows_rsDistrict3 = mysql_num_rows($rsDistrict3);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsName3 = "SELECT School_Name FROM tblschools";
$rsName3 = mysql_query($query_rsName3, $DatabaseConnect) or die(mysql_error());
$row_rsName3 = mysql_fetch_assoc($rsName3);
$totalRows_rsName3 = mysql_num_rows($rsName3);

mysql_select_db($database_DatabaseConnect, $DatabaseConnect);
$query_rsID3 = "SELECT School_ID FROM tblschools";
$rsID3 = mysql_query($query_rsID3, $DatabaseConnect) or die(mysql_error());
$row_rsID3 = mysql_fetch_assoc($rsID3);
$totalRows_rsID3 = mysql_num_rows($rsID3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>New Request</title>
<link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css"/>

<script type="text/javascript" src="../../assets/js/angular.js"></script>
<link rel="stylesheet" type="text/css" href="../../assets/js/jquery-ui.css"/>
<script type="text/javascript" src="script.js"></script>

</head>

<body>
<form action="" method="post" name="xForm">
<div class="container" ng-app="requestApp" ng-controller="requestCtrl">
	<div class="row">
    	<div class="col-md-12 well">
        	<center>
            	<h2>New Request</h2>
                <hr />
                <div class="well">
                	<div class="row">
                    	<div class="col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Item No.</span>
                              <input type="text" id="ItemNo" name="ItemNo" class="form-control"  aria-describedby="basic-addon1" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Employee No.</span>
                              <input type="text" id="EmployeeNo" name="EmployeeNo" class="form-control" aria-describedby="basic-addon1" required="required">
                            </div>
                        </div>
                	</div><br />
                    <div class="row">
                    	<div class="col-md-4">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Firstname</span>
                              <input type="text" id="Firstname" name="Firstname" class="form-control" aria-describedby="basic-addon1" required="required">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Middlename:</span>
                              <input type="text" id="Middlename" name="Middlename" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Lastname</span>
                              <input type="text" id="Lastname" name="Lastname" class="form-control" aria-describedby="basic-addon1" required="required">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Extension</span>
                              <input type="text" id="extension" name="extension" class="form-control" aria-describedby="basic-addon1">
                            </div>
                        </div>
                	</div>

                </div>
                
                <div class="well">
                	<div class="row">
                    	<div class="col-md-6">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">School ID</span>
                              
                              
                              <select type="text" ng-model="curscID" ng-change="getSchName(curscID)" id="SchoolID" name="SchoolID" class="form-control" aria-describedby="basic-addon1" required="required">
                                <?php do { ?><option value="<?php echo $row_rsSchoolID['School_ID']; ?>"><?php echo $row_rsSchoolID['School_ID']; ?></option> <?php } while ($row_rsSchoolID = mysql_fetch_assoc($rsSchoolID)); ?>
                              </select>
                              
                               
                          </div>
                          </div>
                    	<div class="col-md-6">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">School Name</span>
    
                              <select type="text" id="Schoolname" ng-change="getID(schName)" ng-model="schName" name="Schoolname" class="form-control" aria-describedby="basic-addon1" required="required">
                                <?php do { ?>
                                	<option value="<?php echo $row_rsschName['School_Name']; ?>"><?php echo $row_rsschName['School_Name']; ?></option>
                                <?php } while ($row_rsschName = mysql_fetch_assoc($rsschName)); ?>
                                </select>
                                
                          	</div>
                    	</div>
                        
                        <div class="col-md-6">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Date Hired</span>
   							  
                            <input type="text" ng-model="dtphired" id="" size="30" class="dtphired form-control" aria-describedby="basic-addon1">
                                
                       	  </div>
                    	</div>
                        <div class="col-md-6">
                        	<div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Position</span>
   							  
                            <input type="text" id="position" name="position" size="30" class="form-control" aria-describedby="basic-addon1">
                                
                       	  </div>
                    	</div>
                </div>
                </div>
                
                <div class="well">
                	<div class="row">
                    	<div class="col-md-4">
                        	<div class="well">
                            	<center><h3>1st Preference</h3></center>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Level</span>
        
                                  
                                  <select type="text" id="Level1" ng-change="" ng-model="Level1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                    <?php do { ?>
                                    <option value="<?php echo $row_rsLevel['Level']; ?>"><?php echo $row_rsLevel['Level']; ?></option>
                                     <?php } while ($row_rsLevel = mysql_fetch_assoc($rsLevel)); ?>
                                    </select>
                                    
                                   
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">District</span>
        
                                  
                                  <select type="text" id="District1" ng-change="" ng-model="District1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                    <?php do { ?>
                                    <option value="<?php echo $row_rsMunicipality['Municipality']; ?>"><?php echo $row_rsMunicipality['Municipality']; ?></option>
                                    <?php } while ($row_rsMunicipality = mysql_fetch_assoc($rsMunicipality)); ?>
                                    </select>
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School Name</span>
        
                                  
                                  <select type="text" id="SchoolName1" ng-change="" ng-model="SchoolName1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                    <?php do { ?>
                                    <option value="<?php echo $row_rsName['School_Name']; ?>"><?php echo $row_rsName['School_Name']; ?></option>
                                    <?php } while ($row_rsName = mysql_fetch_assoc($rsName)); ?>
                                    </select>
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School ID</span>
        
                                  
                                  <select type="text" id="SchoolID1" ng-change="" ng-model="SchoolID1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                    <?php do { ?>
                                    <option value="<?php echo $row_rsID['School_ID']; ?>"><?php echo $row_rsID['School_ID']; ?></option>
                                    <?php } while ($row_rsID = mysql_fetch_assoc($rsID)); ?>
                                    </select>
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-md-4">
                        	<div class="well">
                            	<center><h3>2nd Preference</h3></center>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Level</span>
        
                                  
                                  
                                  <select type="text" id="Level1" ng-change="" ng-model="Level1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                     <?php do { ?> <option value="<?php echo $row_rsLevel2['Level']; ?>"><?php echo $row_rsLevel2['Level']; ?></option><?php } while ($row_rsLevel2 = mysql_fetch_assoc($rsLevel2)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">District</span>
        
                                  
                                  
                                  <select type="text" id="District1" ng-change="" ng-model="District1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                      <?php do { ?><option value="<?php echo $row_rsDistrict2['Municipality']; ?>"><?php echo $row_rsDistrict2['Municipality']; ?></option><?php } while ($row_rsDistrict2 = mysql_fetch_assoc($rsDistrict2)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School Name</span>
        
                                  
                                  
                                  <select type="text" id="SchoolName1" ng-change="" ng-model="SchoolName1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                     <?php do { ?> <option value="<?php echo $row_rsName2['School_Name']; ?>"><?php echo $row_rsName2['School_Name']; ?></option><?php } while ($row_rsName2 = mysql_fetch_assoc($rsName2)); ?>
                                    </select>
                                  
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School ID</span>
        
                                  
                                 
                                  <select type="text" id="SchoolID1" ng-change="" ng-model="SchoolID1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                       <?php do { ?><option value="<?php echo $row_rsID2['School_ID']; ?>"><?php echo $row_rsID2['School_ID']; ?></option><?php } while ($row_rsID2 = mysql_fetch_assoc($rsID2)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                        	<div class="well">
                            	<center><h3>3rd Preference</h3></center>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">Level</span>
        
                                  
                                  
                                  <select type="text" id="Level1" ng-change="" ng-model="Level1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                      <?php do { ?><option value="<?php echo $row_rsLevel3['Level']; ?>"><?php echo $row_rsLevel3['Level']; ?></option><?php } while ($row_rsLevel3 = mysql_fetch_assoc($rsLevel3)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">District</span>
        
                                  
                                  
                                  <select type="text" id="District1" ng-change="" ng-model="District1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                      <?php do { ?><option value="<?php echo $row_rsDistrict3['Municipality']; ?>"><?php echo $row_rsDistrict3['Municipality']; ?></option><?php } while ($row_rsDistrict3 = mysql_fetch_assoc($rsDistrict3)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School Name</span>
        
                                  
                                  
                                  <select type="text" id="SchoolName1" ng-change="" ng-model="SchoolName1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                      <?php do { ?><option value="<?php echo $row_rsName3['School_Name']; ?>"><?php echo $row_rsName3['School_Name']; ?></option> <?php } while ($row_rsName3 = mysql_fetch_assoc($rsName3)); ?>
                                    </select>
                                    
                                   
                                    
                                </div>
                                <div class="input-group">
                                  <span class="input-group-addon" id="basic-addon1">School ID</span>
        
                                  
                                  
                                  <select type="text" id="SchoolID1" ng-change="" ng-model="SchoolID1" name="level1" class="form-control" aria-describedby="basic-addon1" required="required">
                                      <?php do { ?><option value="<?php echo $row_rsID3['School_ID']; ?>"><?php echo $row_rsID3['School_ID']; ?></option><?php } while ($row_rsID3 = mysql_fetch_assoc($rsID3)); ?>
                                    </select>
                                    
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                        <!-------------------->
                        <div class="col-md-6">
                        <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Date Request</span>
   							  
                            <input type="text" ng-model="dtprequest" id="dtprequest" name="dtprequest" size="30" class="dtphired form-control" aria-describedby="basic-addon1">
                                
                       	  </div>
                        </div>
                        <div class="col-md-6">
                        <div class="input-group">
                              <span class="input-group-addon" id="basic-addon1">Date Received</span>
   							  
                            <input type="text" ng-model="dtpreceived" id="dtpreceived" name="dtpreceived" size="30" class="dtphired form-control" aria-describedby="basic-addon1">
                                
                       	  </div>
                        </div>
                    </div>
                </div>
                
                
            </center>
        
        </div>
    </div>
</div>
</form>

<script src="script.js"></script>

<script type="text/javascript" src="../../assets/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/jqueryui.js"></script>
<script>
$(function(){
   $( ".dtphired" ).datepicker( {dateFormat: 'yy-mm-dd',changeMonth: true,changeYear: true} );
  });

</script>
</body>
</html>
<?php
mysql_free_result($rsLevel);

mysql_free_result($rsMunicipality);

mysql_free_result($rsSchoolID);

mysql_free_result($rsschName);

mysql_free_result($rsName);

mysql_free_result($rsID);

mysql_free_result($rsLevel2);

mysql_free_result($rsDistrict2);

mysql_free_result($rsName2);

mysql_free_result($rsID2);

mysql_free_result($rsLevel3);

mysql_free_result($rsDistrict3);

mysql_free_result($rsName3);

mysql_free_result($rsID3);
?>
