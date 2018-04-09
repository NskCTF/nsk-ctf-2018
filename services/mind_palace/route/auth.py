# coding=utf-8
from flask_restful import Resource, reqparse
from helper.sql import Sql
import api.base_names as names
from uuid import uuid4


class Authentication(Resource):
    def __init__(self):
        self.__parser = reqparse.RequestParser()
        self.__parser.add_argument('login')
        self.__parser.add_argument('password')
        self.__args = self.__parser.parse_args()
        self.login = None
        self.password = None

    def parse_data(self):
        self.login = self.__args.get('login', None)
        self.password = self.__args.get('password', None)
        print("login: ", self.login)
        print("password: ", self.password)

    def check_data(self):
        if self.login is None or self.password is None:
            return False
        return True

    def switch(self):
        data = {'login': self.login, 'password': self.password, 'token': uuid4()}
        token = Sql.exec(file=names.select_token, args=data)
        if not token:
            token = Sql.exec(file=names.insert_user, args=data)
        return token

    def get(self):
        try:
            print("Auth")
            self.parse_data()
            if self.check_data():
                answer = self.switch()
                print("answer: ", answer)
                return answer, 200, {'Access-Control-Allow-Origin': '*'}
            return "Error",  200, {'Access-Control-Allow-Origin': '*'}
        except:
            return "Error", 200, {'Access-Control-Allow-Origin': '*'}
