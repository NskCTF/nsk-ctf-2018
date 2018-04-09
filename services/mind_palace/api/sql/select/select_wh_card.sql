WITH
cards as (
  SELECT id_think
    , id_wh
    , price
  FROM wh_card
  WHERE id_think = {id_think}
    AND id_wh = {id_wh}
),
inc_think as (
  SELECT c.*
    , t.think
  FROM cards c
  LEFT JOIN think t
    on t.id_think = c.id_think
)
TABLE inc_think