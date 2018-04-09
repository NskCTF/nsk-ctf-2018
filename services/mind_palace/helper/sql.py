# -*- coding: utf-8 -*-
import psycopg2
from psycopg2.extras import RealDictCursor
from config import DATABASE
__author__ = 'ar.chusovitin'


class Sql:
    @staticmethod
    def connect():
        config_connect = "dbname='{dbname}' user='{user}' host='{host}' password='{password}'"
        try:
            connect = psycopg2.connect(config_connect.format(**DATABASE))
            return connect, connect.cursor(cursor_factory=RealDictCursor)
        except:
            raise

    @staticmethod
    def exec(query=None, args=None, file=None):
        try:
            return Sql._switch(query=query, args=args, file=file)
        except:
            return None

    @staticmethod
    def _switch(query=None, args=None, file=None):
        if query and args:
            return Sql._query_exec_args(query, args)
        if query and not args:
            return Sql._query_exec(query)
        if file and args:
            return Sql._query_file_args_exec(file, args)
        if file and not args:
            return Sql._query_file_exec(file)
        return None

    @staticmethod
    def _query_exec(query):
        return Sql._exec(query)

    @staticmethod
    def _query_file_exec(file):
        with open(file, 'r') as f:
            query = f.read()
            return Sql._exec(query)

    @staticmethod
    def _query_file_args_exec(file, args):
        with open(file, 'r') as f:
            query = f.read().format(**args)
            return Sql._exec(query)

    @staticmethod
    def _query_exec_args(query, args):
        query.format(**args)
        return Sql._exec(query)

    @staticmethod
    def _exec(query):
        """
        Метод выполняет SQL запрос к базе
        :param query: str SQL запрос
        :return: dict результат выполнения запроса
        """
        print(query)
        connect, current_connect = Sql.connect()
        result = None
        try:
            current_connect.execute(query)
        except psycopg2.Error as e:
            pass
        finally:
            try:
                connect.commit()
                result = current_connect.fetchall()
            except psycopg2.Error as e:
                pass
            finally:
                connect.close()
                return result
