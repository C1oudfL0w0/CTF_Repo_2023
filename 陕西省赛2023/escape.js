//const { MongoClient } = require("mongodb");
//const client = new MongoClient("mongodb://localhost:27017/");

const vm = require('vm');

const express = require("express");
const bodyParser = require('body-parser');
const app = express();

const isValidCode = (code) => {
    const isLengthValid = code.length < 365;
    const isASCII = /^[\x20-\x7e]+$/.test(code);
    const containsInvalidChars = /[.\[\]{}\s;`'"/\\_<>?:]/.test(code);
    const doesNotContainImport = !code.toLowerCase().includes("import");
    const doesNotContainUnescape = !/%(?:d0|d1|%[89abAB][0-9a-fA-F])/.test(code);

    return (
      isLengthValid &&
      isASCII &&
      !containsInvalidChars &&
      doesNotContainImport &&
      doesNotContainUnescape
    );
};

app.use(bodyParser.json());

app.get('/', function (req, res) {
    res.sendFile( __dirname + "/static/index.html" );
});

app.get('/readfile', function (req, res) {
    res.sendFile( __dirname + "/app.js" );
});

app.get('/exec', (req, res) => {
    const code = req.query.code;
    if (!code) {
        res.status(400).json({ error: 'Code is required.' });
        return;
    }

    if (isValidCode(code)) {
        try {
            const sandbox = {};
            const script = new vm.Script(code);
            const result = script.runInNewContext(sandbox);
            res.json({ result });
        } catch (err) {
            res.status(400).json({ error: err.message });
        }
    } else {
        res.status(400).json({ error: 'you cant bypass my vm best waf!' });
        return;
    }
});

//app.get('/getflag', function (req, res) {
//    todo...
//});

app.listen(3000, () => console.log(`nodeapp listening on http://localhost:3000`));