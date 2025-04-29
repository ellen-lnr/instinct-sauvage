import { createRouter, createWebHistory } from 'vue-router'
import ChapterView from '../views/ChapterView.vue'
import EndView from '../views/EndView.vue'

const routes = [
  {
    path: '/',
    redirect: '/chapter/1' // Commencer par le chapitre 1
  },
  {
    path: '/chapter/:id',
    name: 'Chapter',
    component: ChapterView
  },
  {
    path: '/end/:id',
    name: 'End',
    component: EndView
  }
  
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
