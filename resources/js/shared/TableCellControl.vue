<script setup>
defineProps({
    href: {
        type: String,
        required: true,
    },
    customClass: {
        type: String,
        default: "text-blue-600 hover:text-blue-900",
    },
});
</script>

<template>
    <td class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap">
        <Link :href="href" :class="customClass"> Edit </Link>
    </td>
</template>
