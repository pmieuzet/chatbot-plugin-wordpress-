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
        .chatbot {
          border: 1px solid #ccc;
          border-radius: 5px;
          max-width: 600px;
          margin: auto;
        }

        .chatbot-header {
          background-color: #f5f5f5;
          padding: 10px;
          border-bottom: 1px solid #ccc;
        }

        .chatbot-body {
          height: 300px;
          overflow-y: scroll;
          padding: 10px;
        }

        .chat-container {
          display: flex;
          flex-direction: column;
        }

        .chat-message {
          margin-bottom: 10px;
          padding: 5px 10px;
          border-radius: 5px;
        }

        .user {
          background-color: #e2f0ff;
        }

        .bot {
          background-color: #f0f0f0;
        }

        .chatbot-footer {
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
    </style>
  <body>
    <div class="chatbot">
      <div class="chatbot-header">
        <h3>Neurosciences Expert Chatbot</h3>
      </div>
      <div class="chatbot-body">
        <div class="chat-container">
          <div class="chat-message user">
            <p>Ask me anything about neurosciences!</p>
          </div>
        </div>
      </div>
      <div class="chatbot-footer">
        <input type="text" placeholder="Type your message here" />
        <button>Send</button>
      </div>
    </div>
  </body>
 </html>
    <?php
}

add_action('wp_head', 'my_chatbot_display_interface');
