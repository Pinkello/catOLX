<script setup>
defineProps({
    content: String,
    href: {
        type: String,
        default: "/users/create",
    },
});
</script>

<template>
    <Link
        :href="href"
        class="flex items-center gap-2 rounded-lg bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-2 text-sm font-semibold text-white shadow-md transition duration-300 ease-in-out hover:from-blue-600 hover:to-blue-700 hover:shadow-lg md:text-xl"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="2"
            stroke="currentColor"
            class="h-5 w-5"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M12 4v16m8-8H4"
            />
        </svg>
        {{ content }}
    </Link>
</template>
