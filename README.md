# 🐺 Instinct Sauvage

**Instinct Sauvage** est une histoire interactive développée en **Laravel (API)** + **Vue.js 3 (SPA)**.

> Le joueur incarne un jeune loup solitaire et doit faire des choix qui influenceront son destin :  
> devenir Alpha, survivre seul, ou mourir prématurément.

---

## ⚙️ Structure du projet

```
story/
├── backend/   # Laravel 11 - API RESTful versionnée
├── frontend/  # Vue.js 3 - SPA (Vite)
```

---

## 🚀 Fonctionnalités développées

### ✅ Backend (Laravel 11)
- API RESTful versionnée : `/api/v1/...`
- Authentification avec Laravel Sanctum (session via cookie)
- Middleware Sanctum et validation CSRF intégrés
- Migrations, modèles et relations :
  - `Story`, `Chapter`, `Choice`, `End`
- Validation via `FormRequest`
- Gestion propre des réponses JSON : 200, 404, 422, etc.
- Seeder personnalisé : `InstinctSauvageSeeder`
- 👤 Utilisateur **admin** créé automatiquement :
  - Email : `admin@example.com`
  - Mot de passe : `Password123!`

### ✅ Frontend (Vue 3 + Vite)
- Navigation dynamique entre chapitres avec `Vue Router`
- Intégration complète de l'API via `axios`
- Authentification via `login`, `register`, `logout`
- Affichage des erreurs détaillées Laravel (validation, login)
- Option **"Continuer sans se connecter"** disponible (pas de sauvegarde)
- Composants principaux :
  - `ChapterView.vue`
  - `EndView.vue`
  - `RegisterView.vue`, `LoginView.vue`
- Design responsive (mobile & desktop)

---

## 📦 Installation

### 🔧 1. Cloner le projet

```bash
git clone https://github.com/ellen-lnr/instinct-sauvage.git
cd instinct-sauvage
```

---

### 🔧 2. Lancer le backend Laravel

```bash
cd backend
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

---

### 🔧 3. Lancer le frontend Vue

```bash
cd ../frontend
npm install
npm run dev
```

---

## 🔗 Accès local

- 🧠 Frontend : http://localhost:5173
- ⚙️ Backend API : http://localhost:8000/api/v1

---

## 👩‍💻 Réalisé par

**Ellen Lehner**  
HEIG-VD – Ingénierie des médias  
2025 – Semestre de printemps
