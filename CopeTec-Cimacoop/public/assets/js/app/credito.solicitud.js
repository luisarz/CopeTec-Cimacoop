

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