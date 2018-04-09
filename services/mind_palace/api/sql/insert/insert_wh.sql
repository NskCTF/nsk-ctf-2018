INSERT INTO wh(name, id_user)
SELECT '{name}'
  , (SELECT id_user FROM users_service where token = '{token}')
RETURNING id_wh