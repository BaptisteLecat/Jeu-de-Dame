/*function getId(Id){
    alert(Id);
}

let color = document.getElementById(Id)
color.addEventListener("click", function(event){
    parent = color.parentNode;
    parent.style.backgroundColor = "#4B7980"
}, false)*/

var selected_pawn = null;

function selectBox(object){
    if(selected_pawn == null){
        selected_pawn = object.id;
    }else{
        //Déselectionné l'element
        var previousPawn = document.getElementById(selected_pawn);
        //Changement de l'etat
        previousPawn.parentNode.style.backgroundColor = "#4B7980";

        //Set du nouveau pawn
        selected_pawn = object.id;
        //Changement de l'état en selected
        object.parentNode.style.backgroundColor = "#4B7980";
    }
}
