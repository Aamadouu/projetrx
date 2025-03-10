-- Active: 1715873420746@@127.0.0.1@3306@smarttech
CREATE DATABASE smarttech;
USE smarttech;

CREATE TABLE employes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    poste VARCHAR(100) NOT NULL,
    date_embauche DATE NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    entreprise VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom_fichier VARCHAR(255) NOT NULL,
    type_fichier VARCHAR(50) NOT NULL,
    chemin_fichier VARCHAR(255) NOT NULL,
    employe_id INT,
    FOREIGN KEY (employe_id) REFERENCES employes(id)
);
