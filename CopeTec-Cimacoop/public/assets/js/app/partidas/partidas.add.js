
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


        if (cargos == 0 && abonos == 0) {
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
            "tipo_partida": $("#tipo_partida").val(),
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/contabilidad/partidas-detalle/add",
            data: data,
            success: function (response) {
                // swal.close();
                let message = response.message;
                if (response.estado == true) {
                    swalSuccess("Cuenta agregada", message, "Ok");

                    if ($("#num_partida").val() == "") {
                        let num_partida = response.numero_partida;
                        $("#num_partida").val((response.numero_partida != null) ? response.numero_partida : "");
                    }

                    getPartidaDetalles();
                    $("#cargos").val(0);
                    $("#abonos").val(0);
                    $("#id_cuenta").val("").change();
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


    $("#btnProcesarPartida").on("click", function (e) {

        e.preventDefault();

        let montoDebeText = $("#montoDebe").text();
        let montoHaberText = $("#montoHaber").text();

        // Remover símbolo "$" y comas de los textos
        montoDebeText = montoDebeText.replace('$', '').replace(',', '');
        montoHaberText = montoHaberText.replace('$', '').replace(',', '');

        let montoDebe = parseFloat(montoDebeText);
        let montoHaber = parseFloat(montoHaberText);

        let fecha_partida = $("#fecha_partida").val();
        let tipo_partida = $("#tipo_partida").val();
        let concepto = $("#concepto").val();

        if (fecha_partida == "" || tipo_partida == "" || concepto == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...  ',
                html: `Los siguientes datos son obligatorios
                         <ul style="list-style-type: none; text-align: left;">
                            <li><i class='fa fa-check fs-4 text-danger'></i> <b>Fecha</b></li>
                            <li><i class='fa fa-check fs-4 text-danger'></i><b>Tipo de Cuenta</b></li>
                            <li><i class='fa fa-check fs-4 text-danger'></i><b>Concepto</b></li>
                        </ul>
                    `,
                confirmButton: false,
                cancelButton: true,
                confirmButtonText: 'Volver y seleccionar datos correctos',
                customClass: {
                    confirmButton: "btn btn-danger"
                }

            });
            return false;
        }




        if (montoDebe != montoHaber) {
            swalError('Oops...', 'Los Saldos no coinciden', "Corregir datos");
            return false;
        }







        Swal.fire({
            icon: 'question',
            title: 'Generar partida?',
            html: '¿Estás seguro de que deseas generar la siguiente partida? <br>Cargos <span class=\" badge badge-light-danger fs-5\">  $' + montoDebeText + '</span> Abonos <span class=\" badge badge-light-danger fs-5\">  $' + montoHaberText + '</span>',
            showCancelButton: true,
            confirmButtonText: 'Sí, procesar Partida',
            cancelButtonText: 'Cancelar',
            allowEscapeKey: false,
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-info"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                generarPartidaContable();
            }
        });










    });

    window.generarPartidaContable = function () {
        let id_partida = $("#id_partida").val();

        let data = {
            "id_partida": $("#id_partida").val(),
            "num_partida": $("#num_partida").val(),
            "yearContable": $("#yearContable").val(),
            "fecha_partida": $("#fecha_partida").val(),
            "tipo_partida": $("#tipo_partida").val(),
            "concepto": $("#concepto").val(),
            "monto": $("#totalCargo").val(),
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/contabilidad/partidas/put",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {


                if (response.estado == "success") {

                    Swal.fire({
                        icon: 'success',
                        title: 'Partida',
                        text: 'La partida contable fue procesada  exitosamente.',
                        willClose: () => {
                            // Redirige a la nueva página en una pestaña nueva
                            window.open('/reportes/partidaContable/' + id_partida, '_blank');

                            // Después de 1 segundo, redirige a otra página en la pestaña actual
                            setTimeout(() => {
                                window.location.href = '/contabilidad/partidas';
                            }, 1000);
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
            // dataType: "json" // Especifica el tipo de datos esperados en la respuesta
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
                row.append($("<td>").html(element.descripcion));

                row.append($("<td style='text-align:right;' >").html(" $ " + parseFloat(element.cargos).toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',')));

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
