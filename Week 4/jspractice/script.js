var popped = 0;

document.addEventListener('click',function(e){
  // e.target.style.display = "none";
  if (e.target.className === "balloon") {
    e.target.style.backgroundColor = "white";
    e.target.textContent = "POP!";
    popped++;
    checkAll();
  }
});


function checkAll()
{
  if (popped === 10) {
    var balloondiv = document.querySelector('.balloon-div');
    balloondiv.innerHTML = '';
    var noballondiv = document.querySelector('#no-balloons');
    noballondiv.style.display = 'block';
  }
}
