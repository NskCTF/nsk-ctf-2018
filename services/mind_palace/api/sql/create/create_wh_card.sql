CREATE TABLE wh_card
(
    id_wh INTEGER,
    id_think INTEGER,
    id_user INTEGER,
    price INTEGER,
    UNIQUE (id_wh, id_think)
);
