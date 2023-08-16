
$(document).ready(function () {

    const meses = {
        1: 'ENERO',
        2: 'FEBRERO',
        3: 'MARZO',
        4: 'ABRIL',
        5: 'MAYO',
        6: 'JUNIO',
        7: 'JULIO',
        8: 'AGOSTO',
        9: 'SEPTIEMBRE',
        10: 'OCTUBRE',
        11: 'NOVIEMBRE',
        12: 'DICIEMBRE',
    };



    const currentYear = new Date().getFullYear();
    const previousYear = currentYear - 1;


    window.movimientoHistorico = function () {
        let token = $('meta[name="csrf-token"]').attr("content")

        // Crear el HTML para las opciones del select de meses
        let mesesOptions = '';
        for (const key in meses) {
            if (meses.hasOwnProperty(key)) {
                mesesOptions += `<option value="${key}">${meses[key]}</option>`;
            }
        }

        // Crear el HTML para las opciones del select de años
        const yearsOptions = `
            <option value="${currentYear}">${currentYear}</option>
            <option value="${previousYear}">${previousYear}</option>
        `;

        //Creamos el select de cuentas
        let cuentasOptions = '';
        for (const key in catalogoCuentas) {
            if (catalogoCuentas.hasOwnProperty(key)) {
                cuentasOptions += `<option value="${key}">${catalogoCuentas[key]}</option>`;
            }
        }

        // Mostrar SweetAlert con los select llenados
        Swal.fire({
            title: 'Seleccione un mes y un año',
            html: `
            <select id="cuentaSelectHistoricoCuenta" class="swal2-select">${cuentasOptions}</select>
            <select id="mesSelectHistoricoCuenta" class="swal2-select">${mesesOptions}</select>
            <select id="yearSelectHistoricoCuenta" class="swal2-select">${yearsOptions}</select>
        `,
            showCancelButton: true,
            confirmButtonText: 'Aceptar',
            preConfirm: () => {
                const selectedMonth = document.getElementById('mesSelectHistoricoCuenta').value;
                const selectedYear = document.getElementById('yearSelectHistoricoCuenta').value;
                return { month: selectedMonth, year: selectedYear };
            }
        }).then((result) => {
            if (result.isConfirmed) {
                const selectedMonth = result.value.month;
                const selectedYear = result.value.year;
                // Aquí puedes hacer lo que necesites con el mes y año seleccionados
                Swal.fire(`Mes seleccionado: ${meses[selectedMonth]}\nAño seleccionado: ${selectedYear}`, '', 'success');
            }
        });

    }


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
        Swal.fire({
            title: 'Procesando...',
            text: 'Por favor, espera mientras se realiza la consulta.',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showCancelButton: false,
            showConfirmButton: false,
            onBeforeOpen: () => {
                Swal.showLoading();
                Swal.getHtmlContainer().querySelector('.swal2-loading').innerHTML = '<i class="fas fa-spinner fa-spin"></i>';
            }
        });

        $.ajax({
            type: "POST",
            url: "/contabilidad/cierre-mensual/cierre",
            data: data, // No es necesario convertir a JSON.stringify
            success: function (response) {
                let mensaje = response.mensaje;
                swal.close();
                if (response.estado == "success") {
                    id_cierre = response.id_cierre;
                    Swal.fire({
                        icon: 'success',
                        title: 'Cierre Mensual',
                        text: mensaje,
                        willClose: () => {
                            // Redirige a la nueva página en una pestaña nueva
                            window.open('/contabilidad/cierre-mensual/imprimir/' + id_cierre, '_blank');
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
