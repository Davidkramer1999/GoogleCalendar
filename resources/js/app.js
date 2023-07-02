import { createApp } from 'vue'
import router from './router'
import EventsList from './components/EventsList.vue'
import ExampleComponent from './components/ExampleComponent.vue'
import App from './components/App.vue'
const app = createApp({
    components: {
        ExampleComponent,
        EventsList,
        App,
    }
})

// app.use(router)
app.mount('#app')
