/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
require('admin-lte');
require('admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars');
require('admin-lte/plugins/inputmask/bindings/inputmask.binding');
require('admin-lte/plugins/inputmask/jquery.inputmask');

import bsCustomFileInput from 'bs-custom-file-input'
$(document).ready(function () {
    bsCustomFileInput.init();
});
import swal from 'sweetalert';
require("jquery-validation/dist/jquery.validate.min");
require("jquery-validation/dist/localization/messages_fr");

jQuery.validator.setDefaults({
    errorElement: 'span',
    errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
    }
});

window.toastr = require('toastr')

$(".form-validate").each((function () {
    $(this).validate({
        submitHandler: function (form) {
            form.submit()
        }
    })
}));

require('select2');

$('.select2').select2({
    theme: 'bootstrap4'
});

require ('datatables.net');
require('datatables.net-bs4');


$('.dataTable').dataTable({
    "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
    }
});

$('.deleteConfirm').click(function (event) {
    event.preventDefault();
    swal({
        title: "Supprimer?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $('#destroy-form-'+$(this).data("id")).submit();
            }
        })

});

window.moment = require('moment');
require("tempusdominus-bootstrap-4");


$.fn.datetimepicker.Constructor.Default = $.extend({}, $.fn.datetimepicker.Constructor.Default, {
    icons: {
        time: 'far fa-clock',
        date: 'far fa-calendar',
        up: 'far fa-arrow-up',
        down: 'far fa-arrow-down',
        previous: 'far fa-chevron-left',
        next: 'far fa-chevron-right',
        today: 'far fa-calendar-check-o',
        clear: 'far fa-trash',
        close: 'far fa-times'
    }
});

$(document).ready(function () {
    window.livewire.on('toastr', param => {
        toastr[param['type']](param['message'],param['title'])
    });
})

const Sortable = window.Sortable = require('sortablejs');
