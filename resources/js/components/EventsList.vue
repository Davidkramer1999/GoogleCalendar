<template>
    <div>
        <button @click="refetchEvents">Refresh Events</button>
        <ul>
            <li v-for="event in events" :key="event?.id">
                <EventDetails :event="event" />
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";
import EventDetails from "./EventDetails.vue";
import { Event } from "../types/types";

export default defineComponent({
    components: {
        EventDetails,
    },
    data(): {
        events: Event[];
    } {
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
        async refetchEvents() {
            try {
                const response = await axios.get(
                    `${import.meta.env.VITE_MIX_APP_URL}/calendar/refetch`
                );
                this.events = response.data?.events;
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
});
</script>

<style scoped>
/* add your styles here */
</style>
