import AppLayout from '@/layouts/AppLayout.vue'
import AuthLayout from '@/layouts/AuthLayout.vue'
import useAuthStore from '@/stores/auth'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      component: AppLayout,
      meta: {
        requiresAuth: true,
      },
      children: [
        {
          path: '',
          name: 'home',
          component: () => import('@/views/HomeView.vue'),
          meta: {
            title: 'Home',
          },
        },
      ],
    },
    {
      path: '/auth',
      component: AuthLayout,
      meta: {
        guestOnly: true,
      },
      children: [
        {
          path: 'login',
          name: 'auth.login',
          component: () => import('@/views/auth/LoginView.vue'),
          meta: {
            title: 'Login',
          },
        },
        {
          path: 'register',
          name: 'auth.register',
          component: () => import('@/views/auth/RegisterView.vue'),
          meta: {
            title: 'Register',
          },
        },
      ],
    },
  ],
})

router.beforeEach(async (to, _from, next) => {
  const authStore = useAuthStore()

  document.title = `${to.meta.title} | ${import.meta.env.VITE_APP_NAME}`

  if (to.meta.requiresAuth && !authStore.isAuthenticated) {
    return next({ name: 'auth.login' })
  }

  if (to.meta.guestOnly && authStore.isAuthenticated) {
    return next({ name: 'home' })
  }

  next()
})

export default router
