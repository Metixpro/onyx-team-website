import HomeOnyx from '@/components/HomeOnyx.vue'
import { createRouter, createWebHistory } from 'vue-router'

const routes =  [
    {
      path: '/',
      name: 'Home',
      component: HomeOnyx,
    },
    {
      path: '/team/:slug',
      name: 'TeamMember',
      component: () => import('@/components/TeamMember.vue'),
      props: true,
    },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes
})

export default router
