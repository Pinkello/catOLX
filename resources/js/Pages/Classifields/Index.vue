<script setup>
import Pagination from "@/shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash.debounce";
import TableCell from "@/shared/TableCell.vue";
import TableCellHeader from "@/shared/TableCellHeader.vue";

let props = defineProps({
    classifields: Object,
    filters: Object,
});

let search = ref(props.filters.search || "");

watch(
    search,
    debounce(function (value) {
        router.get(
            "/classifields",
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
    <Head title="Classifields" />
    <div class="flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Classifields</h1>

            <Link
                href="/classifields/create"
                class="rounded bg-blue-500 px-2 py-1 text-sm text-white hover:bg-blue-600"
            >
                Create Classifields
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
        <div class="my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
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
                                <TableCellHeader content="Price ($)" />
                                <TableCellHeader content="Description" />
                                <TableCellHeader content="Photos" />
                                <TableCellHeader content="Preview" />
                            </tr>
                            <tr
                                v-for="classifield in classifields.data"
                                :key="classifield.id"
                            >
                                <TableCell :content="classifield.name" />
                                <TableCell :content="classifield.price" />
                                <TableCell :content="classifield.description" />

                                <td
                                    class="px-6 py-4 text-right text-sm font-medium whitespace-nowrap"
                                >
                                    <Link
                                        :href="`/classifields/${classifield.id}/edit`"
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

    <Pagination :links="classifields.links" class="mt-6" />
</template>
