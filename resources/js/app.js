import { createApp } from 'vue'
import router from './router'
import EventsList from './components/EventsList.vue'
import App from './components/App.vue'
import ToastPlugin from 'vue-toast-notification';

import 'vue-toast-notification/dist/theme-bootstrap.css';
const app = createApp({
    components: {
        EventsList,
        App,
    }
})

app.use(ToastPlugin);
app.use(router)
app.mount('#app')
