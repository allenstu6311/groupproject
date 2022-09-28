import { createRouter, createWebHistory } from 'vue-router'
import FrontPageView from '../views/FrontPageView.vue'
import HomeView from '../views/HomeView.vue'
import AboutUs from '../views/AboutUs.vue'
import TherapistView from '../views/TherapistView.vue'
import EmployeeView from '../views/EmployeeView.vue'
import ReservationView from '../views/ReservationView.vue'
import ResvPageView from '../views/ResvPageView.vue'
import Messagefaq from "../views/Messagefaq.vue"
import ShoppingCar from "@/components/ShoppingCar.vue"
import MemLogin from "../views/MemLogin.vue"
import MemCenter from "../views/MemCenterView.vue"

const routes = [
  {
    path: '/',
    name: 'frontpage',
    component: FrontPageView
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import('../views/AboutUs.vue')
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
    path: '/reservation',
    name: 'reservation',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/ReservationView.vue')
  },
  {
    path: '/resvPage',
    name: 'resvPage',
    component: () => import('../views/ResvPageView.vue')
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
    path: '/MemLogin',
    name: 'MemLogin',
    component: () => import('../views/MemLogin.vue')
  },
  {
    path: '/MemCenter',
    name: 'MemCenter',
    component: () => import('../views/MemCenterView.vue')
  },
  {
    path: '/MassageSchool',
    name: 'MassageSchool',
    component: () => import('../views/MassageSchoolView.vue')
  },
  {
    path: '/ProductList',
    name: 'ProductList',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/ProductList.vue')
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
