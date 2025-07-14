import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: {
        title: 'Il Manuale dei Trollpick',
      },
    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue'),
    },
    {
      path: '/champions',
      name: 'champions',
      component: () => import('../views/champion/ChampionsView.vue'),
      meta: {
        title: 'Campioni',
      },
    },
    {
      path: '/champion/:name',
      name: 'champion',
      component: () => import('../views/champion/ChampionDetailView.vue'),
      props: true,
      meta: {
        title: (route) => {
          const championName =
            route.params.name?.charAt(0).toUpperCase() + route.params.name?.slice(1)
          return `${championName}`
        },
      },
    },
  ],
})

router.beforeEach((to, from, next) => {
  let title = 'Il Manuale dei Trollpick'

  if (typeof to.meta.title === 'function') {
    title = to.meta.title(to)
  } else if (to.meta.title) {
    title = to.meta.title
  }

  document.title = title
  next()
})

export default router
