function showPlayableMove() {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      var res = this.response;
      console.log(res);

      res["list_idBox"].forEach((idBox) => {
        document.getElementsByName(idBox)[0].classList.add("container_playableState");
        document.getElementsByName(idBox)[0].classList.add("isPlayable");
      });
    } else if (this.readyState == 4) {
      alert("Une erreur est survenue..");
    } else if (this.statusText == "parsererror") {
      alert("Erreur Json");
    }
  };

  xhr.open("POST", "../../ajax/playableMove/showPlayableMove.php", true);
  xhr.responseType = "json";
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  console.log(selected_pawn);
  xhr.send("idPawn=" + encodeURI(selected_pawn));
}
