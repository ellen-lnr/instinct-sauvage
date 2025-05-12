<template>
  <div class="home-container">
    <h1>Choisis ton aventure 🐾</h1>

    <div class="story-grid">
      <div v-for="story in stories" :key="story.id" class="story-card">
        <h2>{{ story.title }}</h2>
        <p>{{ story.description }}</p>
        <router-link to="/chapter/1">
          <button class="start-button">🚀 Commencer</button>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from '@/axios'

const stories = ref([])

onMounted(async () => {
  try {
  await axios.get('/api/user')
  } catch (e) {
    if (e.response?.status !== 401) {
      console.error('Erreur inattendue :', e)
    }
    // sinon → on ignore le 401 silencieusement
  }


  try {
    const { data } = await axios.get('/api/v1/stories')
    stories.value = data.stories
  } catch (e) {
    console.error('Erreur de chargement des histoires :', e)
  }
})
</script>

<style scoped>
body {
  background-color: #0f0f0f;
}

.home-container {
  max-width: 900px;
  margin: 2rem auto;
  padding: 1rem;
  text-align: center;
  color: #f1f1f1;
}

.story-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 1.5rem;
  margin-top: 2rem;
}

.story-card {
  background: #1e1e1e;
  border-radius: 12px;
  padding: 1.5rem;
  box-shadow: 0 4px 12px rgba(255, 255, 255, 0.05);
  transition: transform 0.2s ease;
  color: #f1f1f1;
}

.story-card:hover {
  transform: translateY(-5px);
}

.start-button {
  background: #3b82f6;
  color: white;
  border: none;
  padding: 0.6rem 1.2rem;
  border-radius: 8px;
  font-weight: bold;
  margin-top: 1rem;
  cursor: pointer;
  transition: background 0.2s ease;
  width: 100%;
}

.start-button:hover {
  background: #2563eb;
}
</style>
