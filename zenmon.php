<?php
/**
 * Plugin Name: Neuroscience ChatBot Plugin
 * Description: ChatBot expert in neurosciences.
 * Version: 1.0.0
 * Authors: Pauline Mieuzet, Corentin Mieuzet, Baptist Levrel
 */

function display_chatbot()
{
    ?>
<!doctype html>
    <html>
    <style>
        #user {
            background-color: #e2f0ff;
            max-width: 80%;
            border-radius: 5px;
            text-align: right;
            text-align-last: left;
            margin-left: auto;
            width: fit-content;
            word-break: break-word;
            margin-bottom: 10px;
        }

        #bot {
            background-color: #f0f0f0;
            max-width: 80%;
            border-radius: 5px;
            width: fit-content;
            word-break: break-word;
            margin-bottom: 10px;
        }
        #chatbot {
          border: 1px solid #ccc;
          border-radius: 5px;
          max-width: 600px;
          margin: auto;
        }

        #chatbot-header {
          background-color: #f5f5f5;
          padding: 10px;
          border-bottom: 1px solid #ccc;
        }

        #chatbot-body {
          height: 300px;
          padding: 10px;
          overflow-y: scroll;
          max-width: 600px;
          word-wrap: break-all;
        }

        #chat-message {
          margin-bottom: 10px;
          padding: 5px 10px;
          border-radius: 5px;
        }

        #chatbot-footer {
          padding: 10px;
          border-top: 1px solid #ccc;
        }

        input[type="text"] {
          width: 80%;
          padding: 5px;
          border: 1px solid #ccc;
          border-radius: 5px;
        }

        button {
          padding: 5px 2.5em;
          border: none;
          border-radius: 10px;
          background-color: #4caf50;
          color: #fff;
          cursor: pointer;
        }

        ul {
          list-style-type: none;
          padding: 0;
          width: 100%;
        }

    </style>
  <body>
    <div id="chatbot">
      <div id="chatbot-header">
        <h3>Neurosciences Expert Chatbot</h3>
      </div>
      <div id="chatbot-body">
          <ul id="list">
            <li> <div id="bot">Ask me anything about neurosciences!</div></li>
          </ul>
      </div>
      <div id="chatbot-footer">
        <input type="text" placeholder="Type your message here" id="in" onkeyup="keyHandler(event)">
        <button onclick="getValue();">Send</button>
        <script>

        function keyHandler(event)
        {
           if (event.key === 'Enter')
                getValue();
            event.preventDefault();
        }

        function scrollToBottom()
        {
            const chatbotBody = document.getElementById("chatbot-body");
            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        function getValue()
        {
            let input = document.getElementById("in").value.trim();
            if (input === "")
            {
                document.getElementById("in").value = "";
                return ;
            }
            let li = document.createElement("li");
            let div = document.createElement("div");
            div.setAttribute("id", "user");
            div.innerHTML = input;
            li.appendChild(div);
            document.getElementById("list").appendChild(li);
            document.getElementById("in").value = "";
            li = document.createElement("li");
            div = document.createElement("div");
            div.setAttribute("id", "bot");
            div.innerHTML = "coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou coucou ";
            li.appendChild(div);
            document.getElementById("list").appendChild(li);
            scrollToBottom();
        }</script>
      </div>
    </div>
  </body>
 </html>
    <?php
}

add_action('wp_head', 'display_chatbot');