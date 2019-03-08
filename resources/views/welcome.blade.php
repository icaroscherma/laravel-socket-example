<!DOCTYPE html>
<html lang="en">
<head>
  <title>Socket IO test by Icaro</title>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css"/>
</head>
<body>
  <section class="hero">
    <div class="hero-body">
      <div class="container">
        <h1 class="title">
          Simple chat with pub-sub and sockets
        </h1>
        <h2 class="subtitle">
          Laravel + Redis + Socket
        </h2>
      </div>
    </div>
  </section>
  <section class="section" id="app">
    <div class="box">
      <div class="content">
        <ul>
          <li v-for="message in messages">@{{ message }}</li>
        </ul>
      </div>
      <article class="media">
        <figure class="media-left">
          <p class="image is-64x64">
            <img class="is-rounded" src="https://www.gravatar.com/avatar/__?d=mp">
          </p>
        </figure>
        <div class="media-content">
          <div class="field">
            <p class="control">
              <textarea v-model="myMessage" class="textarea" placeholder="Digite algo..."></textarea>
            </p>
          </div>
          <nav class="level">
            <div class="level-left">
              <div class="level-item">
                <a class="button is-info" @click="post">Post</a>
              </div>
            </div>
          </nav>
        </div>
      </article>
    </div>
  </section>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.2.0/socket.io.js"></script>
  <script>
    var socket = io('http://localhost:3000');
    var app = new Vue({
      el: '#app',
      data: {
        myMessage: "",
        messages: ['aaaa'],
      },
      created: function () {
        socket.on('test-channel:UserSignedUp', function(data) {
          this.messages.push(data.message);
        }.bind(this));
      },
      methods: {
        post: function() {
          let data = {
            event: 'UserSignedUp',
            data: {
              message: this.myMessage
            }
          };
          axios.post('send-message', data)
            .then(function (response) {
              this.myMessage = '';
            });
        }
      }
    });
  </script>
</body>
</html>