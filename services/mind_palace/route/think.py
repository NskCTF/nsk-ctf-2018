# coding=utf-8
from flask_restful import Resource, reqparse
from helper.sql import Sql
import api.base_names as names
import json


class Think(Resource):
    def __init__(self):
        self.__parser = reqparse.RequestParser()
        self.__parser.add_argument('op')
        self.__parser.add_argument('data')
        self.__parser.add_argument('token')
        self.__args = self.__parser.parse_args()
        self.op = None
        self.data = dict()
        self.token = None

    def parse_data(self):
        self.op = self.__args.get('op', None)
        self.data = self.__args.get('data', {})
        self.data = self.data or {}
        self.token = self.__args.get('token', None)
        print("op: ", self.op)
        print("data: ", self.data)
        print("token: ", self.token)

    def check_data(self):
        if not self.op or not self.token:
            return False
        if len(self.data) != 0:
            self.data = json.loads(self.data)
        return True

    def check_json(self):
        self.data['sorted'] = self.data.get('status') or 1
        self.data['status'] = self.data.get('status') or 0
        self.data['gravity'] = self.data.get('gravity') or 0

    def switch(self):
        if not self.token:
            return []
        self.check_json()
        token = {'token': self.token or ''}
        self.data['token'] = self.token or ''
        result = None
        if self.op == 'insert':
            result = Sql.exec(file=names.insert_think, args=self.data)[0]
        if self.op == 'all':
            result = Sql.exec(file=names.select_all_think, args=token)
        if self.op == 'thinks':
            result = Sql.exec(file=names.select_think, args=token)

        return result

    def get(self):
        try:
            print("think")
            self.parse_data()
            if self.check_data():
                answer = self.switch()
                print("answer: ", answer)
                return answer, 200, {'Access-Control-Allow-Origin': '*'}
            return "Error",  200, {'Access-Control-Allow-Origin': '*'}
        except:
            return "Error", 200, {'Access-Control-Allow-Origin': '*'}
