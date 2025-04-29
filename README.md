# 🐺 Instinct Sauvage

**Instinct Sauvage** est une histoire interactive développée en **Laravel (API)** + **Vue.js 3 (SPA)**.

> Le joueur incarne un jeune loup solitaire et doit faire des choix qui influenceront son destin :  
> devenir Alpha, survivre en solitaire, ou mourir prématurément.

---

## ⚙️ Structure du projet

```
story/
├── backend/   # Laravel 11 - API RESTful
├── frontend/  # Vue.js 3 - SPA (Vite)
```

---

## 🚀 Fonctionnalités développées

### ✅ Backend (Laravel 11)
- API versionnée `/api/v1/...`
- Migrations, modèles et relations :
  - `Chapter`, `Choice`, `End`
- `FormRequest` pour la validation (`StoreChoiceRequest`)
- Middleware prêt pour l'authentification (+2 pts bonus)
- Réponses JSON claires (200, 404, 422...)
- Seeder personnalisé : `InstinctSauvageSeeder`

### ✅ Frontend (Vue 3)
- Navigation dynamique entre chapitres avec `Vue Router`
- Requêtes `fetch()` vers l’API
- Redirection vers une `EndView` en cas de fin atteinte
- Composants :
  - `ChapterView.vue`
  - `EndView.vue`
- Design responsive (à styliser plus tard)

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

## 🔗 Accès

- 🧠 Vue frontend : `http://localhost:5173/chapter/1`
- ⚙️ API backend : `http://localhost:8000/api/v1/...`

---

## 🧪 Test rapide

- Démarre à `/chapter/1`
- Choisis ton chemin 🐾
- Termine en devenant Alpha, solitaire ou mort

---

## ✨ À venir

- Ajout d’un système de sauvegarde
- Authentification avec Laravel Sanctum
- Design visuel immersif (avec animations ?)

---

## 👩‍💻 Réalisé par

**Ellen Lehner**  
HEIG-VD – Ingénierie des médias  
2025 – Semestre de printemps
