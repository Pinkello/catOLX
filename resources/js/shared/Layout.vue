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

    <section class="bg-blue-400 p-6">
        <header class="flex justify-between">
            <Link href="/" class="flex items-center">
                <img
                    src="/public/images/logo.jpg"
                    alt="Logo"
                    class="mr-4 h-12 w-12 rounded-full"
                />
                <h1 class="mr-5 text-lg font-bold">CatOLX</h1>
            </Link>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="mx-auto max-w-7xl">
            <slot />
        </div>
    </section>
</template>
