var http = require('http').Server();
var io = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis('localhost:6379');

redis.subscribe('test-channel');

redis.on('message', function (channel, message) {
  message = JSON.parse(message);

  // the next line is required if it was sent by an Laravel Event
  message.event = message.event.replace('App\\Events\\', '');

  io.emit(channel + ':' + message.event, message.data);
})

http.listen(3000);