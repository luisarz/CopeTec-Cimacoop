
$(document).ready(function () {

    $("#btnCerrarMes").on("click", function (e) {
        e.preventDefault();
        let mes = $("#mes").val();
        let mesLetras = $("#mes option:selected").text();
        let year = $("#year").val();
        if (mes == "") {
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Debes Seleccionar el mes a cerrar',
                confirmButtonText: "Corregir datos",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }

        if (year == "") {
            Swal.fire({
                icon: 'info',
                title: 'Oops...',
                text: 'Debes Seleccionar el AÑO a cerrar',
                confirmButtonText: "Corregir datos",
                customClass: {
                    confirmButton: "btn btn-danger"
                }
            });
            return false;
        }

     

        Swal.fire({
            icon: 'question',
            title: '¿Estas seguro de cerrar este mes?',
            html: '<span class=\" badge badge-light-danger fs-5\">  ' + mesLetras + '</span> - <span class=\" badge badge-light-danger fs-5\">  ' + year + '</span>',
            showCancelButton: true,
            confirmButtonText: 'Sí, Cerrar Mes contable',
            cancelButtonText: 'Cancelar',
            allowEscapeKey: false,
            allowOutsideClick: false,
            customClass: {
                confirmButton: "btn btn-danger",
                cancelButton: "btn btn-info"
            }
        }).then((result) => {
            if (result.isConfirmed) {
                generarCierre();
            }
        });
    });



    window.generarCierre = function () {

        let token = $('meta[name="csrf-token"]').attr("content")
        let data = {
            "mes": $("#mes").val(),
            "num_partida": $("#num_partida").val(),
            "year": $("#year").val(),
            "_token": token
        };

        $.ajax({
            type: "POST",
            url: "/contabilidad/cierre-mensual/cierre",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                let mensaje=response.mensaje;

                if (response.estado == "success") {
                    id_cierre = response.id_cierre;
                    Swal.fire({
                        icon: 'success',
                        title: 'Cierre Mensual',
                        text: mensaje,
                        willClose: () => {
                            // Redirige a la nueva página en una pestaña nueva
                            window.open('/reportes/partidaContable/' + id_cierre, '_blank');
                            setTimeout(() => {
                                window.location.href = '/contabilidad/cierre-mensual';
                            }, 1000);
                        }
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: mensaje,
                        confirmButtonText: "Corregir datos",
                        customClass: {
                            confirmButton: "btn btn-danger"
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                swal.close();
                console.log(error);
            },
        });
    }




});
