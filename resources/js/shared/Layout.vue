<script setup>
import { computed } from "vue";
import { usePage } from "@inertiajs/vue3";
import Nav from "./Nav.vue";
import { Head } from "@inertiajs/vue3";
const page = usePage();
</script>

<template>
    <Head>
        <meta
            name="description"
            content="Default app description"
            head-key="description"
        />
    </Head>

    <section class="bg-gray-300 p-6">
        <header class="flex justify-between">
            <div class="flex items-center">
                <h1 class="mr-5 text-lg font-bold">CatOLX</h1>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="mx-auto max-w-7xl">
            <slot />
        </div>
    </section>
</template>
