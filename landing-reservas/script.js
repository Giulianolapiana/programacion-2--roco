const form = document.getElementById('reservaForm');
const fechaInput = document.getElementById('fecha');
const horaSelect = document.getElementById('hora');
const mensaje = document.getElementById('mensaje');

fechaInput.addEventListener('change', () => {
    const fecha = fechaInput.value;

    fetch(`get_reservas.php?fecha=${fecha}`)
        .then(res => res.json())
        .then(reservadas => {
            const horas = [
                "09:00", "10:00", "11:00", "12:00",
                "14:00", "15:00", "16:00", "17:00"
            ];

            horaSelect.innerHTML = "";
            horas.forEach(hora => {
                const option = document.createElement("option");
                option.value = hora;
                option.textContent = reservadas.includes(hora)
                    ? `${hora} (ocupado)`
                    : hora;
                option.disabled = reservadas.includes(hora);
                horaSelect.appendChild(option);
            });
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
