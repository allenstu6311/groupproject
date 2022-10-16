import { createRouter, createWebHistory } from 'vue-router'
import LandingPageView from '@/views/LandingPageView.vue'
import HomeView from '@/views/HomeView.vue'
import BackstageView from '@/views/BackstageView.vue'

const routes = [
  {
    path: '/',
    name: 'landingPage',
    component: LandingPageView,
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
    path: '/BackstageNewsAdd',
    name: 'BackstageNewsAdd',
    chName: '新增最新消息',
    component: () => import('@/views/BackstageNewsAddView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackstageNewsModify',
    name: 'BackstageNewsModify',
    chName: '修改最新消息',
    component: () => import('@/views/BackstageNewsModifyView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackstageFAQAdd',
    name: 'BackstageFAQAdd',
    chName: '新增問與答',
    component: () => import('@/views/BackstageFAQAddView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackstageFAQModify',
    name: 'BackstageFAQModify',
    chName: '修改問與答',
    component: () => import('@/views/BackstageFAQModifyView.vue'),
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
    path: '/backmsg',
    name: 'backmsg',
    component: () => import('@/views/BackMsgView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/backresv',
    name: 'backresv',
    component: () => import('@/views/BackResvView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/backmsgadd',
    name: 'backmsgadd',
    component: () => import('@/views/BackMsgAddView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/backmsgchange',
    name: 'backmsgchange',
    component: () => import('@/views/BackMsgChangeView.vue'),
    meta:{isHide:true}
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
    meta:{isHide:true}
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
    path: '/BackManageMem',
    name: 'BackManageMem',
    chName: '管理會員帳號',
    component: () => import('@/views/BackManageMemView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/BackManageAccount',
    name: 'BackManageAccount',
    chName: '管理後台帳號',
    component: () => import('@/views/BackManageAccountView.vue'),
    meta:{isHide:true}
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
  {
    path: '/BackCouponChangeinfo',
    name: 'BackCouponChangeinfo',
    component: () => import('@/views/BackCouponChangeinfoView.vue'),
    meta:{isHide:true}
  },
  {
    path: '/:pathMatch(.*)*', 
    name: '404', 
    component: () => import('@/views/NotFound.vue'),
    meta:{isHide:true}
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    return { top: 0 }
  },
})

export default router
