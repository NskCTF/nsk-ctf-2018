CREATE TABLE think
(
    id_think SERIAL PRIMARY KEY NOT NULL,
    id_user INTEGER,
    think text,
    sorted INTEGER,
    status INTEGER,
    gravity INTEGER
);
