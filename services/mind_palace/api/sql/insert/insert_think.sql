INSERT INTO think(id_user, think, sorted, status, gravity)
select id_user
  , '{think}'
  , {sorted}
  , {status}
  , {gravity}
from users_service
where token = '{token}'
RETURNING id_think