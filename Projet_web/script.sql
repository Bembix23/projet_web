CREATE DATABASE IF NOT EXISTS ProjetWeb DEFAULT CHARACTER SET utf8;
USE ProjetWeb;

CREATE TABLE IF NOT EXISTS ProjetWeb.profil (
id INT NOT NULL AUTO_INCREMENT,
nom VARCHAR(255) NOT NULL,
prenom VARCHAR(255) NOT NULL,
mail_adress VARCHAR(255) NOT NULL,
photo_profil VARCHAR(255),
password VARCHAR(255) NOT NULL,
PRIMARY KEY (id));

CREATE TABLE IF NOT EXISTS ProjetWeb.annonce (
id INT NOT NULL AUTO_INCREMENT,
id_annonceur INT NOT NULL,
titre VARCHAR(255) NOT NULL,
description VARCHAR(255) NOT NULL,
nb_place INT NOT NULL,
adresse VARCHAR(255) NOT NULL,
ville VARCHAR(255) NOT NULL,
prix_nuit INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id_annonceur) REFERENCES ProjetWeb.profil(id));

CREATE TABLE IF NOT EXISTS ProjetWeb.réservation (
id INT NOT NULL AUTO_INCREMENT,
id_chambre INT NOT NULL,
id_locataire INT NOT NULL,
date_arrivé DATE NOT NULL,
date_départ DATE NOT NULL,
nb_nuit INT NOT NULL,
prix_nuit INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id_locataire) REFERENCES ProjetWeb.profil(id),
FOREIGN KEY (id_chambre) REFERENCES ProjetWeb.annonce(id));

CREATE TABLE IF NOT EXISTS ProjetWeb.date_de_réservation (
id INT NOT NULL AUTO_INCREMENT,
date_réservation DATE NOT NULL,
id_chambre INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (id_chambre) REFERENCES ProjetWeb.annonce(id));