'use strict';

var form = document.querySelector('#formPicture');
var picture = document.querySelector('#picture');
var btn = document.querySelector('#btnSubir');

form.addEventListener('change', (event) => {
    valPicture(picture, '#message-picture');
});

picture.addEventListener('click', () => {
    valPicture(picture, '#message-picture');
});

function valPicture(obj, messageClass) {
    let message = document.querySelector(messageClass);
    let uploadFile = obj.files[0];

    if(uploadFile != null) {
        if (uploadFile.type == 'image/jpg' || uploadFile.type == 'image/png' || uploadFile.type == 'image/jpeg' || uploadFile.type == 'image/svg' || uploadFile.type == 'image/heic' || uploadFile.type == 'image/heif') {
            var img = new Image();
            img.onload = function () {
                if (uploadFile.size > 4000000) {
                    message.classList.add("text-danger");
                    message.classList.remove("text-success");
                    message.innerHTML = "El peso de la imagen no puede exceder los 5 MB.";

                    btn.setAttribute("disabled", "");
                } else {
                    message.classList.add("text-success");
                    message.classList.remove("text-danger");
                    message.innerHTML = "Agregado correctamente.";

                    btn.removeAttribute("disabled", "");
                }
            };

            img.src = URL.createObjectURL(uploadFile);
        } else {
            message.classList.add("text-danger");
            message.classList.remove("text-success");
            message.innerHTML = "El archivo a adjuntar no es una imagen.";

            btn.setAttribute("disabled", "");
        }               
    }
}
