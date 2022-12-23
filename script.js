let trollpick = [];
function catchChampion(championIn) {
    let champion = {
        name: championIn,
    }
    trollpick.push(champion);
    //se la fuznione viene rechiamata il campione viene tolto dalla lista
    if (trollpick == championIn) {
        let exChampion = trollpick[1].name;
        trollpick.splice(exChampion, 1);
        document.getElementById("exChampion").style.border = "none";
    }else{
        document.getElementById("champion").style.border = "2px solid green";
    }
}