<script setup>
defineProps({
    content: String,
});
</script>

<template>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div>
                <div class="text-sm font-medium text-gray-900">
                    {{ content }}
                </div>
            </div>
        </div>
    </td>
</template>
