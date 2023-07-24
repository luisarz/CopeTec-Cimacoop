"use strict";

// Class Definition
var KTAuthNewPassword = function() {
    // Elements
    var form;
    var submitButton;
    var validator;

    var handleForm = function(e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(
			form,
			{
				fields: {					 
                    'cliente_operacion': {
                        validators: {
                            notEmpty: {
                                message: 'El Cliente es obligatorio'
                            }, callback: {
                                message: 'El campo no debe estar vacio',
                                callback: function (input) {
                                    return parseInt(input.value) > 0
                                }
                            }
                        }
                    },
                    'dui_operacion': {
                        validators: {
                            notEmpty: {
                                message: 'El DUI del cliente es obligatorio'
                            }
                        }
                    },
                    'monto_saldo': {
                        validators: {
                            notEmpty: {
                                message: 'El Monto Debe es obligatorio'
                            },
                            callback: {
                                message: 'El Orden del modulo debe ser mayor a 0',
                                callback: function(input) {
                                    return parseInt(input.value) > 0
                                }
                            }
                        }
                    }
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger({
                        event: {
                            password: false
                        }  
                    }),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',  // comment to enable invalid state icons
                        eleValidClass: '' // comment to enable valid state icons
                    })
				}
			}
		);

        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validator.revalidateField('cliente_operacion');

            validator.validate().then(function(status) {
		        if (status == 'Valid') {
                    // Show loading indication
                    submitButton.setAttribute('data-kt-indicator', 'on');

                    // Disable button to avoid multiple click 
                    submitButton.disabled = true;

                    // Simulate ajax request
                    setTimeout(function() {
                        // Hide loading indication
                        submitButton.removeAttribute('data-kt-indicator');

                        // Enable button
                        //submitButton.disabled = false;

                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        document.querySelector("#kt_new_abono_form").submit();
                        Swal.fire({
                            text: "El abono se ha registrado correctamente",
                            icon: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then(function (result) {
                            if (result.isConfirmed) {
                                window.location.href = "/abonos";
                                // mandar a imprimir el comprobante
                            }
                        }
                        );
                    }, 1500);   						
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Tienes algunos errores en tu formulario",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        },
                        timer: 1000,
                    });
                    $("#cliente_operacion").focus();
                }
		    });
        });

    }


    // Public Functions
    return {
        // public functions
        init: function() {
            form = document.querySelector('#kt_new_abono_form');
            submitButton = document.querySelector('#kt_new_abono_submit');
            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAuthNewPassword.init();
});
