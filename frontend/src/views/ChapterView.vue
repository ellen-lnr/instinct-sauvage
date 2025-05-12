<template>
  <div
    v-if="chapter"
    class="chapter-container"
    :style="{ backgroundImage: `url(/images/${chapter.id}.jpg)` }"
  >
    <div class="chapter-overlay">
      <h1>Instinct Sauvage 🐺</h1>

      <!-- ✅ Affichage de la progression -->
      <div v-if="progress !== null" class="progress-wrapper">
        <p>Progression : {{ progress }}%</p>
        <div class="progress-bar">
          <div class="progress-fill" :style="{ width: `${progress}%` }"></div>
        </div>
      </div>

      <p>{{ chapter.content }}</p>

      <h2>Choix :</h2>
      <ul>
        <li v-for="choice in chapter.choices" :key="choice.id">
          <button @click="goToNextStep(choice)">
            {{ choice.text }}
          </button>
        </li>
      </ul>
    </div>
  </div>

  <div v-else>
    <p>Chargement du chapitre...</p>
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from '@/axios'

const route = useRoute()
const router = useRouter()
const chapter = ref(null)
const progress = ref(null)

const fetchChapter = async () => {
  try {
    // 📥 Charger le contenu du chapitre
    const response = await axios.get(`/api/v1/chapters/${route.params.id}`)
    chapter.value = response.data.chapter

    // ✅ Enregistrer le chapitre comme visité (si connecté)
    await axios.post(`/api/v1/chapters/${route.params.id}/visit`).catch(() => {})

    // ✅ Récupérer la progression
    const res = await axios.get('/api/v1/progress')
    progress.value = res.data.progress
  } catch (error) {
    console.error('Erreur de fetch:', error)
  }
}

const goToNextStep = (choice) => {
  if (choice.next_chapter_id) {
    router.push({ name: 'Chapter', params: { id: choice.next_chapter_id } })
  } else if (choice.end_id) {
    router.push({ name: 'End', params: { id: choice.end_id } })
  } else {
    alert("Fin de l’histoire ou chapitre manquant.")
  }
}

onMounted(fetchChapter)
watch(() => route.params.id, fetchChapter)
</script>

<style scoped>
.progress {
  margin-bottom: 1rem;
  font-weight: bold;
  font-size: 1rem;
  color: #facc15; /* jaune doux */
}
.progress-wrapper {
  margin-bottom: 1.5rem;
  text-align: left;
  color: #fcd34d;
}
.progress-bar {
  width: 100%;
  height: 10px;
  background: #333;
  border-radius: 6px;
  overflow: hidden;
  margin-top: 0.3rem;
}
.progress-fill {
  height: 100%;
  background: #facc15;
  transition: width 0.3s ease;
}
</style>
