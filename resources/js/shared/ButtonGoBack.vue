<script setup>
defineProps({
    returnUrl: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Link
        :href="returnUrl"
        class="flex items-center font-bold text-blue-400 hover:underline"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="1.5"
            stroke="currentColor"
            class="mr-2 h-5 w-5"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M15.75 19.5L8.25 12l7.5-7.5"
            />
        </svg>
        Go Back
    </Link>
</template>
