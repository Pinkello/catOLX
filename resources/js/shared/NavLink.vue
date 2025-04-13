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
        class="rounded px-4 py-2 text-white transition duration-200 hover:bg-blue-500"
        :class="{ 'bg-blue-600 font-semibold shadow-md': active }"
        ><slot></slot
    ></Link>
</template>
