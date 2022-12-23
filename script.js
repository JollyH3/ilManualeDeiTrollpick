let trollpick = {
    name: "",
    champion: "",
    role: "",
    rune: "",
    summoner: "",
    item: "",
    spell: ""
}

function saveData(){
    trollpick.name = document.getElementById('title').value

}

function catchChampion(champion){

    document.getElementById(champion).style.border = "4px solid blue";
    let exchampion = trollpick.role;
    trollpick.role = champion;
    document.getElementById(champion).style.border = "none";

}

function catchRole(role){
    
        document.getElementById(role).style.border = "4px solid blue";
        let exRole = trollpick.role;
        trollpick.role = role;
        document.getElementById(exRole).style.border = "none";
}