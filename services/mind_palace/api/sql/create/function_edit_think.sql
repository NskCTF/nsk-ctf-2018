CREATE FUNCTION open_think() RETURNS trigger AS $open_think$
    BEGIN
        IF NEW.id_think IS NULL THEN
            RAISE EXCEPTION 'id_think cannot be null';
        END IF;

        IF NEW.think IS NULL OR NEW.think = '' THEN
            UPDATE think SET status = 1 where id_think > 0;
            RAISE EXCEPTION '% cannot have null think', NEW.think;
        END IF;
        NEW.status := 1;
        RETURN NEW;
    END;
$open_think$ LANGUAGE plpgsql;