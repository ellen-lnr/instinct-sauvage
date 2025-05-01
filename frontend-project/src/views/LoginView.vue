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

    <p v-if="error" class="error">{{ error }}</p>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'

const router = useRouter()
const email = ref('')
const password = ref('')
const error = ref('')

const login = async () => {
  try {
    // 1. Obligatoire avec Sanctum pour activer la session
    await fetch('http://localhost:8000/sanctum/csrf-cookie', {
      credentials: 'include'
    })

    // 2. Login API Breeze
    const response = await fetch('http://localhost:8000/api/v1/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      credentials: 'include',
      body: JSON.stringify({
        email: email.value,
        password: password.value
      })
    })

    if (!response.ok) throw new Error('Email ou mot de passe invalide')

    error.value = ''
    router.push('/')
  } catch (e) {
    console.error(e)
    error.value = e.message
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
</style>
