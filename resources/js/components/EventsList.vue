<template>
    <div>
        <button @click="fetchEvents">Refresh Events</button>
        <ul>
            <li v-for="event in events" :key="event.id">
                <h2>{{ event.summary }}</h2>
                <p>{{ event.description }}</p>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {
            events: [],
        };
    },
    methods: {
        fetchEvents() {
            axios
                .get(`${process.env.MIX_APP_URL}/calendar/events`)
                .then((response) => {
                    this.events = response.data;
                });
        },
    },
    mounted() {
        console.log(process.env.APP_URL);
        console.log(` ${process.env.MIX_APP_URL}/calendar/events`);
        this.fetchEvents();
    },
};
</script>

<style scoped>
/* add your styles here */
</style>
