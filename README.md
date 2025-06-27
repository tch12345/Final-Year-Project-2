# 💬 MBTI Personality Prediction from WhatsApp Chat History (Web-Based Project)

## 📘 Overview

This is a **web-based final year project** that predicts a user’s **MBTI personality type** based on their **WhatsApp chat history**. The system analyzes the linguistic patterns and behavioral cues from a user’s exported chat file and maps them to one of the **16 MBTI types**:

🧠 ISTJ | ISFJ | INFJ | INTJ | ISTP | ISFP | INFP | INTP  
💬 ESTP | ESFP | ENFP | ENTP | ESTJ | ESFJ | ENFJ | ENTJ

> **Project Type**: Web-based UI only  
> **Personality Model**: MBTI (Myers-Briggs Type Indicator)  
> **Platform**: Desktop Web

---

## 🌐 How It Works

1. **User uploads** exported WhatsApp chat file (`.txt`)
2. **Frontend processes** and sends the content to the model
3. **System analyzes** text using NLP techniques
4. **Prediction returned**: One of 16 MBTI types + explanation
5. **Results displayed** visually with descriptions

---

## 🔍 Features

- ✅ Upload WhatsApp chat file and view result
- ✅ Automated text cleaning and preprocessing
- ✅ Real-time MBTI type prediction
- ✅ Visual result with personality breakdown

---

## 🧱 Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP, Curl
- **NLP / ML (Backend API optional)**: Python, scikit-learn, spaCy/nltk
- **Model**: MBTI classification model trained on chat/text data
- **Visualization**: Chart.js / custom CSS

---

## 📁 Project Structure

```plaintext
📦 webpage/
├── index.php              # Main web page
├── Css                    # Styling
├── Js                     # JavaScript logic
├── Plugin/                # Icons, logos, etc.
└── README.md              # Project description
