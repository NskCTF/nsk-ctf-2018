SELECT id_wh FROM wh WHERE exists(SELECT 1 FROM wh WHERE name LIKE '{wh}%')