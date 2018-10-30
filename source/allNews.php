<head>
 <meta charset="UTF-8">
	<style type="text/css">
		#element {
			color: #FFFFFF;
			border: 2px solid #00282E;
			padding-top: 0%;
			margin: 5%;
			background-color: #002F36;
			}
			
		h1 {
			background-color: #00282E;
			padding: 2%;
			margin-top: 0%;
			}
				
		p {
			padding: 0.5%;
			padding-left: 3%;
			}
			
		a {
			color: #FFFFFF;
			}
	</style>
</head>
	
<?php
include("connectToDatabase.php");
$query = mysqli_query($i, "select * from news order by id");
while($rekord = mysqli_fetch_array($query))
{
$naz = "<div id='element'>
			<div id='name'>
				<h1>Tytuł: $rekord[1] | Autor: $rekord[3] | Data: $rekord[4] </h1>
			</div>
			<div id='inne'>
				<p>$rekord[2]</p>
			</div>
		</div> </br>

		";
		echo '<ul>'.$naz.'</ul>';
}
?>
</body>