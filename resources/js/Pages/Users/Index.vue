<script setup>
import Pagination from "@/shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash.debounce";

let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search || "");

watch(
    search,
    debounce(function (value) {
        router.get(
            "/users",
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
    <Head title="Users" />
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Users</h1>

            <Link
                href="/users/create"
                class="rounded bg-blue-500 px-2 py-1 text-sm text-white hover:bg-blue-600"
            >
                Create User
            </Link>
        </div>
        <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="mt-2 mb-2 rounded border p-2"
        />
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
            >
                <div
                    class="overflow-hidden border-b border-gray-200 shadow sm:rounded-lg"
                >
                    <table class="min-w-full divide-y divide-gray-200">
                        <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="user in users.data" :key="user.id">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div>
                                            <div
                                                class="text-sm font-medium text-gray-900"
                                            >
                                                {{ user.name }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap"
                                >
                                    <Link
                                        :href="`/users/${user.id}/edit`"
                                        class="text-indigo-600 hover:text-indigo-900"
                                    >
                                        Edit
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <Pagination :links="users.links" class="mt-6" />
</template>
