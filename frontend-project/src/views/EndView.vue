<template>
  <div v-if="end" 
       class="chapter-container"
       :style="{ backgroundImage: `url(/images/ends/${end.type}.jpg)` }"
  >
    <div class="chapter-overlay">
      <h1>Fin : {{ end.type }}</h1>
      <p>{{ end.description }}</p>

      <!-- Recommencer l’histoire actuelle -->
      <router-link :to="`/story/${storyId}/chapter/1`">
        <button>🔁 Recommencer l’aventure</button>
      </router-link>

      <!-- Retour à la liste des histoires -->
      <router-link to="/">
        <button>📚 Choisir une autre histoire</button>
      </router-link>
    </div>
  </div>

  <div v-else class="chapter-container">
    <div class="chapter-overlay">
      <p>Chargement en cours...</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'

const route = useRoute()
const storyId = route.params.storyId
const endId = route.params.id
const end = ref(null)

const fetchEnd = async () => {
  try {
    const response = await fetch(`http://localhost:8000/api/v1/stories/${storyId}/ends/${endId}`)
    if (!response.ok) throw new Error('Erreur lors du chargement de la fin')
    const data = await response.json()
    end.value = data.end
  } catch (e) {
    console.error('Erreur fetch fin :', e)
  }
}

onMounted(fetchEnd)
</script>
