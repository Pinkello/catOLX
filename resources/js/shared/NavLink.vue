<script setup>
defineProps({
    href: {
        type: String,
    },
    active: {
        type: Boolean,
    },
});
</script>

<template>
    <Link
        :href="href"
        class="text-black hover:underline"
        :class="{ 'font-bold underline': active }"
        ><slot></slot
    ></Link>
</template>
