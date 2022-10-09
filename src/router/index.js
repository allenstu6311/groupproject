import { createRouter, createWebHistory } from 'vue-router'
import FrontPageView from '@/views/FrontPageView.vue'
import HomeView from '@/views/HomeView.vue'
import BackstageView from '@/views/BackstageView.vue'

const routes = [
  {
    path: '/',
    name: 'frontpage',
    component: FrontPageView,
    meta:{isHide:true}
  },
  {
    path: '/home',
    name: 'home',
    component: HomeView,
    meta:{isHide:false}
  },
  {
    path: '/BackstageNews',
    name: 'BackstageNews',
    component: () => import('@/views/BackstageNewsView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackstageFAQ',
    name: 'BackstageFAQ',
    component: () => import('@/views/BackstageFAQView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/about',
    name: 'about',
    component: () => import('@/views/AboutUs.vue'),
    meta:{isHide:false}

  },
  {
    path: '/therapist',
    name: 'therapist',
    component: () => import('@/views/TherapistView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/backTherapist',
    name: 'backTherapist',
    chName: '管理按摩師',
    component: () => import('@/views/BackTherapistView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/backtherapistadd',
    name: 'backtherapistadd',
    chName: '新增按摩師',
    component: () => import('@/views/BackTherapistAddView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackTherapistChangeInfo',
    name: 'BackTherapistChangeInfoView',
    chName: '修改按摩師資料',
    component: () => import('@/views/BackTherapistChangeInfoView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/employee',
    name: 'employee',
    component: () => import('@/views/EmployeeView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/reservation',
    name: 'reservation',
    component: () => import('@/views/ReservationView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/resvPage',
    name: 'resvPage',
    component: () => import('@/views/ResvPageView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/message',
    name: 'message',
    component: () => import('@/views/MessagefaqView.vue'),
    meta:{isHide:false}
  },

  {
    path: '/cart',
    name: 'cart',
    component: () => import('@/views/Cart.vue'),
    meta:{isHide:false}
  },
  {
    path: '/BackShop',
    name: 'BackShop',
    component: () => import('@/views/BackShop.vue'),
    meta:{isHide:true}
  },
  {
    path: '/OrderItem',
    name: 'OrderItem',
    component: () => import('@/views/OrderItem.vue'),
    meta:{isHide:true}
  },
  {
    path: '/ManageItems',
    name: 'ManageItems',
    component: () => import('@/views/ManageItems.vue'),
    meta:{isHide:false}
  },
  {
    path: '/Confirm',
    name: 'Confirm',
    component: () => import('@/views/Confirm.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemLogin',
    name: 'MemLogin',
    component: () => import('@/views/MemLogin.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemCenter',
    name: 'MemCenter',
    component: () => import('@/views/MemCenterView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MemRegister',
    name: 'MemRegister',
    component: () => import('@/views/MemRegisterView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MassageSchool',
    name: 'MassageSchool',
    component: () => import('@/views/MassageSchoolView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/MassageGame',
    name: 'MassageGame',
    component: () => import('@/views/MassageGameView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/GetCoupon',
    name: 'GetCoupon',
    component: () => import('@/views/GetCouponView.vue'),
    meta:{isHide:false}
  },
  {
    path: '/ProductList',
    name: 'ProductList',
    component: () => import('@/views/ProductList.vue'),
    meta:{isHide:false}
  },

  {
    path: '/Detail',
    name: 'Detail',
    component: () => import('@/views/Detail.vue'),
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
    component: () => import('@/views/BackstageIndexView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/manageLogin',
    name: 'manageLogin',
    component: () => import('@/views/ManageLoginView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackCoupon',
    name: 'BackCoupon',
    component: () => import('@/views/BackCouponView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackCouponAdd',
    name: 'BackCouponAdd',
    component: () => import('@/views/BackCouponAddView.vue'),
    meta:{isHide:true}
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
