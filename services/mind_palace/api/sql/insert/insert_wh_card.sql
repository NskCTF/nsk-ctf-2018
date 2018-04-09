INSERT INTO wh_card(id_wh, id_think, id_user, price)
SELECT
  '{id_wh}'
  , '{id_think}'
  , (SELECT id_user FROM users_service where token = '{token}')
  , '{price}'
WHERE NOT exists(
  SELECT 1
  FROM wh_card
  WHERE (id_think, id_wh) = ({id_think}, {id_wh})
)
