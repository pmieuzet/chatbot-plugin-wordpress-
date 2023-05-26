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
    #chatbot-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 9999;
    }

    #chatbot-bubble {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #4caf50;
        color: #fff;
        text-align: center;
        line-height: 60px;
        cursor: pointer;
    }

    #chatbot {
        display: none;
        position: fixed;
        bottom: 90px;
        right: 30px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
        overflow: hidden;
    }

    #chatbot-header {
        background-color: #f5f5f5;
        padding: 10px;
        border-bottom: 1px solid #ccc;
        text-align: center;
    }

    #chatbot-body {
        height: 300px;
        padding: 10px;
        overflow-y: scroll;
    }

    .user-message {
        background-color: #e2f0ff;
        max-width: 80%;
        border-radius: 5px;
        text-align: right;
        margin-left: auto;
        width: fit-content;
        word-break: break-word;
        margin-bottom: 10px;
        padding: 5px 10px;
    }

    .bot-message {
        background-color: #f0f0f0;
        max-width: 80%;
        border-radius: 5px;
        width: fit-content;
        word-break: break-word;
        margin-bottom: 10px;
        padding: 5px 10px;
    }

    #chatbot-footer {
        padding: 10px;
        border-top: 1px solid #ccc;
    }

    input[type="text"] {
        width: 70%;
        padding: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        padding: 5px 1.3em;
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
    <div id="chatbot-container">
        <div id="chatbot-bubble" onclick="toggleChatbot()">Chat</div>
        <div id="chatbot">
            <div id="chatbot-header">
                <h3>Chatbot</h3>
            </div>
            <div id="chatbot-body">
                <ul id="list">
                    <li>
                        <div class="bot-message">Ask me anything about neurosciences!</div>
                    </li>
                </ul>
            </div>
            <div id="chatbot-footer">
                <input type="text" placeholder="Type your message here" id="in" onkeyup="keyHandler(event)">
                <button onclick="getValue();">Send</button>
            </div>
        </div>
    </div>
    <script>

        let chatbotOpen = false;

        function toggleChatbot()
        {
            const chatbotContainer = document.getElementById("chatbot-container");
            const chatbot = document.getElementById("chatbot");
            chatbotOpen = !chatbotOpen;
            if (chatbotOpen) {
                chatbotContainer.style.height = "auto";
                chatbot.style.display = "block";
            }
            else {
                chatbotContainer.style.height = "60px";
                chatbot.style.display = "none";
            }
        }

        function keyHandler(event) {
            if (event.key === "Enter") {
                getValue();
            }
            event.preventDefault();
        }

        function scrollToBottom() {
            const chatbotBody = document.getElementById("chatbot-body");
            chatbotBody.scrollTop = chatbotBody.scrollHeight;
        }

        function getValue() {
            let input = document.getElementById("in").value.trim();
            if (input === "") {
                document.getElementById("in").value = "";
                return;
            }
            let li = document.createElement("li");
            let div = document.createElement("div");
            div.classList.add("user-message");
            div.innerHTML = input;
            li.appendChild(div);
            document.getElementById("list").appendChild(li);
            document.getElementById("in").value = "";
            const apiKey = ""; //add API key here
            const modelId = 'gpt-3.5-turbo';

            const apiUrl = 'https://api.openai.com/v1/chat/completions';

            // Données à envoyer à l'API
            const data = {
              model: modelId,
              messages: [
                { role: 'user', content: input },
              ],
            };

            // Configuration de la requête
            const requestOptions = {
              method: 'POST',
              headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${apiKey}`,
              },
              body: JSON.stringify(data),
            };

            // Exécution de la requête
            fetch(apiUrl, requestOptions)
              .then(response => response.json())
              .then(data => {
                // Traiter la réponse de l'API
                const completions = data.choices[0].message.content;
                li = document.createElement("li");
                            div = document.createElement("div");
                            div.classList.add("bot-message");
                            div.innerHTML = completions;
                            li.appendChild(div);
                            document.getElementById("list").appendChild(li);
                            scrollToBottom();
                // Faire quelque chose avec la réponse ici
              })
              .catch(error => {
                // Gérer les erreurs
                console.error('Une erreur s\'est produite:', error);
              });

        }
    </script>
</body>
</html>
<?php
}

add_action('wp_head', 'display_chatbot');

