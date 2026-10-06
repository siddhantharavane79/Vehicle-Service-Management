CREATE DATABASE IF NOT EXISTS vehicle_service;
USE vehicle_service;

CREATE TABLE services (
 id INT AUTO_INCREMENT PRIMARY KEY,
 name VARCHAR(100) NOT NULL,
 description VARCHAR(255) NOT NULL,
 price DECIMAL(10,2) NOT NULL
);

INSERT INTO services(name,description,price) VALUES
('Basic Service','Engine oil check, filter check and general inspection',799),
('Full Service','Complete vehicle inspection and maintenance',1499),
('AC Service','AC inspection and cleaning',999),
('Wheel Alignment','Wheel alignment and balancing',699);

CREATE TABLE bookings (
 id INT AUTO_INCREMENT PRIMARY KEY,
 customer_name VARCHAR(100) NOT NULL,
 phone VARCHAR(30) NOT NULL,
 vehicle VARCHAR(150) NOT NULL,
 service_id INT NOT NULL,
 service_date DATE NOT NULL,
 status VARCHAR(30) DEFAULT 'Pending',
 created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
 FOREIGN KEY(service_id) REFERENCES services(id)
);

CREATE TABLE admins (
 id INT AUTO_INCREMENT PRIMARY KEY,
 username VARCHAR(50) UNIQUE NOT NULL,
 password VARCHAR(255) NOT NULL
);

INSERT INTO admins(username,password) VALUES ('admin','admin123');
