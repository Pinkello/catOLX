<script setup>
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash/debounce";

const props = defineProps({
    modelValue: String,
    route: {
        type: String,
        required: true,
    },
    placeholder: {
        type: String,
        default: "Search...",
    },
});

const emit = defineEmits(["update:modelValue"]);

let search = ref(props.modelValue || "");

watch(
    search,
    debounce(function (value) {
        emit("update:modelValue", value);
        router.get(
            props.route,
            { search: value },
            {
                preserveState: true,
                replace: true,
            },
        );
    }, 400),
);
</script>

<template>
    <input
        v-model="search"
        type="text"
        :placeholder="placeholder"
        class="mt-2 mb-2 w-full rounded border p-2"
    />
</template>
