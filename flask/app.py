# -*- coding: utf-8 -*-  
from flask import Flask,jsonify,request
from ext.qzone import Qzone
from ext.tieba import Tieba

app = Flask(__name__)

@app.route('/')
def index():
    return jsonify({'id':1})

@app.route('/login', methods=['GET', 'POST'])
def login():
    if request.method == 'POST':
        return 'POST'
    else:
        return 'GET'

@app.route('/qzone/<qq>/<password>/<content>', methods=['GET', 'POST'])
def qzone(qq,password,content):
	try:
		qzone = Qzone(qq,password,content)
		qzone.login()
	except Exception as e:
		return jsonify({'msg':e})
	finally:
		return jsonify({'msg':'正在运行'})

@app.route('/tieba/<username>/<password>/', methods=['GET', 'POST'])
def tieba(username,password):
	try:
		tieba = Tieba(username,password)
		tieba.login()
	except Exception as e:
		return jsonify({'msg':e})
	finally:
		return jsonify({'msg':'正在运行'})

if __name__ == '__main__':
    app.debug = True
    app.run()