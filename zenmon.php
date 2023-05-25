<?php
/**
 * Plugin Name: My Chatbot Plugin
 * Description: Blank chatbot plugin for AI training.
 * Version: 1.0.0
 * Author: Your Name
 */

function my_chatbot_display_interface()
{
    ?>
<!doctype html>
    <html>
    <style>
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
          overflow-y: scroll;
          padding: 10px;
        }

        #chat-message {
          margin-bottom: 10px;
          padding: 5px 10px;
          border-radius: 5px;
        }

        #user {
	  background-color: #e2f0ff;
	  text-align: right;
	  align-self: flex-end;
	  border-radius: 3px;
        }

        #bot {
	  background-color: #f0f0f0;
	  align-self: flex-start;
	  border-radius: 3px;
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
          padding: 5px 10px;
          border: none;
          border-radius: 10px;
          background-color: #4caf50;
          color: #fff;
          cursor: pointer;
	}

	ul {
	  list-style-type:none;
	}

    </style>
  <body>
    <div id="chatbot">
      <div id="chatbot-header">
        <h3>Neurosciences Expert Chatbot</h3>
      </div>
      <div id="chatbot-body">
          <ul id="list">
            <li id="bot">Ask me anything about neurosciences!</li>
          </ul>
      </div>
      <div id="chatbot-footer">
        <input type="text" placeholder="Type your message here" id="in" />
        <button onclick="getValue();">Send</button>
	<script>
	function getValue(){
		let input = document.getElementById("in").value;
		let li = document.createElement("li");
		li.setAttribute("id", "user");
		li.innerHTML = input;
		document.getElementById("list").appendChild(li);
		document.getElementById("in").value = "";
		li = document.createElement("li");
		li.setAttribute("id", "bot");
		li.innerHTML = "Next";
		document.getElementById("list").appendChild(li);
	}</script>
      </div>
    </div>
  </body>
 </html>
    <?php
}

add_action('wp_head', 'my_chatbot_display_interface');
