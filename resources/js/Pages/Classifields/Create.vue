<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    name: "",
    price: "",
    description: "",
    photos: [],
});

const handleFileChange = (event) => {
    form.photos = Array.from(event.target.files);
};

let submit = () => {
    form.post("/classifields", {});
};
</script>

<template>
    <Head title="Create Classifield" />
    <h1 class="text-3xl font-bold">Create new classifield</h1>

    <form @submit.prevent="submit" class="mt-7 max-w-md">
        <div class="mb-6">
            <label
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                for="name"
                >Name</label
            >

            <input
                v-model="form.name"
                type="text"
                name="name"
                id="name"
                class="w-full rounded border border-gray-300 p-2"
                required
            />
            <div
                v-if="form.errors.name"
                v-text="form.errors.name"
                class="mt-1 text-xs text-red-500 italic"
            ></div>
        </div>
        <div class="mb-6">
            <label
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                for="price"
                >Price</label
            >
            <input
                v-model="form.price"
                type="number"
                name="price"
                id="price"
                class="w-full rounded border border-gray-300 p-2"
                required
            />
            <div
                v-if="form.errors.price"
                v-text="form.errors.price"
                class="mt-1 text-xs text-red-500 italic"
            ></div>
        </div>
        <div class="mb-6">
            <label
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                for="description"
                >Description</label
            >
            <input
                v-model="form.description"
                type="description"
                name="description"
                id="description"
                class="w-full rounded border border-gray-300 p-2"
                required
            />
            <div
                v-if="form.errors.description"
                v-text="form.errors.description"
                class="mt-1 text-xs text-red-500 italic"
            ></div>
        </div>

        <div class="mb-6">
            <label
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                for="photos"
                >photos</label
            >
            <input
                type="file"
                name="photos[]"
                id="photos"
                class="w-full rounded border border-gray-300 p-2"
                multiple
                required
                @change="handleFileChange"
            />
            <div
                v-if="form.errors.description"
                v-text="form.errors.description"
                class="mt-1 text-xs text-red-500 italic"
            ></div>
        </div>

        <div class="mb-6">
            <button
                type="submit"
                class="w-full rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-700"
                :disabled="form.processing"
            >
                Submit
            </button>
        </div>
    </form>
</template>
