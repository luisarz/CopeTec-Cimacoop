"use strict";

// Class Definition
var KTAuthNewPassword = (function () {
    // Elements
    var form;
    var submitButton;
    var validator;
    var payment;
    var monto_saldo;

    var handleForm = function (e) {
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validator = FormValidation.formValidation(form, {
            fields: {
                cliente_operacion: {
                    validators: {
                        notEmpty: {
                            message: "El Cliente es obligatorio",
                        },
                    },
                },
                dui_operacion: {
                    validators: {
                        notEmpty: {
                            message: "El DUI del cliente es obligatorio",
                        },
                    },
                },
                monto_saldo: {
                    validators: {
                        notEmpty: {
                            message: "El Monto Debe es obligatorio",
                        },
                        callback: {
                            message: "El Orden del modulo debe ser mayor a 0",
                            callback: function (input) {
                                return parseInt(input.value) > 0;
                            },
                        },
                    },
                },
            },
            plugins: {
                trigger: new FormValidation.plugins.Trigger({
                    event: {
                        password: false,
                    },
                }),
                bootstrap: new FormValidation.plugins.Bootstrap5({
                    rowSelector: ".fv-row",
                    eleInvalidClass: "", // comment to enable invalid state icons
                    eleValidClass: "", // comment to enable valid state icons
                }),
            },
        });

        submitButton.addEventListener("click", function (e) {
            e.preventDefault();

            validator.revalidateField("cliente_operacion");

            validator.validate().then(function (status) {
                if (status == "Valid") {
                    // Show loading indication
                    submitButton.setAttribute("data-kt-indicator", "on");

                    // Disable button to avoid multiple click
                    // submitButton.disabled = true;

                    // Simulate ajax request
                    setTimeout(function () {
                        // Hide loading indication
                        submitButton.removeAttribute("data-kt-indicator");

                        // Enable button
                        //submitButton.disabled = false;

                        // Show message popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                        //document.querySelector("#kt_new_abono_form").submit();

                        monto_saldo =
                            document.querySelector("#monto_saldo").value;
                        let qty_cuotas = monto_saldo % payment;
                        if (
                            qty_cuotas > 4 ||
                            parseFloat(monto_saldo) > 3000.0
                        ) {
                            Swal.fire({
                                title: "Confirmar/Justificar abono",
                                html: `<label>Justificación de depósito</label>
                                <input type="text" id="justificante" class="swal2-input" placeholder="Justificación de abono:">
                                <label>Presenta comprobante</label>
                                <input type="text" id="comprobante" class="swal2-input" placeholder="Obtuvo comprobante (Sí, No)?">`,
                                confirmButtonText: "Procesar Pago",
                                focusConfirm: false,
                                preConfirm: () => {
                                    const justificante =
                                        Swal.getPopup().querySelector(
                                            "#justificante"
                                        ).value;
                                    const comprobante =
                                        Swal.getPopup().querySelector(
                                            "#comprobante"
                                        ).value;
                                    if (!justificante || !comprobante) {
                                        Swal.showValidationMessage(
                                            `Por favor ingrese justificación y si obtuvo comprobante`
                                        );
                                    }
                                    return {
                                        justificante: justificante,
                                        comprobante: comprobante,
                                    };
                                },
                            }).then((result) => {
                                let data = {
                                    id_credito: $("#id_credito").val(),
                                    id_caja: $("#id_caja").val(),
                                    _token: $("#token").val(),
                                    monto_saldo: monto_saldo,
                                    justificante: result.value.justificante,
                                    comprobante: result.value.comprobante,
                                };

                                $.ajax({
                                    type: "POST",
                                    url: "/alerts/new",
                                    headers: {
                                        "X-CSRF-TOKEN": $(
                                            'meta[name="csrf-token"]'
                                        ).attr("content"),
                                    },
                                    data: data, // No es necesario convertir a JSON.stringify
                                    success: function (response) {
                                        console.log(response);
                                    },
                                    error: function (xhr, status, error) {
                                        swal.close();
                                        console.log(error);
                                    },
                                    dataType: "json", // Especifica el tipo de datos esperados en la respuesta
                                });
                                document
                                    .querySelector("#kt_new_abono_form")
                                    .submit();

                                Swal.fire({
                                    text: "El abono se ha registrado correctamente",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok",
                                    customClass: {
                                        confirmButton: "btn btn-primary",
                                    },
                                    timer: 1000,
                                }).then(function (result) {
                                    window.location.href = "/creditos/abonos";
                                });
                            });
                        } else {
                            Swal.fire({
                                text: "El abono se ha registrado correctamente",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok",
                                customClass: {
                                    confirmButton: "btn btn-primary",
                                },
                                timer: 1000,
                            }).then(function (result) {
                                // window.location.href = "/creditos/abonos";
                            });
                        }
                    }, 1500);
                } else {
                    // Show error popup. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Tienes algunos errores en tu formulario",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok",
                        customClass: {
                            confirmButton: "btn btn-danger",
                        },
                        timer: 1000,
                    });
                    $("#cliente_operacion").focus();
                }
            });
        });
    };

    // Public Functions
    return {
        // public functions
        init: function () {
            form = document.querySelector("#kt_new_abono_form");
            submitButton = document.querySelector("#kt_new_abono_submit");
            payment = document.querySelector("#min_payment").value;
            handleForm();
        },
    };
})();

// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTAuthNewPassword.init();
});
