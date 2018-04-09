WITH
cards as (
  SELECT id_think
    , id_wh
    , price
  FROM wh_card
  WHERE id_user = ANY(
     SELECT id_user
     FROM users_service
     WHERE token = '{token}'
  )
),
inc_think as (
  SELECT c.*
    , t.think
  FROM cards c
  LEFT JOIN think t
    on t.id_think = c.id_think
)
TABLE inc_think