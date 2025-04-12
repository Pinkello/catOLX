<script setup>
import { useForm } from "@inertiajs/vue3";

let form = useForm({
    name: "",
    email: "",
    password: "",
});

let submit = () => {
    form.post("/users", {});
};
</script>

<template>
    <Head title="Create User" />
    <h1 class="text-3xl font-bold">Create new user</h1>

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
                for="email"
                >email</label
            >
            <input
                v-model="form.email"
                type="email"
                name="email"
                id="email"
                class="w-full rounded border border-gray-300 p-2"
                required
            />
            <div
                v-if="form.errors.email"
                v-text="form.errors.email"
                class="mt-1 text-xs text-red-500 italic"
            ></div>
        </div>
        <div class="mb-6">
            <label
                class="mb-2 block text-xs font-bold text-gray-700 uppercase"
                for="password"
                >password</label
            >
            <input
                v-model="form.password"
                type="password"
                name="password"
                id="password"
                class="w-full rounded border border-gray-300 p-2"
            />
            <div
                v-if="form.errors.password"
                v-text="form.errors.password"
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
