CREATE DATABASE IF NOT EXISTS robot;
USE robot;

CREATE TABLE IF NOT EXISTS katalog (
    id_item VARCHAR(10) PRIMARY KEY,
    nama_item VARCHAR(25) NOT NULL,
    kategori VARCHAR(20) NOT NULL,
    rating ENUM('1', '2', '3', '4', '5') NOT NULL,
    harga INT,
    file_name VARCHAR(255),
    file_path VARCHAR(255)
);
