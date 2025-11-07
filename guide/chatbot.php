<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AgroGuide - Crop Assistant</title>
    <link rel="stylesheet" href="css/chatbot.css">
</head>
<body>
    <style>

    .message-bubble {
        padding: 12px 16px;
        border-radius: 15px;
        font-size: 14px;
        line-height: 1.4;
    }

    .chat-message.bot .message-bubble {
        background: #f1f1f1;
        color: #333;
        border-top-left-radius: 5px;
    }

    .chat-message.user .message-bubble {
        background: #56ab2f;
        color: white;
        border-top-right-radius: 5px;
    }

    .message-time {
        font-size: 10px;
        color: #999;
        margin-top: 4px;
        text-align: right;
    }

    /* Typing Indicator */
    .typing-indicator {
        display: none;
        padding: 10px 20px;
        justify-content: center;
        gap: 5px;
    }

    .typing-indicator.active {
        display: flex;
    }

    .typing-dot {
        width: 8px;
        height: 8px;
        background-color: #ccc;
        border-radius: 50%;
        animation: typingAnimation 1.4s infinite ease-in-out;
    }

    .typing-dot:nth-child(1) { animation-delay: 0s; }
    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }

    @keyframes typingAnimation {
        0%, 60%, 100% { transform: translateY(0); }
        30% { transform: translateY(-5px); }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .chatbot-modal {
            width: calc(100vw - 40px);
            height: calc(100vh - 140px);
            right: 20px;
            bottom: 100px;
        }

        .chatbot-float-btn {
            bottom: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
            font-size: 28px;
        }
    }
</style>

<!-- Chatbot Floating Button -->
<button class="chatbot-float-btn" id="chatbotFloatBtn" onclick="toggleChatbot()">
    💬
</button>

<!-- Chatbot Modal -->
<div class="chatbot-modal" id="chatbotModal">
    <div class="chatbot-header">
        <div class="chatbot-header-title">
            <span>🌾</span>
            <div>
                <h3>Crop Assistant</h3>
                <div class="chatbot-header-status">● Online</div>
            </div>
        </div>
        <button class="chatbot-close-btn" onclick="toggleChatbot()">&times;</button>
    </div>
    
    <div class="chatbot-messages-container" id="chatbotMessages">
        <div class="chat-message bot">
            <div class="message-bubble">
                Hello!  I'm your Smart Crop Assistant. How can I help you today?
            </div>
            <div class="message-time"><?php echo date('h:i A'); ?></div>
        </div>
        
        <div class="quick-replies">
            <button class="quick-reply-btn" onclick="sendQuickReply('Tell me about soil types')">Soil Types</button>
            <button class="quick-reply-btn" onclick="sendQuickReply('Best crops for my region')">Best Crops</button>
            <button class="quick-reply-btn" onclick="sendQuickReply('Pest control advice')">Pest Control</button>
        </div>
    </div>

    <div class="typing-indicator" id="typingIndicator">
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
        <div class="typing-dot"></div>
    </div>
    
    <div class="chatbot-input-area">
        <input type="text" class="chatbot-input" id="chatbotInput" placeholder="Type your message..." onkeypress="handleChatbotEnter(event)">
        <button class="chatbot-send-btn" id="chatbotSendBtn" onclick="sendChatMessage()">
            ➤
        </button>
    </div>
</div>

<script>
function toggleChatbot() {
    const modal = document.getElementById('chatbotModal');
    const btn = document.getElementById('chatbotFloatBtn');
    
    modal.classList.toggle('active');
    btn.classList.toggle('active');
    
    if (modal.classList.contains('active')) {
        document.getElementById('chatbotInput').focus();
        btn.textContent = '✕';
    } else {
        btn.textContent = '💬';
    }
}

function handleChatbotEnter(event) {
    if (event.key === 'Enter') {
        sendChatMessage();
    }
}

function sendQuickReply(message) {
    document.getElementById('chatbotInput').value = message;
    sendChatMessage();
}

function sendChatMessage() {
    const input = document.getElementById('chatbotInput');
    const message = input.value.trim();
    
    if (message === '') return;
    
    // Disable send button
    const sendBtn = document.getElementById('chatbotSendBtn');
    sendBtn.disabled = true;
    
    // Add user message
    addChatMessage(message, 'user');
    input.value = '';
    
    // Show typing indicator
    showTypingIndicator();
    
    // Simulate bot response (Future: Replace with AI API)
    setTimeout(() => {
        hideTypingIndicator();
        const botResponse = getChatbotResponse(message);
        addChatMessage(botResponse, 'bot');
        sendBtn.disabled = false;
    }, 1500);
}

function addChatMessage(text, sender) {
    const messagesContainer = document.getElementById('chatbotMessages');
    const messageDiv = document.createElement('div');
    messageDiv.className = `chat-message ${sender}`;
    
    const now = new Date();
    const time = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
    
    messageDiv.innerHTML = `
        <div class="message-bubble">${text}</div>
        <div class="message-time">${time}</div>
    `;
    
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function showTypingIndicator() {
    document.getElementById('typingIndicator').classList.add('active');
}

function hideTypingIndicator() {
    document.getElementById('typingIndicator').classList.remove('active');
}

function getChatbotResponse(userMessage) {
    // Future: Replace with AI API integration
    const message = userMessage.toLowerCase();
    
    if (message.includes('soil') || message.includes('type')) {
        return "We support 6 major soil types: Clay, Sandy, Loamy, Red, Black, and Alluvial. Each soil type has specific crop recommendations. Which soil type would you like to know more about?";
    } else if (message.includes('crop') || message.includes('grow') || message.includes('plant')) {
        return "I can help you find the best crops for your soil type! Please tell me your soil type, or visit our Soil Types page to identify your soil first.";
    } else if (message.includes('pest') || message.includes('disease') || message.includes('insect')) {
        return "For pest control, I recommend integrated pest management (IPM) approaches. Can you describe the pest problem you're facing? What crop are you growing?";
    } else if (message.includes('water') || message.includes('irrigat')) {
        return "Proper irrigation is crucial for crop health. The frequency depends on your crop type, soil, and weather. Which crop are you growing?";
    } else if (message.includes('fertilizer') || message.includes('nutrient')) {
        return "Fertilizer requirements vary by crop and soil type. I recommend starting with a soil test. Which crop are you planning to grow?";
    } else if (message.includes('hello') || message.includes('hi') || message.includes('hey')) {
        return "Hello! How can I assist you with your farming queries today? Feel free to ask about soil types, crops, or cultivation procedures.";
    } else if (message.includes('help')) {
        return "I can help you with:<br>• Soil type identification<br>• Crop recommendations<br>• Cultivation procedures<br>• Irrigation guidance<br>• Pest management<br>• Fertilizer advice<br><br>What would you like to know?";
    } else if (message.includes('thank')) {
        return "You're welcome! 😊 Feel free to ask if you have more questions. Happy farming!";
    } else {
        return "Thank you for your question! Our AI is being trained to provide more comprehensive answers. For detailed information, please explore our Soil Types and Features pages, or contact our support team.";
    }
}
</script>
</body>
</html>
