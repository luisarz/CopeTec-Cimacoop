$("#id_cliente").on('change', function () {
    let id_cliente = $(this).val();
    swalProcessing();
    $.ajax({
        url: '/clientes/getClienteData/' + id_cliente,
        type: 'GET',
        dataType: 'json',
        beforeSend: function () {
            swalProcessing();
        },
        success: function (data) {
            Swal.close();
            if (data.estado == true) {
                let cliente = data.cliente;
                $("#genero").val(cliente.genero).change();
                $("#fecha_nacimiento").val(cliente.fecha_nacimiento);
                $("#dui_cliente").val(cliente.dui_cliente);
                $("#fecha_expedicion").val(cliente.fecha_expedicion);
                $("#telefono").val(cliente.telefono);
                $("#nacionalidad").val(cliente.nacionalidad);
                $("#estado_civil").val(cliente.estado_civil).change();
                $("#direccion_personal").val(cliente.direccion_personal);
                $("#nombre_negocio").val(cliente.nombre_negocio);
                $("#direccion_negocio").val(cliente.direccion_negocio);
                $("#tipo_vivienda").val(cliente.tipo_vivienda).change();
                $("#observaciones").val(cliente.observaciones);
            }
        },
        error: function () {
            Swal.close();
        }
    });

});

$("#btnAddReferencia").on('click', function (ev) {
    let idReferencia = $("#id_referencia").val();
    let idSolicitud = $("#id_solicitud").val();

    if (idReferencia == "") {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Debe seleccionar una referencia',
        });
    } else {
        swalProcessing();
        $.get('/creditos/solicitudes/referencias/add/' + idReferencia + '/' + idSolicitud, function (data) {
            Swal.close();
            cargarReferencias();
        });
    }
});

cargarReferencias = function () {
    let idSolicitud = $("#id_solicitud").val();
    $.get("/creditos/solicitudes/referencias/getReferencias/" + idSolicitud, function (data) {
        let tableReferencias = $("#tableReferencias");
        tableReferencias.empty();
        let numero = 0;
        $.each(data.referencias, function (index, element) {
            numero = index + 1;
            let idReferencia = element.id_referencia_solicitud;
            let row = $("<tr>");
            row.append($("<td>").html(
                `<a href="javascript:void(0);" onclick="equitarBien(${idReferencia})"><span class='badge badge-danger'>Quitar</span></a>`
            ));
            row.append($("<td>").text(numero));
            row.append($("<td>").text(element.nombre));
            row.append($("<td>").text(element.dui));
            row.append($("<td>").text(element.parentesco));
            row.append($("<td>").text(element.telefono));

            tableReferencias.append(row);
        });
    });


}


function equitarReferencia(id) {
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
            $.get("/creditos/solicitudes/referencias/quitar/" + id, function (data) {
                Swal.fire({
                    icon: 'success',
                    title: 'Eliminado exitoso',
                    text: 'La referencia ha sido eliminada correctamente.',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    allowEnterKey: false,
                });

                cargarReferencias();
            });
        } else if (result.isDenied) { }
    });
}

$('#btnRegistrarBien').on('click', function (e) {
    swalProcessing();

    e.preventDefault();
    let data = {
        "clase_propiedad": $("#clase_propiedad").val(),
        "direccion_bien": $("#direccion_bien").val(),
        "valor": $("#valor_bien").val(),
        "hipotecado_bien": $("#hipotecado_bien").val(),
        "id_solicitud": $("#id_solicitud").val(),
        "_token": $("#token").val()
    };

    $.ajax({
        type: "POST",
        url: "/creditos/solicitudes/bienes/add",
        data: data, // No es necesario convertir a JSON.stringify
        success: function (response) {
            swal.close();
            cargarBienes();
        },
        error: function (xhr, status, error) {
            swal.close();

            console.log(error);
        },
        dataType: "json" // Especifica el tipo de datos esperados en la respuesta
    });
});

cargarBienes = function () {
    let idSolicitud = $("#id_solicitud").val();
    $.get("/creditos/solicitudes/bienes/getBienes/" + idSolicitud, function (data) {
        let tableBienes = $("#tableBienes");
        tableBienes.empty();
        let numero = 0;
        $.each(data.bienesOfertados, function (index, element) {
            $("#clase_propiedad").val("");
            $("#direccion_bien").val("");
            $("#valor_bien").val(0);
            $("#hipotecado_bien").val(0);

            numero = index + 1;
            let idReferencia = element.id_propiedad;
            let row = $("<tr>");
            row.append($("<td>").html(
                `<a href="javascript:void(0);" onclick="equitarBien(${idReferencia})"><span class='badge badge-danger'>Quitar</span></a>`
            ));
            row.append($("<td>").text(element.clase_propiedad));
            row.append($("<td>").text(element.direccion));
            row.append($("<td>").text('$ ' + element.valor));
            row.append($("<td>").text((element.hipotecado_bien == 0) ? 'No' : 'Si'));

            tableBienes.append(row);
        });
    });


}

function equitarBien(id) {
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
            $.get("/creditos/solicitudes/bienes/quitar/" + id, function (data) {
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

                cargarBienes();
            });
        } else if (result.isDenied) { }
    });
}

