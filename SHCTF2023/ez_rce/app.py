from flask import *
import subprocess

app = Flask(__name__)

def gett(obj,arg):
    tmp = obj
    for i in arg:
        tmp = getattr(tmp,i)
    return tmp

def sett(obj,arg,num):
    tmp = obj
    for i in range(len(arg)-1):
        tmp = getattr(tmp,arg[i])
    setattr(tmp,arg[i+1],num)

def hint(giveme,num,bol):
    c = gett(subprocess,giveme)
    tmp = list(c)
    tmp[num] = bol
    tmp = tuple(tmp)
    sett(subprocess,giveme,tmp)

def cmd(arg):
    subprocess.call(arg)


@app.route('/',methods=['GET','POST'])
def exec():
    try:
        if request.args.get('exec')=='ok':
            shell = request.args.get('shell')
            cmd(shell)
        else:
            exp = list(request.get_json()['exp'])
            num = int(request.args.get('num'))
            bol = bool(request.args.get('bol'))
            hint(exp,num,bol)
        return 'ok'
    except:
        return 'error'
    
if __name__ == '__main__':
    app.run(host='0.0.0.0',port=5000)
