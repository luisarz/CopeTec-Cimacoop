
$(document).ready(function () {

    const id_compra = $("#id_compra").val();



    $("#btnRegistrarProducto").on("click", function (e) {

        e.preventDefault();
        let numero_fcc = $("#numero_fcc").val();
        let fecha_compra = $("#fecha_compra").val();
        let id_proveedor = $("#id_proveedor").val();


        if (numero_fcc == "" || fecha_compra == "" || id_proveedor == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: 'Estos campos son obligatorios <br>Número de Comprobante Fiscal <br>la Fecha de Compra <br>Proveedor',
                confirmButtonText: "Corregir datos",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }


        let id_producto = $("#id_producto").val();
        let cantidad = $("#cantidad").val();
        let precio = $("#precio").val();
        let total = $("#total").val();


        if (id_producto == "" || cantidad == "" || precio == "" || total == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: 'Estos campos son obligatorios <br>Producto <br>Cantidad <br>Precio',
                confirmButtonText: "Corregir datos",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }





        let data = {
            "id_compra": id_compra,
            "id_producto": id_producto,
            "cantidad": cantidad,
            "precio": precio,
            "total": total,
            "numero_fcc": numero_fcc,
            "fecha_compra": fecha_compra,
            "id_proveedor": id_proveedor,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/compras/add-product",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                swal.close();
                getDetallesCompra();
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
                liquidarCredito();


            } else {
                // Aquí puedes agregar la lógica para manejar la cancelación
                // realizarOtraAccion();
            }
        });










    });

    window.liquidarCredito = function (id) {
        let id_compra = $("#id_compra").val();

        let data = {
            "id_compra": $("#id_compra").val(),
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
                            window.open('/creditos/aprobado/liquidacion/' + id_compra, '_blank');

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





    getDetallesCompra = function () {
        let id_compra = $("#id_compra").val();
        $.get("/compras/detalles/" + id_compra, function (data) {
            let tableDetallesCompra = $("#tableDetallesCompra");
            tableDetallesCompra.empty();
            let numero = 0;
            $("#aportacionMonto").val(data.aportacion);
            $("#liquido").val(data.liquido);

            $.each(data.detalles, function (index, element) {

                numero = index + 1;
                let id_detalle_compra = element.id_detalle_compra;
                let row = $("<tr>");
                row.append($("<td style='text-align:center;'>").html(
                    `<a href="javascript:void(0);" onclick="quitarDescuento(${id_detalle_compra})"><span class='btn btn-sm btn-danger'>Quitar</span></a>`
                ));
                row.append($("<td>").text(element.nombre + ' -> ' + element.marca));
                row.append($("<td style='text-align: right'>").html(element.cantidad));
                row.append($("<td style='text-align: right'>").html('$' + element.precio));
                row.append($("<td style='text-align: right'>").html('$' + element.total));
                tableDetallesCompra.append(row);

            });

            $("#subtotal").text('$' + data.subtotal);
            $("#iva").text('$' + data.iva);
            $("#percepcion").text(data.percepcion);
            $("#totalCompra").text(data.total);

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

                    getDetallesCompra();
                });
            } else if (result.isDenied) { }
        });
    }

    getDetallesCompra();

});
