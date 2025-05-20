const form = document.getElementById('reservaFormulario');
const fechaInput = document.getElementById('fecha');
const horaSelect = document.getElementById('hora');
const mensaje = document.getElementById('mensaje');

fechaInput.addEventListener('change', () => {
    const fecha = fechaInput.value;

    fetch("/get_reservas.php?fecha=" + fecha)
        .then(res => res.json())
        .then(reservadas => {
            const horas = ["09:00", "10:00", "11:00", "12:00", "14:00", "15:00", "16:00", "17:00"];
            horaSelect.innerHTML = "";
            horas.forEach(hora => {
                const option = document.createElement("option");
                option.value = hora;
                option.textContent = reservadas.includes(hora) ? `${hora} (ocupado)` : hora;
                option.disabled = reservadas.includes(hora);
                horaSelect.appendChild(option);
            });
        })
        .catch(err => {
            console.error("Error al obtener reservas:", err);
            mensaje.textContent = "Error al cargar horarios disponibles.";
        });
});

form.addEventListener('submit', function (e) {
    e.preventDefault();
    mensaje.textContent = "Procesando...";

    const formData = new FormData(this);

    fetch('reservar.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            mensaje.textContent = data;
            if (data.includes("éxito")) {
                form.reset();
                horaSelect.innerHTML = '<option value="">Seleccioná una fecha primero</option>';
            }
        })
        .catch(() => {
            mensaje.textContent = 'Error al enviar la reserva.';
        });
});

/* --------- */

const listaReservas = document.getElementById("listaReservas");

// Recuperar reservas guardadas del localStorage
function cargarReservas() {
    const reservas = JSON.parse(localStorage.getItem("reservas")) || [];
    listaReservas.innerHTML = "";
    reservas.forEach((reserva, index) => {
        const item = document.createElement("li");
        item.className = "list-group-item d-flex justify-content-between align-items-center";
        item.innerHTML = `
            ${reserva.fecha} - ${reserva.hora} - ${reserva.nombre}
            <button class="btn btn-sm btn-danger" onclick="eliminarReserva(${index})">Eliminar</button>
        `;
        listaReservas.appendChild(item);
    });
}

function guardarReserva(reserva) {
    const reservas = JSON.parse(localStorage.getItem("reservas")) || [];
    reservas.push(reserva);
    localStorage.setItem("reservas", JSON.stringify(reservas));
    cargarReservas();
}

function eliminarReserva(index) {
    const reservas = JSON.parse(localStorage.getItem("reservas")) || [];
    reservas.splice(index, 1);
    localStorage.setItem("reservas", JSON.stringify(reservas));
    cargarReservas();
}

// Al confirmar reserva, guardamos en el "carrito"
form.addEventListener('submit', function (e) {
    e.preventDefault();
    mensaje.textContent = "Procesando...";

    const formData = new FormData(this);
    const reservaData = {
        nombre: formData.get("nombre"),
        email: formData.get("email"),
        fecha: formData.get("fecha"),
        hora: formData.get("hora")
    };

    fetch('../reservar.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            mensaje.textContent = data;
            if (data.includes("éxito")) {
                guardarReserva(reservaData);
                form.reset();
                horaSelect.innerHTML = '<option value="">Seleccioná una fecha primero</option>';
            }
        })
        .catch(() => {
            mensaje.textContent = 'Error al enviar la reserva.';
        });
});

// Inicializar
cargarReservas();


/* const form = document.getElementById('reservaForm');
const fechaInput = document.getElementById('fecha');
const horaSelect = document.getElementById('hora');
const mensaje = document.getElementById('mensaje');

fechaInput.addEventListener('change', () => {
    const fecha = fechaInput.value;
    console.log("Fecha seleccionada:", fecha);

    // Inicialmente deshabilita el input de hora
    horaSelect.disabled = true;
    horaSelect.value = ""; // Limpia el valor

    fetch(`/get_reservas.php?fecha=${fecha}`)
        .then(res => res.json())
        .then(reservadas => {
            console.log("Horas reservadas:", reservadas);

            if (reservadas.length > 0) {
                mensaje.textContent = "Horas ocupadas para esta fecha: " + reservadas.join(", ");
            } else {
                mensaje.textContent = "No hay horas ocupadas para esta fecha.";
            }

            // Habilita el input de hora (pero la validación de la hora se hará en el servidor)
            horaSelect.disabled = false;
        })
        .catch(error => {
            console.error("Error al obtener reservas:", error);
            mensaje.textContent = "Error al obtener las horas disponibles.";
        });
});

form.addEventListener('submit', function (e) {
    e.preventDefault();
    mensaje.textContent = "Procesando...";

    const formData = new FormData(this);

    fetch('reservar.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            mensaje.textContent = data;
            if (data.includes("éxito")) {
                form.reset();
                // Limpia el valor del input de hora después de la reserva exitosa
                horaSelect.value = "";
                horaSelect.disabled = true; // Vuelve a deshabilitarlo
            }
        })
        .catch(() => {
            mensaje.textContent = 'Error al enviar la reserva.';
        });
}); */
