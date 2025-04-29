<template>
    <div v-if="end">
      <h1>Fin : {{ end.type }}</h1>
      <p>{{ end.description }}</p>
      <router-link to="/chapter/1">🔁 Recommencer</router-link>
    </div>
    <div v-else>
      <p>Chargement de la fin...</p>
    </div>
  </template>
  
  <script setup>
  import { ref, onMounted } from 'vue'
  import { useRoute } from 'vue-router'
  
  const route = useRoute()
  const end = ref(null)
  
  const fetchEnd = async () => {
    try {
      const response = await fetch(`http://localhost:8000/api/v1/ends/${route.params.id}`)
      if (!response.ok) throw new Error('Erreur de chargement de la fin')
      const data = await response.json()
      end.value = data.end
    } catch (e) {
      console.error('Erreur fetch fin :', e)
    }
  }
  
  onMounted(() => {
    fetchEnd()
  })
  </script>
  