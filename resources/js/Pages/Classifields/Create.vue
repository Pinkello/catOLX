<script setup>
import { useForm } from "@inertiajs/vue3";
import { computed } from "vue";
import FormInput from "../../shared/FormInput.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";
import ButtonSubmit from "../../shared/ButtonSubmit.vue";

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
    form.post("/classifields", {
        onSuccess: () => {
            toast.success("Classifield successfully created!", {
                position: "top-right",
                autoClose: 3000,
            });
        },
    });
};

const photoFileErrors = computed(() => {
    const errors = [];

    if (form.errors.photos && typeof form.errors.photos === "string") {
        errors.push(form.errors.photos);
    }

    Object.entries(form.errors || {}).forEach(([key, message]) => {
        if (key.startsWith("photos.") && key !== "photos") {
            errors.push(message);
        }
    });

    return [...new Set(errors)];
});
</script>

<template>
    <Head title="Create Classifield" />
    <div
        class="mx-auto mt-10 flex max-w-2xl flex-col items-center rounded-lg bg-gray-100 p-10 align-middle shadow-md"
    >
        <h1 class="text-3xl font-bold">Create new Classifield</h1>
        <form @submit.prevent="submit" class="mt-7 w-full max-w-lg">
            <FormInput
                label="Name of Item"
                name="name"
                v-model="form.name"
                :error="form.errors.name"
            />

            <FormInput
                label="Price"
                name="price"
                type="number"
                v-model="form.price"
                :error="form.errors.price"
            />

            <FormInput
                label="Description"
                name="description"
                :type="'textarea'"
                v-model="form.description"
                :error="form.errors.description"
            />

            <div class="mb-6">
                <label
                    class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                    for="photos"
                >
                    Photos (1-5)
                </label>

                <div class="flex flex-col space-y-2">
                    <label
                        for="photos"
                        class="w-fit cursor-pointer rounded bg-blue-500 px-4 py-2 text-white hover:bg-blue-600"
                    >
                        Choose Files
                    </label>

                    <input
                        type="file"
                        name="photos[]"
                        id="photos"
                        class="hidden"
                        multiple
                        @change="handleFileChange"
                    />

                    <ul
                        v-if="form.photos && form.photos.length"
                        class="list-inside list-disc text-sm text-gray-600"
                    >
                        <li
                            v-for="(file, index) in form.photos"
                            :key="index"
                            class="rounded bg-white p-2 shadow-sm"
                        >
                            {{ file.name }}
                        </li>
                    </ul>
                </div>

                <div
                    v-for="(error, index) in photoFileErrors"
                    :key="index"
                    class="mt-1 text-xs text-red-500 italic"
                >
                    {{ error }}
                </div>
            </div>

            <ButtonSubmit :disabled="form.processing"
                >Submit new Classifield</ButtonSubmit
            >
        </form>
    </div>
</template>
