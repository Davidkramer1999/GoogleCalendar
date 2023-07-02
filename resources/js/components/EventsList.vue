<template>
    <div class="container">
        <button class="refresh-button" @click="refetchEvents">
            Refresh Events
        </button>
        <ErrorMessage :message="errorMessage" />
        <ul class="event-list">
            <li
                v-for="event in events"
                :key="event?.id"
                class="event-list-item"
            >
                <EventDetails :event="event" />
            </li>
        </ul>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import axios from "axios";

import EventDetails from "./EventDetails.vue";
import ErrorMessage from "./ErrorMessage.vue";

import { Event } from "./types/types";

export default defineComponent({
    components: {
        EventDetails,
        ErrorMessage,
    },
    data(): {
        events: Event[];
        errorMessage: string | null;
    } {
        return {
            events: [],
            errorMessage: null,
        };
    },
    methods: {
        async fetchEvents() {
            try {
                const response = await axios.get(
                    `${import.meta.env.VITE_MIX_APP_URL}/calendar/events`
                );
                this.events = response.data;
                this.errorMessage = null;
            } catch (error) {
                this.errorMessage = "There was an error fetching events.";
            }
        },
        async refetchEvents() {
            try {
                const response = await axios.get(
                    `${import.meta.env.VITE_MIX_APP_URL}/calendar/refetch`
                );
                this.events = response.data?.events;
                this.errorMessage = null;
            } catch (error) {
                this.errorMessage = "There was an error refreshing events.";
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
    width: 60%;
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
