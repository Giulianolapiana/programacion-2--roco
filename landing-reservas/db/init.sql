CREATE TABLE IF NOT EXISTS reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    email VARCHAR(100),
    fecha DATE,
    hora TIME,
    UNIQUE KEY fecha_hora (fecha, hora, email)
);
