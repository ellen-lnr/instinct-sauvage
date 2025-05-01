import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: 'http://localhost:8000',
  withCredentials: true, // indispensable pour les cookies avec Sanctum
  headers: {
    'Content-Type': 'application/json',
    Accept: 'application/json'
  }
})

// ➕ Intercepteur pour ajouter le token CSRF depuis les cookies
axiosInstance.interceptors.request.use((config) => {
  const token = document.cookie.match(/XSRF-TOKEN=([^;]+)/)
  if (token) {
    config.headers['X-XSRF-TOKEN'] = decodeURIComponent(token[1])
  }
  return config
})

export default axiosInstance
