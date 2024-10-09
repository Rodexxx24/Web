CREATE DATABASE robot;

USE robot;

CREATE TABLE katalog (
    id_item VARCHAR(10) PRIMARY KEY,
    nama_item VARCHAR(25) NOT NULl,
    kategori VARCHAR(20) NOT NULL,
    rating ENUM('1', '2', '3', '4', '5') NOT NULL,
    harga int
);