document.addEventListener('DOMContentLoaded', function() {

    var formCotizacion = document.querySelector('#form-cotizacion');
    formCotizacion.onsubmit = function(e) {
        e.preventDefault();

        var feedbacks = document.querySelectorAll('.invalid-feedback');
        feedbacks.forEach(element => {
            element.innerHTML = "";
        });

        var inputZip1 = document.querySelector('#input-zip1');
        var inputType1 = document.querySelector('#input-type1');
        var inputType2 = document.querySelector('#input-type2');
        var inputZip2 = document.querySelector('#input-zip2');
        var inputCountry = document.querySelector('#input-country');
        var inputWeight = document.querySelector('#input-weight');
        var inputLarge = document.querySelector('#input-large');
        var inputWidth = document.querySelector('#input-width');
        var inputHeight = document.querySelector('#input-height');

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + "/Cotizacion/cotiza";
        var formData = new FormData(formCotizacion);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                alert('bien');
                // var objData = JSON.parse(request.responseText);
                // if (objData.status) {
                //     formCotizacion.classList.remove('was-validated');
                //     window.location = base_url + "/cotizacionResultados";
                // } else if ('errors' in objData) {
                //     var errors = objData.errors;
                //     formCotizacion.classList.add('was-validated');
                //     if ('zipErrors' in errors) {
                //         var zipErrors = errors.zipErrors;
                //         for (var err in zipErrors) {
                //             console.log(zipErrors[err]);
                //         }
                //     }
                // }
            }
        }
    }
});

function activa(el) {
    if (el == 'input-zip2') {
        var country = document.getElementById('input-country'); 
        country.value = "";
        country.disabled = true;
    }
    if (el == 'input-country') {
        var zip2 = document.getElementById('input-zip2');
        zip2.value = "";
        zip2.disabled = true;
    }
    document.getElementById(el).disabled = false;
}