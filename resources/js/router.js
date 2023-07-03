import { createRouter, createWebHistory } from 'vue-router'
import EventsList from './components/EventsList.vue';
import App from './components/App.vue';

const routes = [
    {
        path: '/events',
        name: 'Events',
        component: EventsList
    },
    {
        path: '/App',
        name: 'App',
        component: App
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes,
})

export default router
