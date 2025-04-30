import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ChapterView from '../views/ChapterView.vue'
import EndView from '../views/EndView.vue'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView
  },
  {
    path: '/story/:storyId/chapter/:chapterId',
    name: 'Chapter',
    component: ChapterView
  },
  {
    path: '/story/:storyId/end/:id',
    name: 'End',
    component: EndView
  }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
