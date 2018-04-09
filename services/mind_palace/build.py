from helper.sql import Sql
import api.base_names as names

create = [
    names.create_think,
    names.create_user_table,
    names.create_wh,
    names.create_wh_card,
    names.function_edit_think,
    names.function_wh_card_new,
    names.trigger_insert_think,
    names.trigger_update_wh_card
]

for cr in create:
    try:
        Sql.exec(cr)
    except:
        pass
