from database import view_models
from database import new_safe_db
from database import all_safe
from database import take_datadb
from database import delete
from database import take_data_user
__author__ = 'RaldenProg'

def welcome(conn, addres):
    conn.send(b'Welcome to service AllSafe\nSelect a menu item to get started with the service\n1. Rent a safe\n2. Examine existing safes\n3. Take the data from safe\n')
    data = conn.recv(1024)
    if data.decode("utf-8") == '1\n':
        new_safe(conn)
    if data.decode("utf-8") == '2\n':
        Examine(conn)
    if data.decode("utf-8") == '3\n':
        take_data(conn)
    if data.decode("utf-8") == '4\n':
        take_data_user(conn)

def new_safe(conn):
    conn.send(b'What is your name: ')
    data = conn.recv(1024)
    autor = data.decode("utf-8").split("\n")[0]
    conn.send(b'Enter a description for the safe: ')
    data = conn.recv(1024)
    info = data.decode("utf-8").split("\n")[0]
    conn.send(b'Choose a model for the safe\n')
    models = view_models()
    for i in range(len(models)):
        conn.send(str(i).encode("utf-8"))
        conn.send(b' ')
        conn.send(models[i].encode("utf-8"))
        conn.send(b'\n')
    data = conn.recv(1024)
    model = data.decode("utf-8").split("\n")[0]
    conn.send(b'Enter the PIN code: ')
    data = conn.recv(1024)
    pin = data.decode("utf-8").split("\n")[0]
    conn.send(b'Enter the information you want to save\n')
    data = conn.recv(2048)
    input = data.decode("utf-8").split("\n")[0]
    list_models = view_models()
    result = new_safe_db(list_models[int(model)], pin, autor, info, input)
    conn.send(b'Your safe has been successfully created\n')
    conn.send(b'Your safe id = ')
    for i in result:
        for j in i:
            conn.send(str(j).encode("utf-8"))
            conn.send(b" ")
    conn.send(b'\nBack to menu y/n ?\n')
    data = conn.recv(1024)
    if data.decode("utf-8") == 'y\n':
        welcome(conn, 1)

def Examine(conn):
    info = all_safe()
    for i in info:
        for j in i:
            conn.send(str(j).encode("utf-8"))
            conn.send(b' ')
        conn.send(b'\n')
    conn.send(b'Back to menu y/n ?\n')
    data = conn.recv(1024)
    if data.decode("utf-8") == 'y\n':
        welcome(conn, 1)

def take_data(conn):
    conn.send(b'Enter login: ')
    data = conn.recv(1024).decode("utf-8")
    login = data
    conn.send(b'Enter password safe: ')
    data = conn.recv(1024).decode("utf-8")
    password = data
    result = take_datadb(login.split()[0], password)
    id = result[0][0]
    for i in result:
        for j in i:
            conn.send(str(j).encode("utf-8"))
            conn.send(b" ")
    if result != []:
        conn.send(b'\nDelete this safe y/n ?\n')
        data = conn.recv(1024)
        if data.decode("utf-8") == 'y\n':
            delete(id)
            conn.send(b'Your safe has been successfully deleted\n')
    else:
        conn.send(b'Incorrect id or password\n')
    conn.send(b'\nBack to menu y/n ?\n')
    data = conn.recv(1024)
    if data.decode("utf-8") == 'y\n':
        welcome(conn, 1)
