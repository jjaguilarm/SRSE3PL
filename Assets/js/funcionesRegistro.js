document.addEventListener('DOMContentLoaded', function() {

    var formRegistro = document.querySelector("#form-registro");
    formRegistro.onsubmit = function(e) {
        e.preventDefault();

        var feedbacks = document.querySelectorAll('.invalid-feedback');
        feedbacks.forEach(element => {
            element.innerHTML = "";
        });

        var inputName = document.querySelector('#input-name');
        var inputEmail = document.querySelector('#input-email');
        var inputPass = document.querySelector('#input-pass');
        
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + "/Registro/registraCliente";
        var formData = new FormData(formRegistro);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    formRegistro.classList.remove('was-validated');
                    //formRegistro.reset();
                    window.location = base_url + "/verificaRegistro";
                // Si hay errores.
                } else if ('errors' in objData) {
                    var errors = objData.errors;
                    formRegistro.classList.add('was-validated');
                    // Errores en el nombre.
                    if ('nameErrors' in errors) {
                        var nameErrors = errors.nameErrors;
                        for (var err in nameErrors) {
                            inputName.setCustomValidity(nameErrors[err]);
                            document.querySelector('#feedback-nombre').innerHTML += inputName.validationMessage + "<br>";
                        }
                    } else
                        inputName.setCustomValidity("");
                    // Errores en el email.
                    if ('emailErrors' in errors) {
                        var emailErrors = errors.emailErrors;
                        for (var err in emailErrors) {
                            inputEmail.setCustomValidity(emailErrors[err]);
                            document.querySelector('#feedback-email').innerHTML += inputEmail.validationMessage + "<br>";
                        }
                    } else
                        inputEmail.setCustomValidity("");
                    // Errores en la contraseña.
                    if ('passErrors' in errors) {
                        var passErrors = errors.passErrors;
                        for (var err in passErrors) {
                            inputPass.setCustomValidity(passErrors[err]);
                            document.querySelector('#feedback-pass').innerHTML += inputPass.validationMessage + "<br>";
                        }
                    } else
                        inputPass.setCustomValidity("");
                    if ('captchaError' in errors) {
                        document.querySelector('#feedback-captcha').innerHTML = errors.captchaError;
                    }
                } else
                    alert(objData.msg);
            }
        }
        console.log(request);
    }
})