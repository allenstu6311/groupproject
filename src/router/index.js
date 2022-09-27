import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AboutUs from '../views/AboutUs.vue'
import TherapistView from '../views/TherapistView.vue'
import EmployeeView from '../views/EmployeeView.vue'
import Reservation from "../views/Reservation.vue"
import Messagefaq from "../views/Messagefaq.vue"
import Area from "../views/Area.vue"
import ShoppingCar from "@/components/ShoppingCar.vue"
import MemLogin from "../views/MemLogin.vue"

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import(/* webpackChunkName: "about" */ '../views/AboutUs.vue')
    component: AboutUs

  },
  {
    path: '/therapist',
    name: 'therapist',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import(/* webpackChunkName: "about" */ '../views/TherapistView.vue')
    component: TherapistView
  },
  {
    path: '/employee',
    name: 'employee',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import(/* webpackChunkName: "about" */ '../views/TherapistView.vue')
    component: EmployeeView
  },
  {
    path: '/reserve',
    name: 'reserve',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Reservation.vue')
  },
  {
    path: '/message',
    name: 'message',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Messagefaq.vue')
  },
  {
    path: '/area',
    name: 'area',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Area.vue')
  },
  {
    path: '/cart',
    name: 'cart',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Cart.vue')
  },
  {
    path: '/Confirm',
    name: 'Confirm',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Confirm.vue')
  },
  {
    path:'/MemLogin',
    name:'MemLogin',
    component: () => import('../views/MemLogin.vue')
  },
  {
    path:'/MassageSchool',
    name:'MassageSchool',
    component: () => import('../views/MassageSchoolView.vue')
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
