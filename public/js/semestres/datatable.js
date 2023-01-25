const table = $("#TableClases").DataTable({
    responsive: true,
    // order: [
    //     [0, "desc"],
    //     [1, "asc"],
    //     [4, "asc"],
    // ],
    language: {
        decimal: "",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Clases",
        infoEmpty: "Mostrando 0 to 0 of 0 Clases",
        infoFiltered: "(Filtrado de _MAX_ total Clases)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Clases",
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
