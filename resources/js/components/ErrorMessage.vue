<template>
    <div v-if="message" class="error-message">{{ message }}</div>
</template>

<script lang="ts">
import { defineComponent } from "vue";

export default defineComponent({
    props: {
        message: {
            type: String as () => string | null,
            required: false,
            default: "",
        },
    },
});
</script>

<style scoped>
.error-message {
    color: red;
    margin-bottom: 20px;
}
</style>
