# coding=utf-8
from flask_restful import Resource
from flask import request
import api.base_names as names
from helper.sql import Sql


class Index(Resource):
	def get(self):
		creat = [
	        names.create_think,
	        names.create_user_table,
	        names.create_wh,
	        names.create_wh_card,
	        names.function_edit_think,
	        names.function_wh_card_new,
	        names.trigger_insert_think,
	        names.trigger_update_wh_card
	    ]
		print(creat)
		for cr in creat:
			print(cr)
			Sql.exec(file=cr)
		return {'test': creat}