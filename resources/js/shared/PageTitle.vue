<script setup>
defineProps({
    title: String,
});
</script>

<template>
    <h1 class="text-lg font-bold md:text-4xl">
        {{ title }}
    </h1>
</template>
