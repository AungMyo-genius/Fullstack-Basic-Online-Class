var pop = 0;
addEventListener("click", function(e){
	// console.log(e.target);
	if(e.target.className === "balloon"){
		e.target.style.backgroundColor = "transparent";
		e.target.style.border = "0";
		e.target.innerText = "BOOM!";
		pop++;
		showUp();
	}
});
var victory = document.getElementById('noballon-div');
var disappear = document.getElementById("balloon-div");
var next = document.getElementById("choosing");
var vicSound = new Audio();
vicSound.src = "victory.mp3"
function showUp(){
	if(pop === 8){
 	victory.style.display = "block";
 	disappear.style.display = "none";
 	next.style.display = "block";
 	vicSound.play();
	}
}
var popB = new Audio();
popB.src = "pop.mp3";