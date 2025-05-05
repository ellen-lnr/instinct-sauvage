<template>
  <div class="auth-container">
    <h1>Créer un compte</h1>
    <form @submit.prevent="register">
      <input v-model="name" type="text" placeholder="Nom" required />
      <input v-model="email" type="email" placeholder="Email" required />

      <p class="password-rules">
        Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial.
      </p>

      <input v-model="password" type="password" placeholder="Mot de passe" required />
      <input v-model="passwordConfirmation" type="password" placeholder="Confirme ton mot de passe" required />

      <button type="submit">📝 S’inscrire</button>
    </form>

    <p class="link">
      Déjà un compte ?
      <router-link to="/login">Se connecter</router-link>
    </p>

    <!-- Affichage détaillé des erreurs -->
    <ul v-if="Object.keys(errors).length" class="error-list">
      <li v-for="(messages, field) in errors" :key="field">
        {{ messages[0] }}
      </li>
    </ul>

    <!-- Message d'erreur général -->
    <p v-if="error" class="error">{{ error }}</p>
  </div>
</template>
  
<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import axios from '@/axios'

const name = ref('')
const email = ref('')
const password = ref('')
const passwordConfirmation = ref('')
const error = ref('')
const errors = ref({}) // 👈 stocke les erreurs détaillées
const router = useRouter()

const register = async () => {
  error.value = ''
  errors.value = {} // 🔄 reset les erreurs à chaque tentative

  try {
    await axios.get('/sanctum/csrf-cookie') // ⚠️ Obligatoire avec Sanctum

    await axios.post('/api/register', {
      name: name.value,
      email: email.value,
      password: password.value,
      password_confirmation: passwordConfirmation.value
    })

    router.push('/')
  } catch (e) {
    if (e.response?.status === 422 && e.response.data?.errors) {
      errors.value = e.response.data.errors // 🧠 erreurs Laravel
    } else {
      error.value = e.response?.data?.message || 'Une erreur est survenue.'
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
  .password-rules {
  font-size: 0.85rem;
  color: #ccc;
  margin-bottom: 1rem;
}
  </style>
  