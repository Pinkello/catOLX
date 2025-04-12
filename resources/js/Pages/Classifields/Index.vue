<script setup>
import Pagination from "@/shared/Pagination.vue";
import { ref, watch } from "vue";
import { router } from "@inertiajs/vue3";
import debounce from "lodash.debounce";
import TableCell from "@/shared/TableCell.vue";
import TableCellHeader from "@/shared/TableCellHeader.vue";
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";

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
const page = usePage();

const queryString = computed(() => {
    const query = page.url.split("?")[1];
    return query ? `?${query}` : "";
});
</script>

<template>
    <Head title="Classifields" />
    <div class="mb-8 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <h1 class="text-4xl font-bold">Classifields</h1>

            <Link
                href="/classifields/create"
                class="rounded bg-blue-500 px-2 py-2 text-lg text-white hover:bg-blue-600"
            >
                Create New Classifield
            </Link>
        </div>
        <input
            v-model="search"
            type="text"
            placeholder="Search..."
            class="mt-2 mb-2 rounded border p-2"
        />
    </div>

    <div class="flex flex-col items-center justify-center">
        <div
            v-for="classifield in classifields.data"
            :key="classifield.id"
            class="mb-4 flex h-full w-full flex-row overflow-hidden rounded-lg border border-stone-200 bg-white shadow-sm shadow-stone-950/5"
        >
            <div
                class="m-0 h-full w-2/5 shrink-0 items-center rounded rounded-r-none"
            >
                <img
                    :src="
                        classifield.photos.length > 0
                            ? `/storage/${classifield.photos[0].path}`
                            : 'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400'
                    "
                    alt="Classifield Photo"
                    class="h-48 w-48 rounded-lg object-cover"
                />
            </div>
            <div class="h-max w-full rounded p-4">
                <h5
                    class="mb-2 font-sans text-lg font-bold text-current antialiased md:text-xl lg:text-2xl"
                >
                    {{ classifield.name }}
                </h5>
                <p class="mb-8 font-sans text-base text-stone-600 antialiased">
                    {{ classifield.description }}
                </p>
                <Link
                    :href="`/classifields/${classifield.id}${queryString}`"
                    class="after:box-shadow relative mb-2 flex w-fit items-center justify-center gap-2 rounded-lg border border-stone-900 bg-stone-800 bg-gradient-to-b from-stone-700 to-stone-800 px-4 py-2 text-center align-middle font-sans text-sm font-medium text-stone-50 antialiased shadow-sm transition duration-300 ease-in select-none after:pointer-events-none after:absolute after:inset-0 after:rounded-[inherit] after:shadow-[inset_0_1px_rgba(255,255,255,0.25),inset_0_-2px_0px_rgba(0,0,0,0.35)] hover:border-stone-900 hover:bg-stone-700 hover:bg-gradient-to-b hover:from-stone-800 hover:to-stone-800 hover:shadow-md focus:shadow-none disabled:cursor-not-allowed disabled:opacity-50 disabled:shadow-none"
                >
                    Check out more!
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        class="h-4 w-4"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3"
                        ></path>
                    </svg>
                </Link>
            </div>
        </div>
    </div>

    <Pagination :links="classifields.links" class="mt-6" />
</template>
