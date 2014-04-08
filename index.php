<?php 
$ns = array("8.8.8.8","8.8.4.4");
if(isset($_POST['input'])){ $ID=$_POST['input'];
$res = dns_get_record("$ID._tox.toxme.se",DNS_TXT,$ns);
} else { $res = false;}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Tox ID Resolver</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">

<?php
if(isset($ID)){
if($res!=false){
$res = $res[0]['txt'];
$res = explode(";",$res);
$res[1] = explode("=",$res[1]);
$ID = $res[1][1];
if(isset($res[2])){$res[2]=explode("=",$res[2]); $sign = $res[2][1];}

echo "<div class=\"alert alert-success\"><b>Found!</b><br /> ID: $ID";
if(isset($sign)){echo " <br /> Sign: $sign";}
echo "</div>";
} else {
echo "<div class=\"alert alert-danger\"><b>Error</b>: $ID not found</div>";
}} ?>

<link rel="stylesheet" href="assets/solid-blue.css" type="text/css" />
<script type="text/javascript" src="formoid_files/formoid1/jquery.min.js"></script>

<form class="formoid-solid-blue" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">
    <div class="title"><h2>Tox ID Resolver</h2></div>
	<div class="element-input">
		<label class="title"><span class="required">*</span></label>
		<div class="item-cont"><input class="large" type="text" name="input" required="required" placeholder="Username"/><span class="icon-place"></span></div>
	</div>
	<div class="submit"><input type="submit" value="Resolve"/></div>
</form>
<script type="text/javascript" src="assets/solid-blue.js"></script>


</body>
</html>
