<template>
    <div v-if="chapter">
      <h1>Chapitre {{ chapter.id }}</h1>
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
    <div v-else>
      <p>Chargement du chapitre...</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted, watch } from 'vue'
  import { useRoute, useRouter } from 'vue-router'
  
  const route = useRoute()
  const router = useRouter()
  const chapter = ref(null)
  
  const fetchChapter = async () => {
    try {
      const response = await fetch(`http://localhost:8000/api/v1/chapters/${route.params.id}`)
      if (!response.ok) throw new Error('Erreur lors du chargement')
      const data = await response.json()
      chapter.value = data.chapter
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

  
  onMounted(() => {
    fetchChapter()
  })
  
  watch(() => route.params.id, () => {
    fetchChapter()
  })
  </script>
  