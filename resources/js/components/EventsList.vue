<template>
    <div>
        <button @click="fetchEvents">Refresh Events</button>
        <ul>
            <li v-for="event in events" :key="event.id">
                <EventDetails :event="event" />
            </li>
        </ul>
    </div>
</template>

<script>
import axios from "axios";
import EventDetails from "./EventDetails.vue";

export default {
    components: {
        EventDetails,
    },
    data() {
        return {
            events: [],
        };
    },
    methods: {
        async fetchEvents() {
            try {
                const response = await axios.get(
                    `${import.meta.env.VITE_MIX_APP_URL}/calendar/events`
                );
                this.events = response.data;
                console.log(response?.data);
            } catch (error) {
                console.log(error);
                // Handle error here, e.g. show user-friendly error message
            }
        },
    },
    mounted() {
        this.fetchEvents();
    },
};
</script>

<style scoped>
/* add your styles here */
</style>
