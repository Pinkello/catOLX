<script setup>
defineProps({
    disabled: Boolean,
});
</script>

<template>
    <div class="mb-6">
        <button
            type="submit"
            class="w-full rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700"
            :disabled="disabled"
        >
            <slot>Submit</slot>
        </button>
    </div>
</template>
