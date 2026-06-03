<h1 align="center">🐾 Smart Veterinary AI System</h1>

<p align="center">
  A full-stack AI-powered veterinary management platform built with Laravel 12.
  <br/>
  Book appointments, chat with an AI vet assistant, buy/sell animals, and manage a social community — all in one place.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=flat-square&logo=laravel" alt="Laravel 12"/>
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php" alt="PHP 8.2"/>
  <img src="https://img.shields.io/badge/AI-Groq%20%7C%20LLaMA%203.1-green?style=flat-square" alt="AI"/>
  <img src="https://img.shields.io/badge/DB-MySQL-orange?style=flat-square&logo=mysql" alt="MySQL"/>
</p>

---

## ✨ Features

| Module | Description |
|---|---|
| 🤖 **AI Vet Chat** | Chat with an AI assistant powered by Groq (LLaMA 3.1-8b) for veterinary advice |
| 👨‍⚕️ **Doctor Portal** | Doctors register, manage profiles, approve/reject appointments, and send prescriptions |
| 📅 **Appointments** | Users book appointments with doctors; receive PDF prescriptions |
| 🐕 **Animal Marketplace** | Sellers list animals for sale; buyers browse, cart, and checkout |
| 📰 **Social Feed** | Users create posts, like, and comment in a pet community feed |
| 🔔 **Notifications** | Real-time appointment status updates via database notifications |

---

## 🛠️ Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Blade templates, Bootstrap 5, Vite
- **Database:** MySQL
- **AI:** [Groq API](https://console.groq.com) (LLaMA 3.1-8b-instant)
- **PDF:** barryvdh/laravel-dompdf
- **Auth:** Multi-guard (Users + Doctors)

---

## ⚙️ Requirements

Before you begin, make sure you have:

- **PHP** >= 8.2 ([download](https://www.php.net/downloads))
- **Composer** ([download](https://getcomposer.org))
- **Node.js** >= 18 + npm ([download](https://nodejs.org))
- **MySQL** >= 8.0 (or XAMPP / WAMP / Laragon)
- A **Groq API key** — free at [console.groq.com](https://console.groq.com/keys)

---

## 🚀 Setup & Run

### 1. Clone the repository

```bash
git clone https://github.com/Laiba-049/Smart-Veterinary-AI.git
cd Smart-Veterinary-AI
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Install Node dependencies

```bash
npm install
```

### 4. Set up environment file

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Configure your `.env`

Open `.env` and fill in the following:

```env
# Database
DB_DATABASE=vtsystem
DB_USERNAME=root
DB_PASSWORD=your_mysql_password

# Groq AI (Required for chat feature)
GROQ_API_KEY=your_groq_api_key_here

# OpenAI (Optional)
OPENAI_API_KEY=your_openai_api_key_here
```

> 🔑 Get a free Groq API key at [https://console.groq.com/keys](https://console.groq.com/keys)

### 6. Create the database

In MySQL, create a database named `vtsystem`:

```sql
CREATE DATABASE vtsystem;
```

Or via the command line:

```bash
mysql -u root -p -e "CREATE DATABASE vtsystem;"
```

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Create storage symlink

```bash
php artisan storage:link
```

### 9. Run the development server

```bash
# Option A — Run all services at once (recommended)
composer run dev

# Option B — Run manually in separate terminals
php artisan serve       # Terminal 1 → http://localhost:8000
npm run dev             # Terminal 2 → Vite hot reload
```

Open [http://localhost:8000](http://localhost:8000) in your browser.

---

## 👥 User Roles

| Role | Access | Registration |
|---|---|---|
| **User** | Home, chat, appointments, social feed, marketplace | `/signup` |
| **Doctor** | Doctor dashboard, appointment management | `/doctor/register` |
| **Seller** | Animal listing, order management | Set `role = seller` in DB |

---

## 📁 Project Structure

```
├── app/
│   ├── Http/Controllers/       # All controllers (Chat, Animal, Doctor, etc.)
│   ├── Models/                 # Eloquent models
│   ├── Notifications/          # Appointment notifications
│   └── Policies/               # Post authorization
├── config/
│   └── openai.php              # OpenAI config (reads from .env)
├── database/migrations/        # All DB migrations
├── public/assets/              # CSS, JS, images
├── resources/views/            # Blade templates
├── routes/web.php              # All application routes
└── .env.example                # Environment variable template
```

---

## 🔐 Security Notes

- **Never commit your `.env` file** — it is listed in `.gitignore`
- All API keys must be stored in `.env` only
- The `.env.example` file contains placeholder keys for reference — **do not add real keys to it**

---

## 📄 License

This project was created as a Final Year Project. All rights reserved.