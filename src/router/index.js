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
import ProductList from "../views/ProductList.vue"
import Detail from "../views/Detail.vue"
import MemCenter from "../views/MemCenterView.vue"
import MemRegister from "../views/MemRegisterView.vue"
import MassageSchoolView from '../views/MassageSchoolView.vue'
import MassageGameView from '../views/MassageGameView.vue'
import GetCouponView from '../views/GetCouponView.vue'
import BackstageView from '../views/BackstageView.vue'
import BackstageIndexView from '../views/BackstageIndexView.vue'
import ManageLoginView from '../views/ManageLoginView.vue'
import BackShop from '../views/BackShop.vue'
import OrderItem from '../views/OrderItem.vue'
import BackTherapistView from '../views/BackTherapistView.vue'
import BackCouponView from '../views/BackCouponView.vue'




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
    path: '/backTherapist',
    name: 'backTherapist',
    chName: '按摩師管理',
    component: BackTherapistView
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
    component: ReservationView
  },
  {
    path: '/resvPage',
    name: 'resvPage',
    component: ResvPageView
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
    path: '/BackShop',
    name: 'BackShop',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/BackShop.vue')
  },
  {
    path: '/OrderItem',
    name: 'OrderItem',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/OrderItem.vue')
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
    path: '/MemRegister',
    name: 'MemRegister',
    component: () => import('../views/MemRegisterView.vue')
  },
  {
    path: '/MassageSchool',
    name: 'MassageSchool',
    component: MassageSchoolView
  },
  {
    path: '/MassageGame',
    name: 'MassageGame',
    component: MassageGameView
  },
  {
    path: '/GetCoupon',
    name: 'GetCoupon',
    component: GetCouponView
  },
  {
    path: '/ProductList',
    name: 'ProductList',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/ProductList.vue')
  },
  {
    path: '/Detail',
    name: 'Detail',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Detail.vue')
  },
  {
    path: '/backstage',
    name: 'backstage',
    component: BackstageView
  },
  {
    path: '/backstageIndex',
    name: 'backstageIndex',
    chName: '首頁',
    component: BackstageIndexView,
  },


  {
    path: '/manageLogin',
    name: 'manageLogin',
    component: ManageLoginView
  },
  {
    path: '/BackCoupon',
    name: 'BackCoupon',
    component: BackCouponView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
