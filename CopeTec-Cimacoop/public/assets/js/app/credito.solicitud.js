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
                `<a href="javascript:void(0);" onclick="equitarReferencia(${idReferencia})"><span class='badge badge-danger'>Quitar</span></a>`
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