import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/edit/:id',
    name: 'Edit',
    component: () => import('../views/Edit.vue')
  },
  {
    path: '/view/:id',
    name: 'ResumeView',
    component: () => import('../views/Print.vue')
  },
  {
    path: '/add',
    name: 'Add',
    component: () => import('../views/Add.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  routes
})

export default router
