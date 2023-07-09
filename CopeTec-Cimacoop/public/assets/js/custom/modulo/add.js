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
                    'modulo': {
                        validators: {
                            notEmpty: {
                                message: 'El campo nombre de modulo es obligatoria'
                            }
                        }
                    },
                    'ruta': {
                        validators: {
                            notEmpty: {
                                message: 'La Ruta del modulo es obligatoria'
                            }
                        }
                    },
                    'orden': {
                        validators: {
                            notEmpty: {
                                message: 'El Orden de modulo es Obligatorio'
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

            validator.revalidateField('modulo');

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
                        document.querySelector("#kt_new_modulo_form").submit();
                    }, 1500);   						
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Tienes algunos errores en tu formulario",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    });
                }
		    });
        });

    }


    // Public Functions
    return {
        // public functions
        init: function() {
            form = document.querySelector('#kt_new_modulo_form');
            submitButton = document.querySelector('#kt_new_modulo_submit');

            handleForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTAuthNewPassword.init();
});
