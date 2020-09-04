import VueRouter from 'vue-router'

// Pages
import Home from './components/HomeComponent.vue';
import Doc from './components/DocComponent.vue';
import Audit from './components/AuditComponent.vue';
import Donate from './components/DonateComponent.vue';
import Contact from './components/ContactComponent.vue';
import Report from './components/ReportComponent.vue';
import Error404 from './components/404Component.vue';
import Login from './pages/Login'
import Dashboard from './pages/user/Dashboard'

// Routes
const routes = [
  {
    path: '/',
    name: 'home',
    component: Home,
    meta: {
      auth: undefined
    }
  },
  {
    path: '/documentation',
    name: 'doc',
    component: Doc,
    meta: {
      auth: undefined
    }
  },
  {
      path: '/audit',
      name: 'audit',
      component: Audit,
      meta: {
        auth: undefined
      }
  },
  {
      path: '/donate',
      name: 'donate',
      component: Donate,
      meta: {
        auth: undefined
      }
  },
  {
      path: '/contact',
      name: 'contact',
      component: Contact,
      meta: {
        auth: undefined
      }
  },
  {
    path: '/login',
    name: 'login',
    component: Login,
    meta: {
      auth: false
    }
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: Dashboard,
    meta: {
      auth: true
    }
  },
  {
    path: '/report/:reportId',
    name: 'report',
    meta: {
        auth: undefined
      }
  },
  {
      path: '/error404',
      component: Error404
  },
  {
      path: '*',
      redirect: '/error404'
  }
]
const router = new VueRouter({
  history: true,
  mode: 'history',
  routes,
})
export default router