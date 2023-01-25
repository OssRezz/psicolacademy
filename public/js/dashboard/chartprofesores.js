const donaProfesor = document.getElementById("chartDonaProfesor");
const footerProfesores = document.getElementById("footerProfesores");
let nombreProfesor = [];
let totalProfesor = [];

const dataDonaProfesor = {
    labels: nombreProfesor,
    datasets: [
        {
            label: "# Profesores con mayor numero de clases",
            data: totalProfesor,
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

const configDona = {
    type: "doughnut",
    data: dataDonaProfesor,
    options: {
        responsive: true,
        cutout: "70%",
        layout: {
            padding: 25,
        },
    },
};

function loadChartDonaProfesor() {
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "chart/profesores",
        type: "GET",
        success: function (result) {
            result.forEach((element) => {
                const { nombre_profesors, total } = element;
                nombreProfesor.push(nombre_profesors);
                totalProfesor.push(total);
            });
            const chartDonaProfesor = new Chart(donaProfesor, configDona);
            result.length == 0
                ? (footerProfesores.style.display = "flex")
                : (footerProfesores.style.display = "none");
        },
    });
}
loadChartDonaProfesor();
