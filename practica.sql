CREATE TABLE usuarios (
id INT AUTO_INCREMENT PRIMARY KEY,
nombre_usuario VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
rol ENUM('admin', 'estandar') DEFAULT 'estandar'
);

INSERT INTO usuarios (nombre_usuario, password, rol) VALUES
('admin', 'admin123', 'admin'),
('usuario1', 'clave123', 'estandar'),
('usuario2', 'password123', 'estandar');
