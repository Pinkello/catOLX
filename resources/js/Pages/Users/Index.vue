<script setup>
import Pagination from "@/shared/Pagination.vue";
import { ref, watch } from "vue";
import TableCellHeader from "@/shared/TableCellHeader.vue";
import ButtonCreate from "../../shared/ButtonCreate.vue";
import PageTitle from "../../shared/PageTitle.vue";
import SearchInput from "../../shared/SearchInput.vue";

let props = defineProps({
    users: Object,
    filters: Object,
});

let search = ref(props.filters.search || "");
</script>

<template>
    <Head title="Users" />
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <PageTitle title="Users" />
            <ButtonCreate href="users/create" content="Create New User" />
        </div>
        <div>
            <SearchInput
                v-model="search"
                route="/users"
                placeholder="Search users..."
            />
        </div>
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
                            <tr>
                                <TableCellHeader content="Name" />
                                <TableCellHeader
                                    content="Admin functions"
                                    colspan="3"
                                />
                            </tr>
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
                                        :href="`comingSoon`"
                                        class="text-indigo-600 hover:text-indigo-900"
                                    >
                                        Edit
                                    </Link>
                                </td>
                                <td
                                    class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap"
                                >
                                    <Link
                                        :href="`/comingSoon`"
                                        class="text-yellow-600 hover:text-yellow-900"
                                    >
                                        Copy
                                    </Link>
                                </td>
                                <td
                                    class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap"
                                >
                                    <Link
                                        :href="`comingSoon`"
                                        class="text-red-600 hover:text-red-900"
                                    >
                                        Delete
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
