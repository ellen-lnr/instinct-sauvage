<template>
  <div class="auth-container">
    <h1>Connexion</h1>
    <form @submit.prevent="login">
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Mot de passe" required />
      <button type="submit">🔐 Se connecter</button>
    </form>

    <p class="link">
      Pas encore inscrit ?
      <router-link to="/register">Créer un compte</router-link>
    </p>

    <!-- 🧠 Erreurs spécifiques retournées par Laravel -->
    <ul v-if="Object.keys(errors).length" class="error-list">
      <li v-for="(messages, field) in errors" :key="field">
        {{ messages[0] }}
      </li>
    </ul>

    <!-- ❌ Erreur générale -->
    <p v-if="error" class="error">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'

const router = useRouter()
const email = ref('')
const password = ref('')
const error = ref('')
const errors = ref({}) // ➕ pour messages détaillés de validation

const login = async () => {
  error.value = ''
  errors.value = {}

  try {
    await axios.get('/sanctum/csrf-cookie')

    await axios.post('/api/login', {
      email: email.value,
      password: password.value
    })

    router.push('/')
  } catch (e) {
    if (e.response?.status === 422 && e.response.data?.errors) {
      errors.value = e.response.data.errors
    } else if (e.response?.status === 401) {
      error.value = 'Email ou mot de passe incorrect.'
    } else {
      error.value = 'Une erreur est survenue. Veuillez réessayer.'
    }
  }
}
</script>

<style scoped>
.auth-container {
  max-width: 400px;
  margin: 5rem auto;
  padding: 2rem;
  background: #1e1e1e;
  border-radius: 12px;
  color: white;
  box-shadow: 0 0 10px rgba(255, 255, 255, 0.05);
}
input {
  display: block;
  width: 100%;
  margin: 1rem 0;
  padding: 0.6rem;
  border: none;
  border-radius: 8px;
}
button {
  background: #3b82f6;
  color: white;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 8px;
  font-weight: bold;
  width: 100%;
  cursor: pointer;
}
.link {
  margin-top: 1rem;
  font-size: 0.9rem;
}
.error {
  margin-top: 1rem;
  color: #ff5252;
}
.error-list {
  color: #ff5252;
  margin-top: 1rem;
  font-size: 0.9rem;
  list-style: disc inside;
}
</style>
