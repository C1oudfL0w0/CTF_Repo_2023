import tornado.ioloop
import tornado.web
import os

BASE_DIR = os.path.dirname(__file__)

def waf(data):
    bl = ['\'', '"', '__', '(', ')', 'or', 'and', 'not', '{{', '}}']
    for c in bl:
        if c in data:
            return False
    for chunk in data.split():
        for c in chunk:
            if not (31 < ord(c) < 128):
                return False
    return True

class IndexHandler(tornado.web.RequestHandler):
    def get(self):
        with open(__file__, 'r') as f:
            self.finish(f.read())
    def post(self):
        data = self.get_argument("ssti")
        if waf(data):
            with open('1.html', 'w') as f:
                f.write(f"""<html>
                        <head></head>
                        <body style="font-size: 30px;">{data}</body></html>
                        """)
                f.flush()
            self.render('1.html')
        else:
            self.finish('no no no')

if __name__ == "__main__":
    app = tornado.web.Application([
            (r"/", IndexHandler),
        ], compiled_template_cache=False)
    app.listen(827)
    tornado.ioloop.IOLoop.current().start()