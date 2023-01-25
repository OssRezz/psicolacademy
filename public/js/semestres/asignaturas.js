let ArrayAsignaturas = [];
let ArraySeleccionadas = [];
let html;
let creditos = 0;
const ListaAsignaturas = document.querySelector("#ListaAsignaturas");
const ListaSeleccionadas = document.querySelector("#ListaSeleccionadas");
const CreditosSeleccionados = document.querySelector("#creditos_seleccionados");
const matricula_id = document.querySelector("#matricula_id");
const Spinner = document.querySelector("#spinner");

RequestAsignaturas();

function RequestAsignaturas() {
    Spinner.style.display = "flex";

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "semestres/asignaturas",
        type: "GET",
        success: function (result) {
            ArrayAsignaturas = result;
            LoadAsignaturas();
            Spinner.style.display = "none";
        },
    });
}

const SeleccionarClase = (id) => {
    //Filtramos la seleccion del estudiante del array de Asignaturas disponibles
    let seleccion = ArrayAsignaturas.filter(
        (asginatura) => asginatura.id == id
    );

    //Filtramos que el estudiante no tenga este asginatura seleccionada (Validamos que el id no este dentro del array de asignaturas seleccionadas)
    //Si encuentra algo el array sera mayor a 0 y va a retornar en el condicional.
    let ValidateAsignatura = ArraySeleccionadas.filter(
        (asginatura) => asginatura.id == id
    );
    let ValidateIfAsignaturaExist = ArraySeleccionadas.filter(
        (asginatura) => asginatura.asignatura_id == seleccion[0].asignatura_id
    );
    if (
        ValidateAsignatura.length != 0 ||
        ValidateIfAsignaturaExist.length != 0
    ) {
        return Swal.fire({
            html: `Estimado estudiante, ya ha seleccionado esta asignatura. Puede verificarlo en la sección de "Asignaturas seleccionadas"`,
            showDenyButton: false,
            confirmButtonColor: "#0275d8",
            icon: "info",
        });
    }

    //Agregamos al array de asignaturas seleccionadas y la cargamos en la lista de seleccionadas
    ArraySeleccionadas.push(seleccion[0]);
    LoadSeleccionadas();

    //Acumulamos el valor del credito en la variable creditos
    creditos = parseInt(creditos) + parseInt(seleccion[0].asignatura.creditos);
    CreditosSeleccionados.innerHTML = creditos;

    return Swal.fire({
        html: `La asignatura ha sido seleccionada con éxito. Puedes encontrarla en la sección de "Asignaturas seleccionadas"`,
        showDenyButton: false,
        confirmButtonColor: "#0275d8",
        icon: "success",
    });
};

const DeleteSeleccionada = (id) => {
    //Filtramos la seleccion del estudiante del array de Asignaturas disponibles
    let seleccion = ArraySeleccionadas.filter(
        (asginatura) => asginatura.id != id
    );
    let eliminada = ArraySeleccionadas.filter(
        (asginatura) => asginatura.id == id
    );
    ArraySeleccionadas = seleccion;
    LoadSeleccionadas();

    creditos = parseInt(creditos) - parseInt(eliminada[0].asignatura.creditos);
    CreditosSeleccionados.innerHTML = parseInt(creditos);

    return Swal.fire({
        html: `La asignatura seleccionada ha sido eliminada con éxito."`,
        showDenyButton: false,
        confirmButtonColor: "#0275d8",
        icon: "success",
    });
};

