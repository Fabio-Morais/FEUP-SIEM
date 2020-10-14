
/*mostra o modal apenas 1 vez*/
$(document).ready(function () {
  var Modal = document.getElementById('id1');
  var key = 'check',
    hadModal = localStorage.getItem(key);
  if (!hadModal) {
    Modal.style.display = "block";
    localStorage.setItem(key, true);
  }
});



/*FUNÇAO QUE CONTA DE start ATE end*/
function animateValue(obj, start, end, duration) {
  let startTimestamp = null;
  const step = (timestamp) => {
    if (!startTimestamp) startTimestamp = timestamp;
    const progress = Math.min((timestamp - startTimestamp) / duration, 1);
    obj.innerHTML = Math.floor(progress * (end - start) + start);
    if (progress < 1) {
      window.requestAnimationFrame(step);
    }
  };
  window.requestAnimationFrame(step);
}



/* ANIMAÇAO DA SECÇAO "NUMEROS"*/
var breakpoint = false;
window.addEventListener('scroll', function () {
  if (!breakpoint) {
    var element = document.querySelector('#numberIcon');
    if(element != null){
      var position = element.getBoundingClientRect();

      /*Se mostrar o <div> dos numeros começa o calculo */
      if (position.top < window.innerHeight && position.bottom >= 0) {
        console.log('Element is partially visible in screen');
        breakpoint = true;
        const obj = document.getElementById('countCourse');
        animateValue(obj, 0, 100, 2000);
        const obj2 = document.getElementById('countClients');
        animateValue(obj2, 0, 200, 2500);
        const obj3 = document.getElementById('countYears');
        animateValue(obj3, 0, 10, 1500);
      }
    }

  }
});


/* ATIVA ANIMAÇOES DE ENTRADA */
AOS.init();


