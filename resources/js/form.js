window.onload = function() {

    const betweenStreetsInput = document.getElementById('between_streets');
    const formGroupBetweenStreets = betweenStreetsInput.parentNode.parentNode;
    const grade = document.getElementById('grade');

    const showBetweenStreets = (e) => {
        const { value } = e.target;
        const regExp = /(6|7)/g;

        if(regExp.test(value)) {
            if(formGroupBetweenStreets.classList.contains('d-none')) {
                formGroupBetweenStreets.classList.remove('d-none');
                alert('Completa tus Entrecalles. Va a aparecer para completar debajo de tu dirección');
            }
        } else {
            if(!formGroupBetweenStreets.classList.contains('d-none'))
                formGroupBetweenStreets.classList.add('d-none');
        }
    };
    
    grade.addEventListener('change', showBetweenStreets);

  };
  