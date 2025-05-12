<template>
  <div v-if="end" 
       class="chapter-container"
       :style="{ backgroundImage: `url(/images/ends/${end.type}.jpg)` }"
  >
    <div class="chapter-overlay">
      <h1>Fin : {{ end.type }}</h1>
      <p>{{ end.description }}</p>

      <!-- Recommencer depuis le début -->
      <router-link to="/chapter/1">
        <button>🔁 Recommencer l’aventure</button>
      </router-link>

      <!-- Retour à la liste des histoires -->
      <router-link to="/home">
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
import axios from '@/axios'

const route = useRoute()
const end = ref(null)

const fetchEnd = async () => {
  try {
    const response = await axios.get(`/api/v1/ends/${route.params.id}`)
    end.value = response.data.end
  } catch (e) {
    console.error('Erreur fetch fin :', e)
  }
}

onMounted(fetchEnd)
</script>
