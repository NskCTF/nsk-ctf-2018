from sql import sqlquery

__author__ = 'RaldenProg'


def new_base():
    result = sqlquery('''CREATE TABLE safes
                 (id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE, model text, pin text, autor text, info text, input text)''')


def new_safe_db(model, pin, autor, info, input):
    result = sqlquery("INSERT INTO safes (model, pin, autor, info, input) VALUES ('{}', {}, '{}', '{}', '{}')".format(model, int(pin), autor, info, input))
    sql = "select id from safes where autor=\"{}\" and info=\"{}\"".format(autor, info)
    result = sqlquery(sql)
    return result

def view_models():
    result = sqlquery("select model from models")
    list = []
    for i in result:
        list.append(i[0])
    return list

def all_safe():
    sql = "SELECT id, info, model from safes"
    result = sqlquery(sql)
    return result

def take_datadb(login, password):
    sql = "select * from safes where autor =\"{}\" and pin ={}".format(login, password)
    result = sqlquery(sql)
    if result == []:
        sql = "select model from safes where autor = \"{}\"".format(login)
        model = sqlquery(sql)
        sql = "select pin from models where model=\"{}\"".format(model[0][0])
        pin = sqlquery(sql)
        if password.split()[0] == pin[0][0]:
            sql = "select * from safes where autor = \"{}\"".format(login)
            result = sqlquery(sql)
            return result
    return result
def delete(id):
    sql = "delete from safes where id={}".format(id)
    result = sqlquery(sql)

def take_data_user(conn):
    sql = "select * from safes"
    conn.send(str(sqlquery(sql)).encode("utf-8"))
