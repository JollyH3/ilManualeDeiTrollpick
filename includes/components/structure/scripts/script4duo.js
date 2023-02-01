let firstRune_0;
let removedRune_0;
let secondRune_0;

function chargefirstRune_0(category) {
    if (removedRune_0 != undefined) {
        document.getElementById("secondRune_" + firstRune_0 + "_0").innerHTML = removedRune_0;
    }

    if (secondRune_0 == category){
        document.getElementById("secondRune_0").innerHTML = "";
    }
    firstRune_0 = category;
    removedRune_0 = document.getElementById("secondRune_" + category + "_0").innerHTML;
    document.getElementById("secondRune_" + category + "_0").innerHTML = "";

    fetch("/api/apiRune_0.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + category
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("firstRune_0").innerHTML = response;
    });

}
function chargeSecondRune_0(category){
    if(removedRune_0 == firstRune_0 || removedRune_0 != category) {
        document.getElementById("secondRune_0").innerHTML = "";
    }
    secondRune_0 = category
    
    fetch("/api/apiRune_1.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + category
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("secondRune_0").innerHTML = response;
    });
}

let firstRune_1;
let removedRune_1;
let secondRune_1;

function chargeFirstRune_1(category){
    if (removedRune_1 != undefined) {
        document.getElementById("secondRune_" + firstRune_1 + "_1").innerHTML = removedRune_1;
    }

    if (secondRune_1 == category){
        document.getElementById("secondRune_1").innerHTML = "";
    }
    firstRune_1 = category;
    removedRune_1 = document.getElementById("secondRune_" + category + "_1").innerHTML;
    document.getElementById("secondRune_" + category + "_1").innerHTML = "";

    fetch("/api/apiRune_0.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + category
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("firstRune_1").innerHTML = response;
    });
}

function chargeSecondRune_1(category){
    if(removedRune_1 == firstRune_1 || removedRune_1 != category) {
        document.getElementById("secondRune_1").innerHTML = "";
    }
    secondRune_1 = category
    
    fetch("/api/apiRune_1.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + category
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("secondRune_1").innerHTML = response;
    });
}

function chargeSummoner(champion){
    fetch("/api/apiSummoner.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + champion
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("summoner").innerHTML = response;
    });
}

function chargeItem(champion){
    fetch("/api/apiItem.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + champion
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("item").innerHTML = response;
    });
}

function chargeSpell(champion) {
    
    fetch("/api/apiSpell.php", {
        method: "POST",
        headers: {"Content-type": "application/x-www-form-urlencoded" },
        body: "search=" + champion
    }).then(function (response) {
        return response.text();
    }).then(function (response) {
        document.getElementById("spell").innerHTML = response;
        chargeSelectedSpell(champion);
    });

    
}

function chargeSelectedSpell(champion){
    let row = 0;
    if(duoTrollpick[champion.substr(9, 1)]['spell'] != undefined) {
        for (let j = 0; j < 3; j++){
            for (let i = 0; i < 5; i++){
                if  (duoTrollpick[champion.substr(9, 1)]['spell'][i] == "Q") {
                    row = 0;
                    document.getElementById("spellRow_" + row + "&Column_" + i).innerHTML = i + 1;
                    document.getElementById("spellRow_" + row + "&Column_" + i).setAttribute("onclick", "deselectDuoSpell(" + row + ", " + i + ", '" + champion + "')");    
                }else if (duoTrollpick[champion.substr(9, 1)]['spell'][i] == "W") {
                    row = 1;
                    document.getElementById("spellRow_" + row + "&Column_" + i).innerHTML = i + 1;
                    document.getElementById("spellRow_" + row + "&Column_" + i).setAttribute("onclick", "deselectDuoSpell(" + row + ", " + i + ", '" + champion + "')");
                }else if(duoTrollpick[champion.substr(9, 1)]['spell'][i] == "E") {
                    row = 2;
                    document.getElementById("spellRow_" + row + "&Column_" + i).innerHTML = i + 1;
                    document.getElementById("spellRow_" + row + "&Column_" + i).setAttribute("onclick", "deselectDuoSpell(" + row + ", " + i + ", '" + champion + "')");
                }
                
            }
        }
    }
}