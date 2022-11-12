-- Create the employee_manager database if it does not exist
CREATE DATABASE IF NOT EXISTS employee_manager;
USE employee_manager;
-- Create the admin user table
CREATE TABLE IF NOT EXISTS admin (
    id INT AUTO_INCREMENT,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci;