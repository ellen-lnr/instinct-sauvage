import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import ChapterView from '../views/ChapterView.vue'
import EndView from '../views/EndView.vue'
import LoginView from '../views/LoginView.vue'
import RegisterView from '../views/RegisterView.vue'
import axios from '@/axios' // assure-toi que ce chemin est bon

const routes = [
  {
    path: '/',
    redirect: '/login'
  },
  {
    path: '/home',
    name: 'Home',
    component: HomeView
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
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView
  },
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

// 🔐 Navigation Guard
router.beforeEach(async (to, from, next) => {
  const publicPattern = /^\/(login|register|chapter\/\d+|end\/\d+)$/;
  	const isPublic = publicPattern.test(to.path);

  try {
    await axios.get('/api/user') // connecté
    next()
  } catch {
    if (!isPublic) {
      return next('/login')
    }
    next()
  }  
})

export default router
