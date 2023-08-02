
$(document).ready(function () {


    $("#tipo_catalogo").on('change', function () {
        getCuentaPadre();
           
    });

    window.getCuentaPadre = function () {
        let id = $("#tipo_catalogo").val();
        let id_cuenta_padre_actual = $("#id_cuenta_padre_actual").val();

        swalProcessing();
        $.get('/contabilidad/catalogo/getCuentasById/' + id, function (data) {
            swal.close();
            $('#id_cuenta_padre').empty();
            $('#id_cuenta_padre').append($('<option>', {
                value:"",
                text: "Sin Padre",
            }));
            $.each(data.cuentaPadre, function (index, interes) {
                
                $('#id_cuenta_padre').append($('<option>', {
                    value: interes.id_cuenta,
                    text: interes.numero + '->' + interes.descripcion,
                    selected: (id_cuenta_padre_actual == interes.id_cuenta) ? true:false
                }));
            });
        });
    }


    getCuentaPadre();



});
