<script setup>
defineProps({
    label: String,
    name: String,
    type: {
        type: String,
        default: "text",
    },
    modelValue: [String, Number],
    error: String,
});

const emit = defineEmits(["update:modelValue"]);
</script>

<template>
    <div class="mb-6 w-full">
        <label
            class="mb-2 block text-xs font-bold text-gray-700 uppercase"
            :for="name"
        >
            {{ label }}
        </label>

        <input
            :id="name"
            :name="name"
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full rounded border border-gray-300 bg-white p-2"
        />

        <div
            v-if="error"
            class="mt-1 text-xs text-red-500 italic"
            v-text="error"
        ></div>
    </div>
</template>
