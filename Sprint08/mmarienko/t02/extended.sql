USE ucode_web;

CREATE TABLE powers (
    id int NOT NULL AUTO_INCREMENT,
    hero_id int NOT NULL,
    name varchar(30) NOT NULL,
    points int NOT NULL,
    type NVARCHAR(7),
    CHECK (type in ('attack', 'defense')),
    PRIMARY KEY (id),
    FOREIGN KEY (hero_id) REFERENCES heroes(id)
);

CREATE TABLE races (
    id int NOT NULL AUTO_INCREMENT,
    hero_id int NOT NULL UNIQUE,
    name varchar(30) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (hero_id) REFERENCES heroes(id)
);

CREATE TABLE teams (
    id int NOT NULL AUTO_INCREMENT,
    hero_id int NOT NULL UNIQUE,
    name varchar(30) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (hero_id) REFERENCES heroes(id)
);

INSERT INTO powers (hero_id, name, points, type)
VALUES
(1, "bloody fist", 110, "attack"),
(1, "iron shield", 200, "defense");

INSERT INTO races (hero_id, name)
VALUES
(1, "Human"),
(2, "Kree");

INSERT INTO teams (hero_id, name)
VALUES
(1, "Avengers"),
(2, "Hydra");