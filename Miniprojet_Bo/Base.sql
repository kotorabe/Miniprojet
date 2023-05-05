CREATE DATABASE miniprojet;
CREATE ROLE manager_miniprojet LOGIN PASSWORD '1234';
ALTER DATABASE miniprojet OWNER TO manager_miniprojet;

CREATE TABLE utilisateur(
    id SERIAL PRIMARY KEY NOT NULL,
    email VARCHAR(50),
    mdp TEXT
);
INSERT INTO utilisateur(email, mdp) VALUES('user@gmail.com','user123');

CREATE TABLE administrateur(
    id SERIAL PRIMARY KEY NOT NULL,
    pseudo VARCHAR(50),
    mdp TEXT
);
INSERT INTO administrateur(pseudo, mdp) VALUES('admin','admin123');

CREATE TABLE type(
    id SERIAL PRIMARY KEY NOT NULL,
    nom VARCHAR(50)
);
INSERT INTO type(nom) VALUES('Virtuelle'), ('Physique');

CREATE SEQUENCE sq_contenu;
CREATE TABLE contenu(
    id VARCHAR(10) NOT NULL PRIMARY KEY DEFAULT 'ct-'||nextval('sq_contenu'),
    nom VARCHAR(50),
    detail TEXT,
    date_publication TIMESTAMP DEFAULT now(),
    date_sortie DATE,
    id_type INT REFERENCES type(id)
);
INSERT INTO contenu(nom, detail, date_sortie, id_type) VALUES('ChatGPT', 'Aide artificielle', '2022/10/03', 1);