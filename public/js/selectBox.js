var selected_pawn = null;

function selectBox(object){
    if(selected_pawn == null){
        selected_pawn = object.id;
        object.parentNode.classList.add("selected");
    }else{
        //Déselectionné l'element
        var previousPawn = document.getElementById(selected_pawn);
        //Changement de l'etat
        previousPawn.parentNode.classList.remove("selected");
        previousPawn.parentNode.classList.add("unselected");

        //Set du nouveau pawn
        selected_pawn = object.id;
        //Changement de l'état en selected
        object.parentNode.classList.add("selected");
    }

    showPlayableMove();
}
