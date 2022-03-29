// const router = require('express').Router();
// const { db, Sequelize } = require('../conexionBD');
// var nodemailer = require('nodemailer');
// var smtpTransport = require('nodemailer-smtp-transport');



let burgerMenu = document.getElementById("burgerMenu");

let nombreMsj = document.getElementById("name");
let empresa = document.getElementById("empresa");
let telefono = document.getElementById("telefono");
let mail = document.getElementById("mail");
let usuarios = document.getElementById("usuarios");
let mensaje = document.getElementById("mensaje");
let check = document.getElementById("cbox1");
let debeAc = document.getElementById("debeAc");

let irAgenda = () => {
    window.open("https://calendly.com/adtrazalog/demo-trazalog");
}

// #sendMailForm takes the data from the form with given ID
$('#sendMailForm').submit(function (e) {
    e.preventDefault();
    // if (check.checked) {
    //debeAc.style.display = "none";
    var data = {
        'name': $('#name').val(),
        'empresa': $('#empresa').val(),
        'telefono': $('#telefono').val(),
        'mail': $('#mail').val(),
        'usuarios': $('#usuarios').val(),
        'mensaje': $('#mensaje').val()
    };
    // POST data to the php file
    $.ajax({
        url: 'mail.php',
        data: data,
        type: 'POST',
        success: function (data) {
            // For Notification
            document.getElementById("sendMailForm").reset();
            //console.log(data);
            if (data.error) {
                //     $alertDiv.find('.alert').addClass('alert-danger');
                //     $alertDiv.find('.mailResponseText').text(data.message);
                window.location = "https://www.trazalog.com/landing/errorMensaje"

            } else {
                //     $alertDiv.find('.alert').addClass('alert-success');
                //     $alertDiv.find('.mailResponseText').text(data.message);
                window.location = "https://www.trazalog.com/landing/gracias"
            }
        }
    });
    e.preventDefault();
    // }
    // else {
    //     debeAc.style.display = "block";
    //     debeAc.innerHTML = "Debe aceptar términos y condiciones."
    // }
});