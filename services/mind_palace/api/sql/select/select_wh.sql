SELECT *
FROM wh
WHERE id_user = ANY(
  select id_user
  from users_service
  where token = '{token}'
)
order by id_wh desc