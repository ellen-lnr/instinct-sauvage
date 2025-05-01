import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ChapterView from '../views/ChapterView.vue'
import EndView from '../views/EndView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'

// Ajoute ces routes :


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
  },
  { 
    path: '/login', 
    name: 'Login', 
    component: LoginView },
    {
     path: '/register', 
     name: 'Register', 
     component: RegisterView 
    }

]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
