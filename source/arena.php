<style>
input[name="atak"] {
    font-size: 20px;
    width: 10%;
	font-weight: bold;
	font-type: Font;
    background-color: red;
    color: white;
    padding: 12px 12px;
    margin: 20px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[name="newEnemy"] {
    font-size: 20px;
    width: 15%;
	font-weight: bold;
	font-type: Font;
    background-color: blue;
    color: white;
    padding: 12px 12px;
    margin: 20px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

h1 {
    text-shadow: 0px 0px 15px black;
}

@font-face {
font-family: Font;
src: url(/font.ttf);
}

body{
background-attachment: fixed;
background-image: url("graphics/bg.jpg");
background-size: 100%;
background-repeat: no-repeat;
background-attachment: fixed;
}

a:link {
    color: white; 
    background-color: transparent; 
    text-decoration: none;
}

a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}

a:hover {
    color: yellow;
    background-color: transparent;
    text-decoration: none;
}

a:active {
    color: yellow;
    background-color: transparent;
    text-decoration: none;
	

}

div{
  position: relative;
}
img{
    position: absolute;
    margin: auto;
    top: 30%;
    bottom: 0;
    left: 35%;
}

div.a {
    position: absolute;
    margin: auto;
    top: 40%;
    bottom: 0;
    left: 70%;
}

div.b {
    position: absolute;
    margin: auto;
    top: 40%;
    bottom: 0;
    left: 5%;
}

div.c {
    position: absolute;
    margin: auto;
    top: 90%;
    bottom: 0;
    left: 0.1%;
    width: 100%;
}


</style>
<h1>
<a href="profile.php">spierdalam elo</a>
<font size=5 style="font-family: Font" color="white">
<center><font color="red"><b>Odbyt</b><font color="white">e walki: <font color="yellow">&sex<font color="white">/<font color="yellow">15</br><font color="white">
Walcząc na arenie zdobywasz doświadczenie!</br>
Czy chesz się zmierzyć z przeciwnikiem <font color="yellow">&enemyUsername<font color="white">?</br>
<input type="submit" value="Zmień przeciwnika" name="newEnemy"></br></br>

<div class="b">
<b><font color="orange" size="6	">Twoje statystyki</b></font></br></br>
<font color="white">Klasa <font color="yellow">class</br>
<font color="white">Poziom <font color="yellow">lvl</br>
<font color="white">$dmgStatName <font color="yellow">dmgStatAmount</br>
<font color="white">HP <font color="yellow">HP</br>
<font color="white">Cios krytyczny <font color="yellow">szansa na</br>
<font color="white">Mnożnik kryt. <font color="yellow">mnoznikCrit</br>
<font color="white">Blok <font color="yellow">szansa na</br>
</div>

<div class="a">
<b><font color="orange" size="6	">Statystyki przeciwnika</b></font></br></br>
<font color="white">Klasa <font color="yellow">class</br>
<font color="white">Poziom <font color="yellow">lvl</br>
<font color="white">$dmgStatName <font color="yellow">dmgStatAmount</br>
<font color="white">HP <font color="yellow">HP</br>
<font color="white">Cios krytyczny <font color="yellow">szansa na</br>
<font color="white">Mnożnik kryt. <font color="yellow">mnoznikCrit</br>
<font color="white">Blok <font color="yellow">szansa na</br>
</div>

<img src="graphics/postac.jpg">

<div class="c"></br><input type="submit" value="Atak!" name="atak"></div>
</br>