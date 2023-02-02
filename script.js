//function for soloTrollpick
let trollpick = {
    name: "",
    champion: "",
    lane: "",
    rune: "",
    sBonus: "",
    summoner: "",
    item: "",
    spell: ""
}
let counterRune = 0;
let itemCounter = 0;

function saveData(){
    trollpick.name = document.getElementById('title').value

}

function catchChampion(champion){

    document.getElementById("champion_" + champion).style.border = "4px solid green";
    let exChampion = trollpick.champion;
    trollpick.champion = champion;
    document.getElementById("champion_" + exChampion).style.border = "none";

}

function catchRole(role){

        document.getElementById(role).style.border = "4px solid green";
        let exRole = trollpick.lane;
        trollpick.lane = role;
        document.getElementById(exRole).style.border = "none";
}

function catchRune(rune){

    let runeOut;
    if (trollpick.rune == ""){
    runeOut = {
        0: "",
        1: "",
        2: "",
        3: "",
        4: "",
        5: "",
        }
    }else {
        runeOut = trollpick.rune;
    }

    if (counterRune > 5) {
        for (let i = 0; i < 6; i++) {
            document.getElementById("rune_" + trollpick.rune[i]).style.border = "none";
            document.getElementById("rune_" + trollpick.rune[i]).setAttribute("onclick", "catchRune(" + trollpick.rune[i] + ")");
            trollpick.rune[i] = "";
        }
        counterRune = 0;
    }
    document.getElementById("rune_" + rune).style.border = "4px solid green";
    document.getElementById("rune_" + rune).setAttribute("onclick", "deselectRune(" + rune + ")");
    runeOut[counterRune] = rune;
    counterRune++;
    trollpick.rune = runeOut;
}

function deselectRune(rune){
    document.getElementById("rune_" + rune).style.border = "none";
    document.getElementById("rune_" + rune).setAttribute("onclick", "catchRune(" + rune + ")");
    counterRune--;
    for (let i = 0; i < 6; i++) {
        if (trollpick.rune[i] == rune){
            trollpick.rune[i] = "";
        }
    }
}

function catchSummoner(summoner){
    let summonerOut = trollpick.summoner;
    let counter = 0;
    if (summoner == trollpick.summoner.one || summoner == trollpick.summoner.two){
       document.getElementById("error").innerHTML = "Impossibile selezionare due summoner uguali!";
    }else {
        if (summonerOut.one == null) {
            summonerOut = {one: summoner, two: null};
            document.getElementById(summoner).style.border = "4px solid green";
            trollpick.summoner = summonerOut;
        } else if (summonerOut.one != null && summonerOut.two == null) {
            summonerOut.two = summoner;
            document.getElementById(summoner).style.border = "4px solid green";
        } else if (summonerOut.one != null && summonerOut.two != null) {
            document.getElementById(summoner).style.border = "4px solid green";
            let exSummoner;
            if (counter == 0) {
                exSummoner = trollpick.summoner.one;
                counter++;
            } else {
                exSummoner = trollpick.summoner.two;
                counter--;
            }
            trollpick.summoner = summonerOut;
            document.getElementById(exSummoner).style.border = "none";
        }
    }
}

function catchItem(item){


    let itemOut;
    if (trollpick.item == ""){
        itemOut = [];
    }else {
        itemOut = trollpick.item;
    }

    //colore
    let color = "4px solid blue";
    if (itemCounter < 2){
        color = "4px solid blue"
    }
    else if (itemCounter == 2){
        color = "4px solid saddlebrown";
    }else if (itemCounter >= 3 && itemCounter < 8){
        color = "4px solid green";
    }else{
        color = "4px solid blue"
    }
    if (itemCounter > 7) {
        for (let i = 0; i < 8; i++) {
            document.getElementById("item_" + itemOut[i]).style.border = "none";
            document.getElementById("item_" + itemOut[i]).setAttribute("onclick", "catchItem(" + itemOut[i] + ")");
            trollpick.item[i] = "";
        }
        itemCounter = 0;
    }

    document.getElementById("item_" + item).style.border = color;
    document.getElementById("item_" + item).setAttribute("onclick", "deselectItem(" + item + ")");
    itemOut[itemCounter] = item;
    itemCounter++;
    trollpick.item = itemOut;

}

function deselectItem(item){
    document.getElementById("item_" + item).style.border = "none";
    document.getElementById("item_" + item).setAttribute("onclick", "catchItem(" + item + ")");
    itemCounter--;
    for (let i = 0; i < 8; i++) {
        if (trollpick.item[i] == item){
            trollpick.item[i] = "";
        }
    }
}

function saveData(){
    let spellIn = [];
    let sBuonusIn = [];
    for (let i = 0; i < 3; i++){
        sBuonusIn[i] = document.getElementById("sBonus_" + i).value;
    }
    for (let i = 0; i < 5; i++){
        spellIn[i] = document.getElementById("spell_" + i).value;
    }
    trollpick.name = document.getElementById("title").value;
    trollpick.spell = spellIn;
    trollpick.sBonus = sBuonusIn;

    //check
    if (trollpick.name == ""){
        document.getElementById("error").innerHTML = "Manca il nome del trollpick!";
    }else if (trollpick.champion == ""){
        document.getElementById("error").innerHTML = "Nessun campione selezionato!";
    }else if (trollpick.lane == ""){
        document.getElementById("error").innerHTML = "Manca la lane del trollpick!";
    }else if (trollpick.rune == ""){
        document.getElementById("error").innerHTML = "Mancano le rune del trollpick";
    }else if (trollpick.sBonus == ""){
        document.getElementById("error").innerHTML = "Mancano le statistiche bonus del trollpick";
    }else if (trollpick.summoner == ""){
        document.getElementById("error").innerHTML = "Mancano le summoner del trollpick!";
    }else if (trollpick.item == ""){
        document.getElementById("error").innerHTML = "Mancano gli item del trollpick!";
    }else if(trollpick.spell == ""){
        document.getElementById("error").innerHTML = "Mancano le spell del trollpick!";
    }else {
        document.getElementById("error").innerHTML = "Tutto giusto!";

        let xhr = new XMLHttpRequest();
        xhr.open("POST", "script.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.send(JSON.stringify(trollpick));
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("error").innerHTML = this.responseText;
            }
        }

    }
}

