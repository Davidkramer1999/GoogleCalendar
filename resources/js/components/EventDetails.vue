<template>
    <div>
        <p @click="showDetails = !showDetails">
            {{ event.title }} -
            {{ formatDate(event?.start_date) }}
        </p>
        <div v-if="showDetails">
            <p>
                {{
                    event?.description == null
                        ? "No description provided"
                        : event?.description
                }}
            </p>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from "vue";
import { Event } from "../types/types";
import { format } from "date-fns-tz";

export default defineComponent({
    props: {
        event: {
            type: Object as () => Event,
            required: true,
        },
    },
    data() {
        return {
            showDetails: false,
        };
    },
    methods: {
        formatDate(date: string | Date) {
            return format(new Date(date), "dd.MM.yyyy");
        },
    },
});
</script>

<style scoped>
/* add your styles here */
</style>
