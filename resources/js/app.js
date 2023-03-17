import './bootstrap';
import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import Home from './pages/Home.vue';
import About from './pages/About.vue';
import Dashboard from './pages/Dashboard.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
    { path: '/dashboard', component: Dashboard}
  ]

  const router = createRouter({

    history: createWebHistory(),
    routes, 
  })

const app = createApp({});
app.use(router);

app.mount('#app');
