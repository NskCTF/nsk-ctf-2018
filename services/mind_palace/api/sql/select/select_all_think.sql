with
all_think AS (
      SELECT id_think
        , id_user
      FROM think
      WHERE id_user = (
        SELECT id_user
        FROM users_service
        WHERE token = '{token}'
      )
      UNION SELECT id_think
              , id_user
            FROM think
            WHERE status = 1
      UNION SELECT id_think
              , id_user
            FROM think
            WHERE gravity <= 0
  )
table all_think