
$(document).ready(function () {




    $("#btnDetallePartidaAdd").on("click", function (e) {
        e.preventDefault();
        let id_cuenta = $("#id_cuenta").val();
        if (id_cuenta == "") {
            swalError('Oops...', "'Debes seleccionar una cuenta',", "Corregir datos");
            return false;
        }

        let parcial = $("#parcial").val();
        let cargos = $("#cargos").val();
        let abonos = $("#abonos").val();


        if (parcial == 0 && cargos == 0 && abonos == 0) {
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Debes ingresar un monto',
                confirmButtonText: "Corregir datos",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }


        let data = {
            "id_cuenta": id_cuenta,
            "parcial": parcial,
            "cargos": cargos,
            "abonos": abonos,
            "id_partida": $("#id_partida").val(),
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/contabilidad/partidas-detalle/add",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                // swal.close();
                let message = response.message;
                if (response.estado == true) {
                    swalSuccess("Cuenta agregada", message, "Ok");
                    getPartidaDetalles();
                    $("#id_cuenta").val("").change();
                    $("#monto_debe").val(0);
                    $("#monto_haber").val(0);
                } else {
                    swalError("Error, al agregar la cuenta", message, "Corregir datos");
                }

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
            swalError('Oops...', 'Debes detalles, la liquidación del credito', "Corregir datos");
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
            html: '¿Estás seguro de que deseas liquidar y desembolsar este crédito? <br> Liquido a depositar <span class=\" badge badge-danger fs-4\">  $' + liquido + '</span>',
            showCancelButton: true,
            // confirmButtonColor: '#3085d6',
            // cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, liquidar crédito ',
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
                generarPartidaContable();
            } 
        });










    });

    window.generarPartidaContable = function (id) {
        let id_credito = $("#id_credito").val();

        let data = {
            "id_credito": $("#id_credito").val(),
            "liquido": $("#liquido").val(),
            "id_cuenta_ahorro_destino": $("#id_cuenta_ahorro_destino").val(),
            "id_cuenta_aportacion_destino": $("#id_cuenta_aportacion_destino").val(),
            "aportacionMonto": $("#aportacionMonto").val(),
            "id_caja_aperturada": $("#id_caja_aperturada").val(),
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
                            window.open('/creditos/aprobado/liquidacion/' + id_credito, '_blank');

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





    getPartidaDetalles = function () {
        let id_partida = $("#id_partida").val();
        $.get("/contabilidad/partidas-detalle/getPartidaDetalles/" + id_partida, function (data) {
            let tablePartidaDetalles = $("#tablePartidaDetalles");
            tablePartidaDetalles.empty();
            let numero = 0;
            $("#aportacionMonto").val(data.aportacion);
            $("#liquido").val(data.liquido);

            $.each(data.detalles, function (index, element) {


                numero = index + 1;
                let id_detalle_partida_contable = element.id_detalle_partida_contable;
                let row = $("<tr>");
                row.append($("<td style='text-align:center;'>").html(
                    `<a href="javascript:void(0);" onclick="quitarDescuento(${id_detalle_partida_contable})"><span class='btn btn-sm btn-danger'>Quitar</span></a>`
                ));
                row.append($("<td>").text(element.numero));
                row.append($("<td>").html(element.descripcion ));
        
                row.append($("<td style='text-align:right;' >").html(" $ " + parseFloat(element.cargos).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',') ));

                row.append($("<td style='text-align:right;'>").text('$ ' + parseFloat(element.abonos).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')));
                tablePartidaDetalles.append(row);

            });
            var formattedMontoDebe = '$' + data.sumCargos;

            $("#totalAbono").val(data.sumAbonos);
            $("#totalCargo").val(data.sumCargos);
            var formattedMontoHaber = '$' + data.sumAbonos;
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
                $.get("/contabilidad/partidas-detalle/delete/" + id, function (data) {
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

                    getPartidaDetalles();
                });
            }
        });
    }

    getPartidaDetalles();

});
