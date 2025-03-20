#encoding:utf-8
import os
import re, random, uuid
from flask import *
from werkzeug.utils import *
import yaml
from urllib.request import urlopen
app = Flask(__name__)
random.seed(uuid.getnode())
app.config['SECRET_KEY'] = str(random.random()*233)
app.debug = False
BLACK_LIST=["yaml","YAML","YML","yml","yamiyami"]
app.config['UPLOAD_FOLDER']="/app/uploads"

@app.route('/')
def index():
    session['passport'] = 'YamiYami'
    return '''
    Welcome to HDCTF2023 <a href="/read?url=https://baidu.com">Read somethings</a>
    <br>
    Here is the challenge <a href="/upload">Upload file</a>
    <br>
    Enjoy it <a href="/pwd">pwd</a>
    '''
@app.route('/pwd')
def pwd():
    return str(pwdpath)
@app.route('/read')
def read():
    try:
        url = request.args.get('url')
        m = re.findall('app.*', url, re.IGNORECASE)
        n = re.findall('flag', url, re.IGNORECASE)
        if m:
            return "re.findall('app.*', url, re.IGNORECASE)"
        if n:
            return "re.findall('flag', url, re.IGNORECASE)"
        res = urlopen(url)
        return res.read()
    except Exception as ex:
        print(str(ex))
    return 'no response'

def allowed_file(filename):
   for blackstr in BLACK_LIST:
       if blackstr in filename:
           return False
   return True
@app.route('/upload', methods=['GET', 'POST'])
def upload_file():
    if request.method == 'POST':
        if 'file' not in request.files:
            flash('No file part')
            return redirect(request.url)
        file = request.files['file']
        if file.filename == '':
            return "Empty file"
        if file and allowed_file(file.filename):
            filename = secure_filename(file.filename)
            if not os.path.exists('./uploads/'):
                os.makedirs('./uploads/')
            file.save(os.path.join(app.config['UPLOAD_FOLDER'], filename))
            return "upload successfully!"
    return render_template("index.html")
@app.route('/boogipop')
def load():
    if session.get("passport")=="Welcome To HDCTF2023":
        LoadedFile=request.args.get("file")
        if not os.path.exists(LoadedFile):
            return "file not exists"
        with open(LoadedFile) as f:
            yaml.full_load(f)
            f.close()
        return "van you see"
    else:
        return "No Auth bro"
if __name__=='__main__':
    pwdpath = os.popen("pwd").read()
    app.run(
        debug=False,
        host="0.0.0.0"
    )
    print(app.config['SECRET_KEY'])
