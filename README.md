<h1 align="center">🐾 Smart Veterinary AI System</h1>

<p align="center">
  An AI-powered veterinary management platform — appointments, AI chat, animal marketplace, and social feed.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=flat-square&logo=laravel"/>
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=flat-square&logo=php"/>
  <img src="https://img.shields.io/badge/AI-Groq%20%7C%20LLaMA%203.1-green?style=flat-square"/>
  <img src="https://img.shields.io/badge/DB-SQLite-orange?style=flat-square"/>
</p>

---

## ✅ Requirements

Make sure you have these installed:

- [PHP 8.2+](https://www.php.net/downloads)
- [Composer](https://getcomposer.org)
- [Node.js 18+ & npm](https://nodejs.org)

---

## ▶️ How to Run

**Step 1 — Clone & enter the project**
```bash
git clone https://github.com/Laiba-049/Smart-Veterinary-system-AI-based.git
cd Smart-Veterinary-system-AI-based
cd Smart-Veterinary-system-Ai-base
```

**Step 2 — Install dependencies**
```bash
composer update
npm install
```

**Step 3 — Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

**Step 4 — Setup database**
```bash
php -r "touch('database/database.sqlite');"
php artisan migrate
php artisan storage:link
```

**Step 5 — Start the app**

Open **two terminals** and run:

| Terminal 1 | Terminal 2 |
|---|---|
| `php artisan serve` | `npm run dev` |

Open **http://localhost:8000** 🚀

---

## 👥 Accounts

| Role | URL |
|---|---|
| User | http://localhost:8000/signup |
| Doctor | http://localhost:8000/doctor/register |

---

## ❓ Something not working?

| Problem | Fix |
|---|---|
| `composer install` fails | Use `composer update` instead |
| Migrate fails | Make sure `database/database.sqlite` file exists |
| AI chat not working | Check `GROQ_API_KEY` in `.env` |
| Blank page | Make sure **both** terminals are running |