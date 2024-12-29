const calculator = require('./calculator')

// 以 Express 建立 Web 伺服器
var express = require("express");
var app = express();

// 以 body-parser 模組協助 Express 解析表單與JSON資料
var bodyParser = require('body-parser');
app.use( bodyParser.json() );
app.use( bodyParser.urlencoded({extended: false}) );

// 一切就緒，開始接受用戶端連線
// app.listen(process.env.PORT);
app.listen(3000);
console.log("Web伺服器就緒，開始接受用戶端連線.");
console.log("鍵盤「Ctrl + C」可結束伺服器程式.");

// ---------------

app.get("/", function (request, response) {
    var html = `
            <html>
                <body>
                    <form method="post" action="http://localhost:3000/add">Numbers: 
                        <input type="text" name="numberList" />
                        <input type="submit" value="Add Number List" />
                    </form>
                </body>
            </html>`
    response.writeHead(200, {'Content-Type': 'text/html'})
    response.end(html)
});

app.post("/add", function (request, response) {
    let numberList = request.body.numberList;
    let result = calculator.add(numberList)
    response.writeHead(200, {'Content-Type': 'text/html'})
    response.end('Result: ' + result)
});
