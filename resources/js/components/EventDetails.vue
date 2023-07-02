<template>
    <div>
        <p @click="showDetails = !showDetails">
            {{ new Date(event.start_date).toLocaleDateString() }}
        </p>
        <div v-if="showDetails">
            <h2>{{ event.title }}</h2>
            <p>{{ event.description }}</p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        event: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            showDetails: false,
        };
    },
};
</script>

<style scoped>
/* add your styles here */
</style>
