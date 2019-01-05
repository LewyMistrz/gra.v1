<?php
function printText($textID) {
	
	 if (!isset($Language)) {
	 $Language = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']); $Language = strtolower(substr(chop($Language[0]),0,2)); 
	 } 	
	$pl = array ('c1' => "menu główne", 'c2' => "profil");
	$en = array ('c1' => "main menu", 'c2' => "profile");
	$lang = array('pl' => $pl, 'en' => $en); 
	echo $lang[$Language][$textID];
}
?>