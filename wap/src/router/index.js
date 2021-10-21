import {createRouter, createWebHashHistory } from 'vue-router';

const Home     = () => import('@/components/Layout/layout.vue');
const First    = () => import('@/views/first/index.vue');

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
    children: [{
      path: '/',
      name: 'first',
      component: First
    }]
  }
];

const router = createRouter({
  // history:HashChangeEvent,
  history: createWebHashHistory(),
  routes,
});

export default router;