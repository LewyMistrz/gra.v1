<?php
function printText($textID) {
	require 'connectToDatabase.php';
	 if (!isset($Language)) {
	 $Language = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']); $Language = strtolower(substr(chop($Language[0]),0,2)); 
	 } 	
	$result = mysqli_query($i, "select text from language where language='$Language' and textID='$textID'");
	$result = mysqli_fetch_array($result);
	echo $result[0];
}
?>