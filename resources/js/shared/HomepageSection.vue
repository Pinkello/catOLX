<script setup>
import { defineProps } from "vue";

defineProps({
    gradientFrom: { type: String, default: "from-blue-100" },
    gradientTo: { type: String, default: "to-blue-300" },
    title: { type: String, required: true },
    titleHighlight: { type: String, required: true },
    titleHighlightClass: { type: String, default: "text-blue-600" },
    description: { type: String, required: true },
    linkOneUrl: { type: String, required: true },
    linkOneTitle: { type: String, required: true },
    linkTwoUrl: { type: String, required: true },
    linkTwoTitle: { type: String, required: true },
    imageSrc: { type: String, required: true },
    layout: { type: String, default: "photoRight" },
});
</script>

<template>
    <section
        data-aos="fade-up"
        data-aos-duration="1000"
        class="my-10 bg-gradient-to-r"
        :class="`${gradientFrom} ${gradientTo}`"
    >
        <div
            class="mx-auto grid max-w-7xl grid-cols-1 items-center gap-12 px-6 py-16 md:grid-cols-2 lg:px-8"
        >
            <div v-if="layout === 'photoLeft'">
                <img
                    :src="imageSrc"
                    alt="Demo image"
                    class="w-full rounded-lg shadow-lg"
                />
            </div>

            <div>
                <h1
                    class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl"
                >
                    {{ title }}
                    <span :class="titleHighlightClass">{{
                        titleHighlight
                    }}</span>
                </h1>
                <p class="mt-6 text-lg text-gray-600">
                    {{ description }}
                </p>
                <div class="mt-8 flex space-x-4">
                    <Link
                        :href="linkOneUrl"
                        class="rounded bg-blue-600 px-6 py-3 font-medium text-white transition hover:bg-blue-700"
                    >
                        {{ linkOneTitle }}
                    </Link>
                    <Link
                        :href="linkTwoUrl"
                        class="rounded border border-gray-300 bg-white px-6 py-3 font-medium text-gray-700 transition hover:bg-gray-100"
                    >
                        {{ linkTwoTitle }}
                    </Link>
                </div>
            </div>

            <div v-if="layout === 'photoRight'">
                <img
                    :src="imageSrc"
                    alt="Demo image"
                    class="w-full rounded-lg shadow-lg"
                />
            </div>
        </div>
    </section>
</template>
