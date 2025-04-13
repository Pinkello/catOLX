<script setup>
import { useForm } from "@inertiajs/vue3";
import FormInput from "../../shared/FormInput.vue";
import ButtonSubmit from "../../shared/ButtonSubmit.vue";
import { toast } from "vue3-toastify";
import "vue3-toastify/dist/index.css";

let form = useForm({
    name: "",
    email: "",
    password: "",
});

let submit = () => {
    form.post("/users", {
        onSuccess: () => {
            toast.success("User successfully created!", {
                position: "top-right",
                autoClose: 3000,
            });
        },
    });
};
</script>

<template>
    <Head title="Create User" />
    <div
        class="mx-auto mt-10 flex max-w-2xl flex-col items-center rounded-lg bg-gray-100 p-10 align-middle shadow-md"
    >
        <h1 class="text-3xl font-bold">Create new user</h1>

        <form @submit.prevent="submit" class="mt-7 w-full max-w-lg">
            <FormInput
                label="Name"
                name="name"
                v-model="form.name"
                :error="form.errors.name"
            />

            <FormInput
                label="Email"
                name="email"
                type="email"
                v-model="form.email"
                :error="form.errors.email"
            />

            <FormInput
                label="password"
                name="password"
                type="password"
                v-model="form.password"
                :error="form.errors.password"
            />

            <ButtonSubmit :disabled="form.processing"
                >Submit new User</ButtonSubmit
            >
        </form>
    </div>
</template>
