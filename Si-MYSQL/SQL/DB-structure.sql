DROP DATABASE IF EXISTS contacts_app;

CREATE DATABASE contacts_app;

USE contacts_app;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    num_phone VARCHAR(50)
);

INSERT INTO contacts (name, num_phone) VALUES ("Pablo", "+90 8718812");

INSERT INTO users (name, email, password) VALUES ("Pol", "pol@test.com", "1234");