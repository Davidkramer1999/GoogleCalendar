// router.js
import { createRouter, createWebHistory } from 'vue-router'
import EventsList from './components/EventsList.vue';
import App from './components/App.vue';
import ExampleComponent from './components/ExampleComponent.vue'

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
    {
        path: '/ExampleComponent',
        name: 'ExampleComponent',
        component: ExampleComponent
    }
    // other routes...
]

const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})

export default router
