<template>
    <div class="auth-container">
      <h1>Créer un compte</h1>
      <form @submit.prevent="register">
        <input v-model="name" type="text" placeholder="Nom" required />
        <input v-model="email" type="email" placeholder="Email" required />
        <input v-model="password" type="password" placeholder="Mot de passe" required />
        <input v-model="passwordConfirmation" type="password" placeholder="Confirme ton mot de passe" required />
        <button type="submit">📝 S’inscrire</button>
      </form>
  
      <p class="link">
        Déjà un compte ?
        <router-link to="/login">Se connecter</router-link>
      </p>
  
      <p v-if="error" class="error">{{ error }}</p>
    </div>
  </template>
  
  <script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios' // 🔗 on utilise l’instance Axios

const name = ref('')
const email = ref('')
const password = ref('')
const passwordConfirmation = ref('')
const error = ref('')
const router = useRouter()

const register = async () => {
  try {
    await axios.get('/sanctum/csrf-cookie') // ⚠️ Obligatoire avec Sanctum

    await axios.post('/api/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value
    })

    error.value = ''
    router.push('/')
  } catch (e) {
    console.error(e)
    error.value = 'Inscription échouée. Vérifie les champs ou l’email.'
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
  