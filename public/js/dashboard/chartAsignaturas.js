const DonaAsignaturas = document.getElementById("chartDonaAsignaturas");
const footerAsignatura = document.getElementById("footerAsignatura");

let nombreProductoStock = [];
let cantidadProducto = [];

const dataDonaAsignaturas = {
    labels: nombreProductoStock,
    datasets: [
        {
            label: "# Asignaturas por matricula",
            data: cantidadProducto,
            backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
            ],
            borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
            ],
            borderWidth: 1,
            borderRadius: 10,
            offset: 10,
            hoverOffset: 30,
        },
    ],
};

const configDonaAsignaturas = {
    type: "doughnut",
    data: dataDonaAsignaturas,
    options: {
        responsive: true,
        cutout: "70%",
        layout: {
            padding: 25,
        },
    },
};

function loadChartDonaProductos() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "chart/asignaturas",
        type: "GET",
        success: function (result) {
            result.forEach((element) => {
                const { nombre, total } = element;
                nombreProductoStock.push(nombre);
                cantidadProducto.push(total);
            });
            const ChartDonaAsignaturas = new Chart(
                DonaAsignaturas,
                configDonaAsignaturas
            );
            result.length == 0
                ? (footerAsignatura.style.display = "flex")
                : (footerAsignatura.style.display = "none");
        },
    });
}

loadChartDonaProductos();
