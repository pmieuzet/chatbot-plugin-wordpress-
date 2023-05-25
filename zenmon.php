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
    <head>
        <link rel="stylesheet" href="./styles.css">
    </head>
  <body style="background-color:red">
    <div class="chatbot">
      <div class="chatbot-header">
        <h3>Chatbot</h3>
      </div>
      <div class="chatbot-body">
        <div class="chat-container">
          <div class="chat-message user">
            <p>Hello! How can I assist you today?</p>
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