function checkSpell(spell){
    if (spell[3] == "Seleziona una spell:" || spell[0] == "Seleziona una spell:" || spell[1] == "Seleziona una spell:" || spell[2] == "Seleziona una spell:"){
        document.getElementById("error").innerHTML = "Manca una spell!";
    }else if(spell[4] == "Seleziona una spell:"){
        spell.slice(4, 1);
        return spell;
    }else {
        return spell
    }
}

//function for duoTrollpick

let duoTrollpick = [{
    name: "",
    champion: "",
    lane: "",
    rune: {
        firstRune: "",
        secondRune: "",
        },
    sBonus: "",
    summoner: "",
    item: "",
    spell: ""
}, {
    name: "",
    champion: "",
    lane: "",
    rune: {
        firstRune: "",
        secondRune: "",
        },
    sBonus: "",
    summoner: "",
    item: "",
    spell: ""
}];
let championP = 0;
let full = 0;

function catchDuoChampion(champion) {
    if (full) {

    } else {
        document.getElementById("champion_" + champion).style.border = "4px solid green";
        if (championP == 0) {
            championP++;
            duoTrollpick[0].champion = champion;
            document.getElementById("champion_" + champion).setAttribute("onclick", "deselectDuoChampion(" + champion + ")");
        } else {
            championP--;
            duoTrollpick[1].champion = champion
            document.getElementById("champion_" + champion).setAttribute("onclick", "deselectDuoChampion(" + champion + ")");
            full = 1;
        }
    }
}
function deselectDuoChampion(champion){
    full = 0
    document.getElementById("champion_" + champion).style.border = "none";
    document.getElementById("champion_" + champion).setAttribute("onclick", "catchDuoChampion(" + champion + ")");
    if (duoTrollpick[0].champion == champion){
        duoTrollpick[0].champion = "";
        championP = 0;
    }else if(duoTrollpick[1].champion == champion){
        duoTrollpick[1].champion = "";
        championP = 1;
    }
}

let laneP = 0;
let laneFull;

function catchDuoLane(lane) {
    if (laneFull) {
    } else {
        document.getElementById(lane).style.border = "4px solid green";
        if (laneP == 0) {
            laneP++;
            duoTrollpick[0].lane = lane;
            document.getElementById(lane).setAttribute("onclick", "deselectDuoLane('" + lane + "')");
        } else {
            laneP--;
            duoTrollpick[1].lane = lane
            document.getElementById(lane).setAttribute("onclick", "deselectDuoLane('" + lane + "')");
            laneFull = 1;
        }
    }
}

function deselectDuoLane(lane){
    laneFull = 0
    document.getElementById(lane).style.border = "none";
    document.getElementById(lane).setAttribute("onclick", "catchDuoLane('" + lane + "')");
    if (duoTrollpick[0].lane == lane){
        duoTrollpick[0].lane = "";
        laneP = 0;
    }else if(duoTrollpick[1].lane == lane){
        duoTrollpick[1].lane = "";
        laneP = 1;
    }
}

function catchDuoFirstRune(rune_id, champion, row){

    let rune = [];
    if (duoTrollpick[champion]['rune']['firstRune'] != ""){
        rune = duoTrollpick[champion]['rune']['firstRune'];
    }

    if (rune[row] == undefined){
        rune[row] = rune_id;
        document.getElementById("rune_" + rune_id).style.border = "2px solid blue";
        document.getElementById("rune_" + rune_id).setAttribute("onclick", "deselectDuoFirstRune(" + rune_id + ", " + champion + ", " + row + ")");
        duoTrollpick[champion]['rune']['firstRune'] = rune;
    }
}

function catchDuoSummoner(summoner){

}

function catchDuoSpell(row, column, champion){

    let spell = [];

    if (duoTrollpick[champion.substr(9, 1)]['spell'] != ""){
        spell = duoTrollpick[champion.substr(9, 1)]['spell'];
    }
    
    if (spell[column] == undefined){

    spell[column] = document.getElementById("column_" + row).innerHTML;
    document.getElementById("spellRow_" + row + "&Column_" + column).innerHTML = column + 1;
    document.getElementById("spellRow_" + row + "&Column_" + column)
        .setAttribute("onclick", "deselectDuoSpell(" + row + ", " + column + ", '" + champion + "')")
    duoTrollpick[champion.substr(9, 1)]['spell'] = spell;
    }
    
}

function deselectDuoSpell(row, column, champion){
    
    let spell = duoTrollpick[champion.substr(9, 1)]['spell'];

    if (spell[column] != undefined){
        spell[column] = undefined;
        document.getElementById("spellRow_" + row + "&Column_" + column).innerHTML = " ";
        document.getElementById("row_" + row + "&column_" + column)
            .setAttribute("onclick", "catchDuoSpell('" + row + ", " + column + ", " + champion + "')")
        duoTrollpick[champion.substr(9, 1)]['spell'] = spell;
    }
}