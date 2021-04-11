USE ucode_web;

CREATE TABLE heroes (
    id int NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL UNIQUE,
    description text NOT NULL,
    race VARCHAR(30) NOT NULL DEFAULT 'human',
    class_role NVARCHAR(7),
    CHECK (class_role in ('tankman', 'healer', 'dps')),
    PRIMARY KEY (id)
);