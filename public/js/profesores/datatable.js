const table = $("#TableUsuarios").DataTable({
    responsive: true,
    // order: [
    //     [0, "desc"],
    //     [1, "asc"],
    //     [4, "asc"],
    // ],
    language: {
        decimal: "",
        emptyTable: "No hay información",
        info: "Mostrando _START_ a _END_ de _TOTAL_ Profesores",
        infoEmpty: "Mostrando 0 to 0 of 0 Profesores",
        infoFiltered: "(Filtrado de _MAX_ total Profesores)",
        infoPostFix: "",
        thousands: ",",
        lengthMenu: "Mostrar _MENU_ Profesores",
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
