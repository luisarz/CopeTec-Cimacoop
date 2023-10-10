
$(document).ready(function () {

    const id_factura = $("#id_factura").val();


    $("#chkRetencion").on("change", function () {
        let retencion = ($("#chkRetencion").prop('checked') ? 1 : 0);
        let data = {
            "id_factura": id_factura,
            "retencion": retencion,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/compras/retencion",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                getDetallesFactura();
            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
            dataType: "json" // Especifica el tipo de datos esperados en la respuesta
        });

    });


    $("#btnRegistrarProducto").on("click", function (e) {

        e.preventDefault();
        let tipo_documento = $("#tipo_documento").val();
        let numero_factura = $("#numero_factura").val();
        let fecha_factura = $("#fecha_factura").val();
        let id_cliente = $("#id_cliente").val();
        let retencion = ($("#chkRetencion").prop('checked') ? 1 : 0);


        if (numero_factura == "" ||  tipo_documento =="" || fecha_factura == "" || id_cliente == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                html: 'Estos campos son obligatorios <br>Tipo  de Documento Fiscal  <br>Número de Documento Fiscal <br>la Fecha de facturacion <br>Proveedor',
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


        if (id_producto == "" || cantidad == "" || precio == "") {
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
            "id_factura": id_factura,
            "id_producto": id_producto,
            "cantidad": cantidad,
            "precio": precio,
            "numero_factura": numero_factura,
            "fecha_factura": fecha_factura,
            "id_cliente": id_cliente,
            "retencion": retencion,
            "tipo_documento": tipo_documento,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/facturas/add-product",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                swal.close();
                getDetallesFactura();
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


    $("#btnFinalizarFactura").on("click", function (e) {
        e.preventDefault();
        
        let id_factura = $("#id_factura").val();
        let numero_factura = $("#numero_factura").val();
        let fecha_factura = $("#fecha_factura").val();
        let id_cliente = $("#id_cliente").val();
        if (id_factura == "" || numero_factura == "" || fecha_factura == "" || id_cliente == "") {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Seleccione los datos de la cabecera de la compra',
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }




        Swal.fire({
            icon: 'question',
            title: 'Finalizar Factura',
            html: '¿Estás seguro de que deseas finalizar la compra? <br> <br> <strong>Nota:</strong> Una vez finalizada la compra, no se podrá modificar.',
            showCancelButton: true,
            confirmButtonText: 'Sí, Finalizar Factura',
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
                finalizarFactura();
            } 
        });










    });

    window.finalizarFactura = function (id) {
        let id_factura = $("#id_factura").val();
        let tipo_documento = $("#tipo_documento").val();
        let numero_factura = $("#numero_factura").val();

        let fecha_factura = $("#fecha_factura").val();
        let id_cliente = $("#id_cliente").val();
        let retencion = ($("#chkRetencion").prop('checked') ? 1 : 0);
        let data = {
            "id_factura": id_factura,
            "numero_factura": numero_factura,
            "fecha_factura": fecha_factura,
            "id_cliente": id_cliente,
            "retencion": retencion,
            "tipo_documento": tipo_documento,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/facturas/finalizar",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {

                if (response.status == "ok") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Factura Finalizada',
                        text: 'La compra fue registrada de manera exitoso!',
                        willClose: () => {
                                window.location.href = '/facturas/list';
                        }
                    });
                }


            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
            dataType: "json" // Especifica el tipo de datos esperados en la respuesta
        });

    }





    getDetallesFactura = function () {
        let id_factura = $("#id_factura").val();
        $.get("/facturas/detalles/" + id_factura, function (data) {
            let tableDetallesFactura = $("#tableDetallesFactura");
            tableDetallesFactura.empty();
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
                row.append($("<td>").text(element.nombre + ' (' + element.marca + ')'));
                row.append($("<td style='text-align: right'>").html(element.cantidad));
                row.append($("<td style='text-align: right'>").html('$' + element.precio));
                row.append($("<td style='text-align: right'>").html('$' + element.subtotal));
                tableDetallesFactura.append(row);

            });

            $("#subtotal").text('$' + data.subtotal);
            $("#iva").text('$' + data.iva);
            $("#retencion").text('$' + data.retencion);
            $("#totalFactura").text('$' + data.total);

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
                $.get("/facturas/delete-product/" + id, function (data) {
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

                    getDetallesFactura();
                });
            } else if (result.isDenied) { }
        });
    }

    getDetallesFactura();

});
