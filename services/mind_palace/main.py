# coding=utf-8
from flask import Flask
from flask_restful import Api
import api.base_names as names
from helper.sql import Sql
import os
print(os.getcwd())
from route import Favicon, \
    auth, \
    think, \
    wh, \
    wh_card, \
    Index

routes = {
    Index.Index: '/',
    auth.Authentication: '/auth',
    think.Think: '/think',
    wh.Wh: '/wh',
    wh_card.WhCard: '/wh_card',
    Favicon.Favicon: "/favicon.ico"
}

_app = Flask(__name__)
_app.config['JSON_AS_ASCII'] = False
api = Api(_app)


@_app.errorhandler(404)
def not_found(error):
    return {'Error': 'Not found'}, 404




if __name__ == '__main__':
    try:
        for route_class, route in routes.items():
            api.add_resource(route_class, route)
        _app.run(host='0.0.0.0', port=13452, threaded=True)
    except Exception as e:
        print(e)
