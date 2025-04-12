<script setup>
defineProps({
    links: Array,
});
</script>

<template>
    <div class="mt-4 flex justify-center">
        <Component
            :is="link.url ? 'Link' : 'span'"
            v-for="link in links"
            :href="link.url ? link.url : '#'"
            v-html="link.label"
            class="mx-1 hidden transform items-center rounded-md px-3 py-2 text-gray-700 transition-colors duration-300 sm:flex"
            :class="{
                'hover:bg-blue-600 hover:text-white': link.url,
                'font-bold': link.active,
            }"
        />
    </div>
</template>
