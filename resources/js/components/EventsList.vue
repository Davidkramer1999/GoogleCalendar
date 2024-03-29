<template>
    <div class="container">
        <button class="refresh-button" @click="fetchEvents">Refresh Events</button>
        <ErrorMessage :message="errorMessage" />
        <div class="container-list">
            <ul class="event-list">
                <li v-for="event in events" :key="event?.googleEvent?.id" class="event-list-item">
                    <EventDetails :event="event" />
                </li>
            </ul>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

import axios from 'axios';
import { useToast } from 'vue-toast-notification';

import EventDetails from './EventDetails.vue';
import ErrorMessage from './ErrorMessage.vue';

import { Events } from './types/types';

export default defineComponent({
    components: {
        EventDetails,
        ErrorMessage,
    },
    data(): {
        events: Events[];
        errorMessage: string | null;
    } {
        return {
            events: [],
            errorMessage: null,
        };
    },
    methods: {
        async fetchEvents() {
            const $toast = useToast();
            try {
                const response = await axios.get(`${import.meta.env.VITE_BASE_URL}/refetchEvents`);
                this.events = response.data;
                this.errorMessage = null;
            } catch (error) {
                this.errorMessage = 'There was an error fetching events.';
                $toast.error(this.errorMessage);
            }
        },
    },
    mounted() {
        this.fetchEvents();
    },
});
</script>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 0 auto;
    padding-top: 20px;
}

.refresh-button {
    padding: 10px 20px;
    background-color: #4caf50;
    color: white;
    border: none;
    cursor: pointer;
    margin-bottom: 20px;
    justify-content: center;
    align-content: center;
    border-radius: 5px;
}

.refresh-button:hover {
    background-color: #45a049;
}

.container-list {
    width: 100%;
    max-width: 600px;
}

.event-list {
    list-style: none;
    padding: 0;
}

.event-list-item {
    margin-bottom: 10px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 2px 2px 2px #ccc;
}
</style>
