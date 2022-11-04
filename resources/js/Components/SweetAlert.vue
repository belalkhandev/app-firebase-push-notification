<script setup>
import {defineProps, onMounted, ref} from "vue";
    const props = defineProps({
        message: String
    })

    const showNotification = ref(false);

    onMounted(() => {
       showNotification.value = true;
       setTimeout(() => (showNotification.value = false), 2000);
    });

</script>

<template>

</template>
