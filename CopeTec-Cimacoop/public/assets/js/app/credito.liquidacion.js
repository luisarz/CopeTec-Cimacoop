
$(document).ready(function () {



    $('#id_cuenta').on('change', function () {
        let destinoCredito = $('#destino_credito').val();
        let id_cuenta = $(this).val();
        if (destinoCredito == id_cuenta) {
            let cuota = $('#monto_credito').val();
            cuota = parseFloat(cuota).toFixed(2);

            $("#monto_debe").val(cuota);
            Swal.fire({
                icon: 'success',
                title: 'Aplicacion el monto de la credito',
                text: 'Has seleccionado la cuenta destino de la credito.',
                timer: 1000,
            });
        } else {
            $("#monto_debe").val(0);
        }
        $("#monto_haber").val(0);
    });



    $("#btnAplicarDescuento").on("click", function (e) {

        e.preventDefault();
        let id_cuenta = $("#id_cuenta").val();
        if (id_cuenta == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes seleccionar una cuenta',
                confirmButtonText:"Corregir datos",
                customClass: {
                    confirmButton:"btn btn-danger"
                }
            });
            return false;
        }


        let data = {
            "id_cuenta": $("#id_cuenta").val(),
            "monto_debe": $("#monto_debe").val(),
            "monto_haber": $("#monto_haber").val(),
            "id_credito": $("#id_credito").val(),
            "comentario": $("#comentario").val(),
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/creditos/preaprobado/liquidar/add-descuento",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                swal.close();
                getLiquidacionesDetalles();
                $("#id_cuenta").val("").change();
                $("#monto_debe").val(0);
                $("#monto_haber").val(0);
            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
            dataType: "json" // Especifica el tipo de datos esperados en la respuesta
        });

        $("#id_cuenta").val("").change();
        $("#monto_debe").val(0);
        $("#monto_haber").val(0);


    });


    $("#btnLiquidar").on("click", function (e) {

        e.preventDefault();
        let liquido = $("#liquido").val();
        if (liquido == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Debes detalles, la liquidación del credito',
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }


        let id_cuenta_ahorro_destino = $("#id_cuenta_ahorro_destino").val();
        let id_cuenta_aportacion_destino = $("#id_cuenta_aportacion_destino").val();
        if (id_cuenta_ahorro_destino == id_cuenta_aportacion_destino) {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: 'La cuenta de <b>ahorro</b> y <b>aportaciones</b> deben ser diferentes',
                confirmButton: false,
                cancelButton: true,
                confirmButtonText: 'Volver y seleccionar datos correctos',
                customClass: {
                    confirmButton: "btn btn-danger"
                }

            });
            return false;
        }





        Swal.fire({
            icon: 'question',
            title: 'Liquidar crédito',
            html: '¿Estás seguro de que deseas liquidar y desembolsar este crédito? <br> Liquido a depositar <span class=\" badge badge-danger fs-4\">  $' + liquido +'</span>',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, liquidar crédito ' ,
            cancelButtonText: 'Cancelar',
            allowEscapeKey: false,     // Evita que se cierre con la tecla "Escape"
            allowOutsideClick: false,  // Evita que se cierre al hacer clic fuera del cuadro
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-info"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                // Aquí puedes agregar la lógica para liquidar y desembolsar el crédito
                liquidarCredito();


            } else {
                // Aquí puedes agregar la lógica para manejar la cancelación
                // realizarOtraAccion();
            }
        });










    });

    window.liquidarCredito = function (id) {
        let id_credito = $("#id_credito").val();

        let data = {
            "id_credito": $("#id_credito").val(),
            "liquido": $("#liquido").val(),
            "id_cuenta_ahorro_destino": $("#id_cuenta_ahorro_destino").val(),
            "id_cuenta_aportacion_destino": $("#id_cuenta_aportacion_destino").val(),
            "aportacionMonto": $("#aportacionMonto").val(),
            "id_caja_aperturada":$("#id_caja_aperturada").val(),
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/creditos/solicitudes/liquidar",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {


                if (response.estado == "success") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Crédito liquidado',
                        text: 'El crédito ha sido liquidado exitosamente.',
                        willClose: () => {
                            // Redirige a la nueva página en una pestaña nueva
                            window.open('/creditos/aprobado/liquidacion/'+id_credito, '_blank');
                            
                            // Después de 1 segundo, redirige a otra página en la pestaña actual
                            setTimeout(() => {
                                window.location.href = '/creditos/solicitudes/estudios';
                            }, 1000);
                        }
                    });


                    // setTimeout(() => {
                    // }, 1000);
                    //mandar a imprimir la hoja de liquidacion
                }


            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
            dataType: "json" // Especifica el tipo de datos esperados en la respuesta
        });

    }





    getLiquidacionesDetalles = function () {
        let id_credito = $("#id_credito").val();
        $.get("/creditos/preaprobado/liquidar/getDescuentos/" + id_credito, function (data) {
            let tableLiquidaciones = $("#tableLiquidaciones");
            tableLiquidaciones.empty();
            let numero = 0;
            $("#aportacionMonto").val(data.aportacion);
            $("#liquido").val(data.liquido);

            $.each(data.liquidaciones, function (index, element) {
                $("#clase_propiedad").val("");
                $("#direccion_bien").val("");
                $("#valor_bien").val(0);
                $("#hipotecado_bien").val(0);

                numero = index + 1;
                let id_liquidacion = element.id_liquidacion;
                let row = $("<tr>");
                row.append($("<td style='text-align:center;'>").html(
                    `<a href="javascript:void(0);" onclick="quitarDescuento(${id_liquidacion})"><span class='btn btn-sm btn-danger'>Quitar</span></a>`
                ));
                row.append($("<td>").text(element.numero));
                row.append($("<td>").html(element.descripcion + '<br/>' + ((element.comentario == null) ? '' : '<span class="badge badge-light-danger fs-4">' +  element.comentario+'</span>')));

                row.append($("<td style='text-align:right;'>").text('$ ' + parseFloat(element.monto_debe).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')));
                if (data.liquido == element.monto_haber) {
                    row.append($("<td style='text-align:right;' >").html("<span class='badge badge-success fs-4'> $ " + parseFloat(element.monto_haber).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',') + "</span>"));

                } else {
                    row.append($("<td style='text-align:right;'>").text('$ ' + parseFloat(element.monto_haber).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')));
                }
                tableLiquidaciones.append(row);

            });
            var formattedMontoDebe = '$' + data.sumMontoDebe;
            var formattedMontoHaber = '$' + data.sumMontoHaber;
            $('#montoDebe').text(formattedMontoDebe);
            $('#montoHaber').text(formattedMontoHaber);
        });


    }

    window.quitarDescuento = function (id) {
        Swal.fire({
            text: "Deseas Eliminar este registro",
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "Si",
            cancelButtonText: 'No',
            customClass: {
                confirmButton: "btn btn-warning",
                cancelButton: "btn btn-secondary"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.get("/creditos/preaprobado/liquidar/quitarDescuento/" + id, function (data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminado exitoso',
                        text: 'El bien  ha sido eliminada correctamente.',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        allowEnterKey: false,
                    });

                    getLiquidacionesDetalles();
                });
            } else if (result.isDenied) { }
        });
    }

    getLiquidacionesDetalles();

});
