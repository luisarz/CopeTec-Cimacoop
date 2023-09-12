
$(document).ready(function () {

    const id_compra = $("#id_compra").val();


    $("#chkPercepcion").on("change", function () {
        let persepcion = (this.checked ? 1 : 0);
        alert(persepcion);
    });


    $("#btnRegistrarProducto").on("click", function (e) {

        e.preventDefault();
        let numero_fcc = $("#numero_fcc").val();
        let fecha_compra = $("#fecha_compra").val();
        let id_proveedor = $("#id_proveedor").val();
        let percepcion = ($("#chkPercepcion").prop('checked') ? 1 : 0);


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
            "id_compra": id_compra,
            "id_producto": id_producto,
            "cantidad": cantidad,
            "precio": precio,
            "numero_fcc": numero_fcc,
            "fecha_compra": fecha_compra,
            "id_proveedor": id_proveedor,
            "percepcion": percepcion,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/compras/add-product",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                swal.close();
                getDetallesCompra();
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


    $("#btnFinalizarCompra").on("click", function (e) {
        e.preventDefault();
        
        let id_compra = $("#id_compra").val();
        let numero_fcc = $("#numero_fcc").val();
        let fecha_compra = $("#fecha_compra").val();
        let id_proveedor = $("#id_proveedor").val();
        let percepcion = ($("#chkPercepcion").prop('checked') ? 1 : 0);


        if (id_compra == "" || numero_fcc == "" || fecha_compra == "" || id_proveedor == "") {
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
            title: 'Finalizar Compra',
            html: '¿Estás seguro de que deseas finalizar la compra? <br> <br> <strong>Nota:</strong> Una vez finalizada la compra, no se podrá modificar.',
            showCancelButton: true,
            confirmButtonText: 'Sí, Finalizar Compra',
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
                finalizarCompra();
            } 
        });










    });

    window.finalizarCompra = function (id) {
        let id_compra = $("#id_compra").val();
        let numero_fcc = $("#numero_fcc").val();
        let fecha_compra = $("#fecha_compra").val();
        let id_proveedor = $("#id_proveedor").val();
        let percepcion = ($("#chkPercepcion").prop('checked') ? 1 : 0);
        let data = {
            "id_compra": id_compra,
            "numero_fcc": numero_fcc,
            "fecha_compra": fecha_compra,
            "id_proveedor": id_proveedor,
            "percepcion": percepcion,
            "_token": $("#token").val()
        };

        $.ajax({
            type: "POST",
            url: "/compras/finalizar",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {

                if (response.status == "ok") {
                    Swal.fire({
                        icon: 'success',
                        title: 'Compra Finalizada',
                        text: 'La compra fue registrada de manera exitoso!',
                        willClose: () => {
                                window.location.href = '/compras/list';
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
                row.append($("<td>").text(element.nombre + ' (' + element.marca + ')'));
                row.append($("<td style='text-align: right'>").html(element.cantidad));
                row.append($("<td style='text-align: right'>").html('$' + element.precio));
                row.append($("<td style='text-align: right'>").html('$' + element.subtotal));
                tableDetallesCompra.append(row);

            });

            $("#subtotal").text('$' + data.subtotal);
            $("#iva").text('$' + data.iva);
            $("#percepcion").text('$' + data.percepcion);
            $("#totalCompra").text('$' + data.total);

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
                $.get("/compras/delete-product/" + id, function (data) {
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
