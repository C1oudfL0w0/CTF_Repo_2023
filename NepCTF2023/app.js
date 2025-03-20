var path = require('path');
const fs = require('fs');
const crypto = require("crypto");

const express = require('express')
const app = express()
const port = 3000

templateDir = path.join(__dirname, 'template');
app.set('view engine', 'ejs');
app.set('template', templateDir);

function sleep(milliSeconds){ 
    var StartTime =new Date().getTime(); 
    let i = 0;
    while (new Date().getTime() <StartTime+milliSeconds);

}

app.get('/', function(req, res) {
  return res.sendFile('./index.html', {root: __dirname});
});

app.get('/create', function(req, res) {
  let uuid;
  let name = req.query.name ?? '';
  let address = req.query.address ?? '';
  let message = req.query.message ?? '';
  do {
    uuid = crypto.randomUUID();
  } while (fs.existsSync(`${templateDir}/${uuid}.ejs`))

  try {
	if (name != '' && address != '' && message != '') {
		let source = ["source", "source1", "source2", "source3"].sort(function(){
			return 0.5 - Math.random();
		})
		fs.readFile(source[0]+".html", 'utf8',function(err, pageContent){
			fs.writeFileSync(`${templateDir}/${uuid}.ejs`, pageContent.replace(/--ID--/g, uuid.replace(/-/g, "")));
			sleep(2000);
		})
	} else {
		res.status(500).send("Params `name` or `address` or `message` empty");
		return;
	}
  } catch(err) {
    res.status(500).send("Failed to write file");
    return;
  }
  
  return res.redirect(`/page?pageid=${uuid}&name=${name}&address=${address}&message=${message}`);
});

app.get('/page', (req,res) => {
	let id = req.query.pageid
	if (!/^[0-9A-F]{8}-[0-9A-F]{4}-[4][0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i.test(id) || !fs.existsSync(`${templateDir}/${id}.ejs`)) {
		res.status(404).send("Sorry, no such id")
		return;
	}
    res.render(`${templateDir}/${id}.ejs`, req.query);
})

app.listen(port, () => {
  console.log(`App listening on port ${port}`)
})