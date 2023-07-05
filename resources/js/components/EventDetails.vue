<template>
    <div class="event-details">
        <p class="event-title" @click="showDetails = !showDetails">
            {{ formattedDate }}
            <span class="arrow">{{ showDetails ? '▲' : '▼' }}</span>
        </p>
        <div v-if="showDetails" class="details">
            <p>
                Title:
                {{ event.title == null ? 'No location provided' : event.title }}
            </p>
            <p>
                Description:
                {{ event.description == null ? 'No description provided' : event.description }}
            </p>
        </div>
    </div>
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import { Events } from './types/types';
import { format } from 'date-fns-tz';

export default defineComponent({
    props: {
        event: {
            type: Object as () => Events,
            required: true,
        },
    },
    data() {
        return {
            showDetails: false,
        };
    },
    computed: {
        formattedDate() {
            return format(new Date(this.event.start_date), 'dd.MM.yyyy');
        },
    },
});
</script>

<style scoped>
.event-details {
    cursor: pointer;
}

.event-title {
    display: flex;
    justify-content: space-between;
}

.arrow {
    padding-top: 1px;
    padding-left: 20px;
    padding-right: 10px;
}

.details {
    margin-top: 10px;
    background-color: #f5f5f5;
    padding: 10px;
    border-radius: 5px;
}
</style>
