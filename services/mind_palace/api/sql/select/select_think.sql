with
you_think AS (
      SELECT id_think
        , id_user
      FROM think
      WHERE id_user = ANY(
        SELECT id_user
        FROM users_service
        WHERE token = '{token}'
      )
  )
SELECT *
FROM you_think
order by id_think desc