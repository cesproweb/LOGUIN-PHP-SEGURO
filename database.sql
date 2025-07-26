CREATE DATABASE IF NOT EXISTS login_seguro;
USE login_seguro;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  attempts INT DEFAULT 0,
  locked BOOLEAN DEFAULT 0
);

-- Usuario de prueba: admin / 123456
INSERT INTO users (username, password) VALUES (
  'admin',
  '$2y$10$eImG6dcXuYbLr5LZ8rE6UOjwvTTX3fQbHphGM5oPYJRxEy5Z5g02e'
);