var popped = 0;

document.addEventListener('click', function(e) {
    if (e.target.className === 'balloon') {
      e.target.style.backgroundColor = "white";
      e.target.textContent = "Pop!";
      popped++;
      checkAll();
    }
});

function checkAll() {
  if ( popped === 10) {
    var ballondiv = document.querySelector(".balloons-div");
    ballondiv.innerHTML = "";
    var noballon = document.querySelector("#non-balloons");
    noballon.style.display = 'block';
  }
}
