import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import HomePage from './pages/HomePage.vue';
import LoginPage from './pages/LoginPage.vue';
import DashboardPage from './pages/DashboardPage.vue';
import UserPage from './pages/UserPage.vue';

const routes = [
    { path: '/', component: HomePage },
    { path: '/login', component: LoginPage },
    { path: '/dashboard', component: DashboardPage},
    { path: '/user', component: UserPage}
  ]

  const router = createRouter({

    history: createWebHistory(),
    routes, 
  })

const app = createApp({});
app.use(router);

app.mount('#app');
