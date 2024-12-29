const express = require('express')
const app = express()
const WebSocketServer = require('ws').Server

const wss = new WebSocketServer({ port: 8000 })

app.listen(3000, function () {
    console.log('Running on port 3000!')
    console.log('---------------------')
})

app.use(express.static('public'));  // 提供静态文件（前端页面）

let wsArray = {}

wss.on('connection', function(ws, req) {
    const location = new URL(req.url, `http://${req.headers.host}`)
    const name = decodeURIComponent(location.pathname.substring(1))

    ws.id = name
    ws.name = name
    wsArray[ws.id] = ws

    // ws.send(`Hello, ${name}!`)

    const time = new Date()
    for (let id in wsArray) {
        if (wsArray[id] !== ws) {
            wsArray[id].send(`${name}：已上線－於${time.toLocaleDateString()}`)
        }
    }


    ws.on('message', function(mes) {
        for (let id in wsArray) {
            // if (wsArray[id] !== ws) {
                wsArray[id].send(`${name}: ${mes}`)
            // }
        }
    })

    ws.on('close', function() {
        for (let id in wsArray) {
            if (wsArray[id] !== ws) {
                wsArray[id].send(`${name}：已離線`)
            }
        }

        delete wsArray[ws.id]
    })
})