function LoadAsignaturas() {
    html = "";
    DeleteOptions("#ListaAsignaturas");
    ArrayAsignaturas.map((clase) => {
        html += `
        <div class="accordion" id="ListaAsignaturas" key="${clase.id}">
            <div class="accordion-item">
                <h2 class="accordion-header" id="heading${clase.id}">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse${
                            clase.id
                        }" aria-expanded="true"
                        aria-controls="collapse${clase.id}">
                        <b class="mx-2">${clase.asignatura.nombre}</b>

                        <div class="badge bg-sm bg-${
                            clase.asignatura.tipo_asignatura == 0
                                ? "primary"
                                : "warning"
                        }">
                        ${
                            clase.asignatura.tipo_asignatura == 0
                                ? "Electiva"
                                : "Obligatoria"
                        }
                        </div>
                        <div class="badge bg-sm bg-dark mx-1">
                        ${clase.asignatura.creditos}
                        </div>
                    </button>
                </h2>
                <div id="collapse${clase.id}" 
                class="accordion-collapse collapse"
                aria-labelledby="heading${clase.id}"
                data-bs-parent="#ListaAsignaturas">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-12">
                            ${clase.asignatura.descripcion}

                            </div>
                            <div class="col-12 mb-3">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        # de creditos: <b>${
                                            clase.asignatura.creditos
                                        }</b>
                                    </li>
                                    <li class="list-group-item">Profesor:
                                        <b>
                                            ${clase.profesor.nombres}  
                                            ${clase.profesor.apellidos}
                                        </b>
                                    </li>
                                    <li class="list-group-item">Hora inicio: <b>${
                                        clase.hora_inicio
                                    }</b></li>
                                    <li class="list-group-item">Hora fin: <b>${
                                        clase.hora_fin
                                    }</b></li>
                                    <li class="list-group-item">Area:
                                        <b>
                                            ${clase.asignatura.area.nombre}
                                        </b>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-12 d-grid">
                                <button class="btn btn-outline-danger" 
                                onclick="SeleccionarClase('${clase.id}')">
                                    Seleccionar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    });

    ListaAsignaturas.innerHTML = html;
}

function LoadSeleccionadas() {
    html = "";
    DeleteOptions("#ListaSeleccionadas");
    ArraySeleccionadas.map((clase) => {
        html += `
            <li class="list-group-item">
                <div class="row d-flex align-items-center">
                    <div class="col-10">
                        ${clase.asignatura.nombre} ${clase.hora_inicio} - ${clase.hora_fin}
                    </div>
                    <div class="col-2 text-end">
                        <button class="btn btn-outline-danger btn-sm border-0" onclick="DeleteSeleccionada(${clase.id})"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </li>
        `;
    });
    if (ArraySeleccionadas.length == 0) {
        html = `
            <li class="list-group-item">No ha seleccionado ninguna asignatura</li>
        `;
    }
    ListaSeleccionadas.innerHTML = html;
}

const IngresarClases = () => {
    if (ArraySeleccionadas == 0) {
        return Swal.fire({
            html: `Estimado estudiante, los creditos minimos para Registrar sus asignaturas son 7.`,
            showDenyButton: false,
            confirmButtonColor: "#0275d8",
            icon: "info",
        });
    }

    let creditosArraySeleccionados = ArraySeleccionadas.map(amount).reduce(sum);

    if (creditosArraySeleccionados <= 7) {
        return Swal.fire({
            html: `Estimado estudiante, los creditos minimos para Registrar sus asignaturas son 7.`,
            showDenyButton: false,
            confirmButtonColor: "#0275d8",
            icon: "info",
        });
    }

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: "semestres/ingresar",
        type: "POST",
        data: {
            asignaturas: ArraySeleccionadas,
            matricula_id: matricula_id.value,
            creditos: CreditosSeleccionados.textContent,
        },
        success: function (result) {
            console.log(result);

            ArrayAsignaturas = [];
            ArraySeleccionadas = [];
            CreditosSeleccionados.innerHTML = 0;
            LoadSeleccionadas();

            return Swal.fire({
                title: "La pagina se recargara pronto...",
                html: result.message,
                timer: 3000,
                timerProgressBar: true,
                icon: "success",
                didOpen: () => {
                    Swal.showLoading();
                    const b = Swal.getHtmlContainer().querySelector("b");
                    timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft();
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                },
            }).then((result) => {
                location.reload();
            });
        },
    });
};

function DeleteOptions(cleanHtml) {
    const aux = document.querySelector(cleanHtml);

    while (aux.firstChild) {
        aux.removeChild(aux.firstChild);
    }
}

function sum(prev, next) {
    return parseInt(prev) + parseInt(next);
}
function amount(item) {
    return parseInt(item.asignatura.creditos);
}
