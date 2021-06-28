document.addEventListener('DOMContentLoaded', function() {

    var formLogin = document.querySelector("#form-login");
    formLogin.onsubmit = function(e) {
        e.preventDefault();

        var feedbacks = document.querySelectorAll('.invalid-feedback');
        feedbacks.forEach(element => {
            element.innerHTML = "";
        });

        var inputEmail = document.querySelector('#input-email');
        var inputPass = document.querySelector('#input-pass');
        
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = base_url + "/Login/iniciaSesion";
        var formData = new FormData(formLogin);
        request.open("POST", ajaxUrl, true);
        request.send(formData);
        request.onreadystatechange = function() {
            if (request.readyState == 4 && request.status == 200) {
                console.log(request);
                var objData = JSON.parse(request.responseText);
                if (objData.status) {
                    formLogin.classList.remove('was-validated');
                    window.location = base_url + "/home";
                // Si hay errores.
                } else if ('errors' in objData) {
                    var errors = objData.errors;
                    formLogin.classList.add('was-validated');
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
                    if ('notVerified' in errors)
                        alert(errors.notVerified);
                } else
                    alert(objData.msg);
            }
        }
        console.log(request);
    }
})