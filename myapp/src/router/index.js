import Vue from 'vue'
import Router from 'vue-router'
import Home from '@/components/Home'
import Video from '@/components/Video'
import Page from '@/components/Page'
import VueAwesomeSwiper from 'vue-awesome-swiper'

Vue.use(Router)
Vue.use(VueAwesomeSwiper)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'Home',
      component: Home
    },
      {
          path: '/video/:tid?',
          name: 'Video',
          component: Video
      },
      {
          path: '/page/:lessonId',
          name: 'Page',
          component: Page
      },
  ]
})
