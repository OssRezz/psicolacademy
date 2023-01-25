const table = $("#TableMatriculas").DataTable({
    responsive: true,
    // order: [
    //     [0, "desc"],
    //     [1, "asc"],
    //     [4, "asc"],
    // ],
    language: {
        decimal: "",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Matriculas",
        infoEmpty: "Mostrando 0 to 0 of 0 Matriculas",
        infoFiltered: "(Filtrado de _MAX_ total Matriculas)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Matriculas",
        loadingRecords: "Cargando...",
        processing: "Procesando...",
        search: "Buscar:",
        zeroRecords: "Sin resultados encontrados",
        paginate: {
            first: "Primero",
            last: "Ultimo",
            next: "Siguiente",
            previous: "Anterior",
        },
    },
});
