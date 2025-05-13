<template>
    <div>
        <loading v-model:active="store.isLoading" :is-full-page="data.fullPage" />
    </div>
</template>

<script setup>
import { reactive } from 'vue';
import Loading from 'vue-loading-overlay';

const props = defineProps({
    store: {
        type: Boolean,
        required: true
    }
});

const data = reactive({
    fullpage: true
});
</script>

<style scoped></style>