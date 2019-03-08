# Laravel + Redis + Socket.io

A safe way to implement socket to pub-sub with users, this is just a getting started, based in Laracasts Course.

Basically the flow:
Your frontend will open-up a socket with your Socket.io server.
Anything that your frontend fires to Laravel (normal request or ajax), you should fire an event or a basic Redis Broadcast, in this example we cover both, and Redis will emit an event to Socket.io.
Using this your socket.io server is safe, there are no direct ports for Input events, it only fire output events based in what Redis tells it to do.

Ps.: I used Vue/Axios and Bulma just to make it pretty with a few lines of code. You can use any css/js frameworks you like.

---

### Requirements:

1. Once you start your laravel project, remember to `composer require --save predis/predis` to use Redis.
2. Configure the IP/ports of your Redis server (use docker for dev environments).
3. Start Laravel.
4. Start Redis.
5. Start Socket.io ( Terminal: `node socket.js`) .
6. Enjoy.
