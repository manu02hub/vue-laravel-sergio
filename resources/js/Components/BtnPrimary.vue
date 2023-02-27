<script setup>
defineProps({
    type: {
        type: String,
        default: 'submit',
    },
});
</script>

<template>

    <v-btn variant="outlined" :type="type">
        <slot />
    </v-btn>
</template>
