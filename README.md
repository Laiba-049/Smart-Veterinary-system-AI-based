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
  <img src="https://img.shields.io/badge/DB-SQLite%20%7C%20MySQL-orange?style=flat-square" alt="DB"/>
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
- **Database:** SQLite (default) or MySQL
- **AI:** [Groq API](https://console.groq.com) — LLaMA 3.1-8b-instant
- **PDF:** barryvdh/laravel-dompdf
- **Auth:** Multi-guard (Users + Doctors)

---

## ⚙️ Requirements

Install these before you start:

| Tool | Version | Download |
|---|---|---|
| PHP | >= 8.2 | [php.net/downloads](https://www.php.net/downloads) |
| Composer | Latest | [getcomposer.org](https://getcomposer.org) |
| Node.js + npm | >= 18 | [nodejs.org](https://nodejs.org) |

> ✅ No MySQL or XAMPP needed — this project uses **SQLite by default** (zero setup database).

---

## 🚀 Setup & Run (Step by Step)

### 1. Clone the repository

```bash
git clone https://github.com/Laiba-049/Smart-Veterinary-AI.git
cd Smart-Veterinary-AI
```

### 2. Install PHP dependencies

> ⚠️ Use `composer update` (not install) — this ensures packages match your PHP version.

```bash
composer update
```

### 3. Install Node dependencies

```bash
npm install
```

### 4. Set up your environment file

```bash
cp .env.example .env
php artisan key:generate
```

### 5. Add your API keys to `.env`

Open the `.env` file and fill in:

```env
GROQ_API_KEY=your_groq_api_key_here
OPENAI_API_KEY=your_openai_api_key_here
HUGGINGFACE_API_KEY=your_huggingface_token_here
```

> 🔑 Get a **free** Groq API key at [console.groq.com/keys](https://console.groq.com/keys)

### 6. Create the SQLite database file

```bash
php -r "touch('database/database.sqlite');"
```

### 7. Run migrations

```bash
php artisan migrate
```

### 8. Create storage symlink

```bash
php artisan storage:link
```

### 9. Start the development server

Open **two terminals** and run one command in each:

```bash
# Terminal 1
php artisan serve
```

```bash
# Terminal 2
npm run dev
```

### 10. Open in browser

```
http://localhost:8000
```

---

## 👥 User Roles

| Role | Registration URL | Access |
|---|---|---|
| **User** | `/signup` | Home, AI chat, appointments, social feed, marketplace |
| **Doctor** | `/doctor/register` | Doctor dashboard, appointment management, prescriptions |
| **Seller** | Set `role = seller` in DB | Animal listing, order management |

---

## 🗄️ Using MySQL instead of SQLite (Optional)

If you have XAMPP, WAMP, or Laragon installed, you can use MySQL instead:

1. Create a database named `vtsystem` in phpMyAdmin
2. Update your `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=vtsystem
DB_USERNAME=root
DB_PASSWORD=
```

3. Run migrations: `php artisan migrate`

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
├── database/
│   ├── migrations/             # All DB migrations
│   └── database.sqlite         # SQLite database file (auto-created)
├── public/assets/              # CSS, JS, images
├── resources/views/            # Blade templates
├── routes/web.php              # All application routes
└── .env.example                # Environment variable template
```

---

## ❓ Common Issues

| Problem | Fix |
|---|---|
| `composer install` fails with PHP version error | Use `composer update` instead |
| `php artisan migrate` fails | Make sure `database/database.sqlite` file exists |
| AI chat not responding | Check `GROQ_API_KEY` is set correctly in `.env` |
| Page not loading | Make sure both `php artisan serve` AND `npm run dev` are running |
| `npm run dev` error | Run `npm install` first |

---

## 🔐 Security Notes

- **Never commit your `.env` file** — it is listed in `.gitignore` and will not be pushed to GitHub
- All API keys must be stored in `.env` only
- `.env.example` contains empty placeholders only — never put real keys there

---

## 📄 License

This project was created as a Final Year Project. All rights reserved.