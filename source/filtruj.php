<?php
function filtruj($zmienna)
{
	require 'connectToDatabase.php';

    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); 
		$zmienna = htmlspecialchars(trim($zmienna));
        $zmienna = mysqli_real_escape_string($i, $zmienna);
		 return $zmienna;
}
?>