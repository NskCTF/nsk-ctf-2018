CREATE TABLE users_service
(
    id_user SERIAL PRIMARY KEY NOT NULL,
    login text,
    password text,
    token text,
    UNIQUE (login, password)
);
