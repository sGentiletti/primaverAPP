// Validamos, si el indio agregado va a 6 o 7, le pedimos las entrecalles mostrando un input de mas. 

window.onload = function () {
  var betweenStreetsInput = document.getElementById('between_streets');
  var formGroupBetweenStreets = betweenStreetsInput.parentNode.parentNode;
  var grade = document.getElementById('grade');

  var showBetweenStreets = function showBetweenStreets(e) {
    var value = e.target.value;
    var regExp = /(6|7)/g;

    if (regExp.test(value)) {
      if (formGroupBetweenStreets.classList.contains('d-none')) {
        formGroupBetweenStreets.classList.remove('d-none');
        betweenStreetsInput.required = true;
      }
    } else {
      if (!formGroupBetweenStreets.classList.contains('d-none')) formGroupBetweenStreets.classList.add('d-none');
    }
  };

  grade.addEventListener('change', showBetweenStreets);
};
// Fin validador.
