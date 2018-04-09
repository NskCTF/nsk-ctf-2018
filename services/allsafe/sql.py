import sqlite3

__author__ = 'RaldenProg'

def sqlquery(sql):
    conn = sqlite3.connect('AllSafe.db')
    c = conn.cursor()
    c.execute(sql)
    conn.commit()
    return c.fetchall()