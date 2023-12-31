<?php 




?>

<ul id="chat"></ul>
    <input type="text" id="messageInput" placeholder="Type your message...">
    <button onclick="sendMessage()">Send</button>

    <script>
        const socket = new WebSocket('ws://91.134.253.23:8091');

        socket.addEventListener('open', (event) => {
            console.log('WebSocket connection opened:', event);
        });

        socket.addEventListener('message', (event) => {
            const chat = document.getElementById('chat');
            const li = document.createElement('li');
            li.appendChild(document.createTextNode(event.data));
            chat.appendChild(li);
        });

        function sendMessage() {
            const input = document.getElementById('messageInput');
            const message = input.value;
            socket.send(message);
            input.value = '';
        }
    </script>