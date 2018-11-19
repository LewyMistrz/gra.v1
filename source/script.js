function getNick() {	
	var result = false;
    $.ajax({
        type: "POST",
        url: 'getStat.php',
        data: ({ stat: "nick" }),
        dataType: "text",
        //line added to get ajax response in sync
        async: false,
        success: function(data) {
            result = data;
        },
        error: function() {
            alert('Error occured');
        }
    });
    return result;
}

function getStat(nick) {	
	var result = false;
    $.ajax({
        type: "POST",
        url: 'getStat.php',
        data: ({ nick: nick}),
        dataType: "text",
        //line added to get ajax response in sync
        async: false,
        success: function(data) {
            result = data;
        },
        error: function() {
            alert('Error occured');
        }
    });
    return result;
}

function atakuj() {
	
	
}

function changeEnemy() {
		
}

function whichClass(stat) {
	ChampionClass = stat.ChampionClass;
	if(ChampionClass == "Archer" || ChampionClass == "Assasin")
				return result = "Zręczność";
			else if(ChampionClass == "Palladin" || ChampionClass == "Warrior")
				return result = "Siła";
			else if(ChampionClass == "Mage" || ChampionClass == "Dark mage")
				return result = "Inteligencja";
}

function lookForNickChange() {
		newNick = document.getElementById("nickName").value
		var nick;
    if (newNick != nick) {
        nick = newNick;
        isLoginAvaible(newNick);
    }
}

function isLoginAvaible(login){
	link = 'isLoginUsed.php?name=' + login; 
	var data;
	jQuery.ajax({
        url: link,
        type: 'GET',
        dataType: 'text',
        success:function(data)
        {
			if(data == 1) 
				document.getElementById("nickName").setAttribute("style", "background-color: red;");
			 else 
				document.getElementById("nickName").setAttribute("style", "background-color: green;");
				
        } 
     });
}

function chooseClass(klasa) {
	document.getElementById("championClass").setAttribute("value", klasa);
	
	if (klasa == 'Assasin'){
	document.getElementById("1").setAttribute("style","border-color: red");
	
	document.getElementById("2").setAttribute("style","border-color: #1967e5");
	document.getElementById("3").setAttribute("style","border-color: #1967e5");
	document.getElementById("4").setAttribute("style","border-color: #1967e5");
	document.getElementById("5").setAttribute("style","border-color: #1967e5");
	document.getElementById("6").setAttribute("style","border-color: #1967e5");
	}
	if (klasa == 'Dark mage') {
	document.getElementById("2").setAttribute("style","border-color: red");
	
	document.getElementById("1").setAttribute("style","border-color: #1967e5");
	document.getElementById("3").setAttribute("style","border-color: #1967e5");
	document.getElementById("4").setAttribute("style","border-color: #1967e5");
	document.getElementById("5").setAttribute("style","border-color: #1967e5");
	document.getElementById("6").setAttribute("style","border-color: #1967e5");
	}
	if (klasa == 'Mage') {
	document.getElementById("3").setAttribute("style","border-color: red");
	
	document.getElementById("2").setAttribute("style","border-color: #1967e5");
	document.getElementById("1").setAttribute("style","border-color: #1967e5");
	document.getElementById("4").setAttribute("style","border-color: #1967e5");
	document.getElementById("5").setAttribute("style","border-color: #1967e5");
	document.getElementById("6").setAttribute("style","border-color: #1967e5");
	}
	if (klasa == 'Palladin') {
	document.getElementById("4").setAttribute("style","border-color: red");
	
	document.getElementById("2").setAttribute("style","border-color: #1967e5");
	document.getElementById("3").setAttribute("style","border-color: #1967e5");
	document.getElementById("1").setAttribute("style","border-color: #1967e5");
	document.getElementById("5").setAttribute("style","border-color: #1967e5");
	document.getElementById("6").setAttribute("style","border-color: #1967e5");
	}
	if (klasa == 'Archer') {
	document.getElementById("5").setAttribute("style","border-color: red");
	
	document.getElementById("2").setAttribute("style","border-color: #1967e5");
	document.getElementById("3").setAttribute("style","border-color: #1967e5");
	document.getElementById("4").setAttribute("style","border-color: #1967e5");
	document.getElementById("1").setAttribute("style","border-color: #1967e5");
	document.getElementById("6").setAttribute("style","border-color: #1967e5");
	}
	if (klasa == 'Warrior') {
	document.getElementById("6").setAttribute("style","border-color: red");
	
	document.getElementById("2").setAttribute("style","border-color: #1967e5");
	document.getElementById("3").setAttribute("style","border-color: #1967e5");
	document.getElementById("4").setAttribute("style","border-color: #1967e5");
	document.getElementById("5").setAttribute("style","border-color: #1967e5");
	document.getElementById("1").setAttribute("style","border-color: #1967e5");
	}
}

function setStat(stat) {
	link = 'setStat.php'; 
	var data;
	jQuery.ajax({
        url: link,
        type: 'POST',
		data: ({ plus: stat }),
        dataType: 'text',
        success:function(data)
        {
			if(data == "dodano punkty") 
				showStat();
        } 
     });
}

