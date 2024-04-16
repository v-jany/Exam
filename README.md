CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255),
    name VARCHAR(255) NOT NULL,
    reg_no VARCHAR(50) NOT NULL,
    email VARCHAR(255) NOT NULL,
    programme ENUM('be', 'me') NOT NULL,
    semester INT NOT NULL,
    subjects TEXT,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    UNIQUE KEY unique_email (email),
    status VARCHAR(20) NOT NULL DEFAULT 'Pending';
);

CREATE TABLE administrators (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL
);
