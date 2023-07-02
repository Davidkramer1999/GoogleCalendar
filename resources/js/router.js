// router.js
import { createRouter, createWebHistory } from 'vue-router'
import EventsList from './components/EventsList.vue';
import App from './components/App.vue';

const routes = [
    {
        path: '/listCalendar',
        name: 'Events',
        component: EventsList
    },
    {
        path: '/App',
        name: 'App',
        component: App
    },
    // other routes...
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
