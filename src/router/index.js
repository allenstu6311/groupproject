import { createRouter, createWebHistory } from 'vue-router'
import FrontPageView from '../views/FrontPageView.vue'
import HomeView from '../views/HomeView.vue'
import AboutUs from '../views/AboutUs.vue'
import TherapistView from '../views/TherapistView.vue'
import EmployeeView from '../views/EmployeeView.vue'
import ReservationView from '../views/ReservationView.vue'
import ResvPageView from '../views/ResvPageView.vue'
import MessagefaqView from "../views/MessagefaqView.vue"
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
import ManageItems from '../views/ManageItems.vue'
import BackTherapistAddView from '../views/BackTherapistAddView.vue'
import BackCouponView from '../views/BackCouponView.vue'
import BackCouponAddView from '../views/BackCouponAddView.vue'




const routes = [
  {
    path: '/',
    name: 'frontpage',
    component: FrontPageView,
    meta:{isHide:false}
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView,
    meta:{isHide:false}
  },
  {
    path: '/about',
    name: 'about',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import('../views/AboutUs.vue')
    component: AboutUs,
    meta:{isHide:false}

  },
  {
    path: '/therapist',
    name: 'therapist',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import(/* webpackChunkName: "about" */ '../views/TherapistView.vue')
    component: TherapistView,
    meta:{isHide:false}
  },
  {
    path: '/backTherapist',
    name: 'backTherapist',
    chName: '管理按摩師',
    component: BackTherapistView,
    meta:{isHide:false}
  },
  {
    path: '/backtherapistadd',
    name: 'backtherapistadd',
    chName: '新增按摩師',
    component: BackTherapistAddView,
    meta:{isHide:false}
  },
  {
    path: '/employee',
    name: 'employee',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    // component: () => import(/* webpackChunkName: "about" */ '../views/TherapistView.vue')
    component: EmployeeView,
    meta:{isHide:false}
  },
  {
    path: '/reservation',
    name: 'reservation',
    component: ReservationView,
    meta:{isHide:false}
  },
  {
    path: '/resvPage',
    name: 'resvPage',
    component: ResvPageView,
    meta:{isHide:false}
  },
  {
    path: '/message',
    name: 'message',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/MessagefaqView.vue'),
    meta:{isHide:false}
  },

  {
    path: '/cart',
    name: 'cart',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Cart.vue'),
    meta:{isHide:false}
  },
  {
    path: '/BackShop',
    name: 'BackShop',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/BackShop.vue'),
    meta:{isHide:true}
  },
  {
    path: '/OrderItem',
    name: 'OrderItem',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/OrderItem.vue'),
    meta:{isHide:true}
  },
  {
    path: '/ManageItems',
    name: 'ManageItems',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/ManageItems.vue'),
    meta:{isHide:false}
  },
  {
    path: '/Confirm',
    name: 'Confirm',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Confirm.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemLogin',
    name: 'MemLogin',
    component: () => import('../views/MemLogin.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemCenter',
    name: 'MemCenter',
    component: () => import('../views/MemCenterView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemRegister',
    name: 'MemRegister',
    component: () => import('../views/MemRegisterView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MassageSchool',
    name: 'MassageSchool',
    component: MassageSchoolView,
    meta:{isHide:false}
  },
  {
    path: '/MassageGame',
    name: 'MassageGame',
    component: MassageGameView,
    meta:{isHide:false}
  },
  {
    path: '/GetCoupon',
    name: 'GetCoupon',
    component: GetCouponView,
    meta:{isHide:false}
  },
  {
    path: '/ProductList',
    name: 'ProductList',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/ProductList.vue'),
    meta:{isHide:false}
  },
  {
    path: '/Detail',
    name: 'Detail',
    // route level code-splitting
    // this generates a separate chunk (reserve.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "reserve" */ '../views/Detail.vue'),
    meta:{isHide:false}
  },
  {
    path: '/backstage',
    name: 'backstage',
    component: BackstageView,
    meta:{isHide:true}
  },
  {
    path: '/backstageIndex',
    name: 'backstageIndex',
    chName: '首頁',
    component: BackstageIndexView,
    meta:{isHide:true}
  },
  {
    path: '/manageLogin',
    name: 'manageLogin',
    component: ManageLoginView,
    meta:{isHide:true}
  },
  {
    path: '/BackCoupon',
    name: 'BackCoupon',
    component: BackCouponView,
    meta:{isHide:true}
  },
  {
    path: '/BackCouponAdd',
    name: 'BackCouponAdd',
    component: BackCouponAddView,
    meta:{isHide:true}
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
