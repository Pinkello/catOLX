<script setup>
import { ref } from "vue";
import { formatDate } from "@/utils/dateFormatter";
import { formatPriceDollar } from "../../utils/priceFormatter";
import ButtonGoBack from "../../shared/ButtonGoBack.vue";

const props = defineProps({
    classifield: Object,
    returnUrl: String,
});

const currentPhoto = ref(0);

const prevPhoto = () => {
    if (currentPhoto.value > 0) {
        currentPhoto.value--;
    } else {
        currentPhoto.value = props.classifield.photos.length - 1;
    }
};

const nextPhoto = () => {
    if (currentPhoto.value < props.classifield.photos.length - 1) {
        currentPhoto.value++;
    } else {
        currentPhoto.value = 0;
    }
};
</script>

<template>
    <div class="mx-auto max-w-7xl px-6 py-12">
        <div class="mb-4">
            <ButtonGoBack :returnUrl="returnUrl" />
        </div>
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
            <div class="min-h-160 space-y-4 rounded-lg bg-gray-200 p-6 shadow">
                <h1 class="mb-10 text-4xl font-bold break-words text-gray-900">
                    {{ classifield.name }}
                </h1>
                <div
                    class="flex items-center justify-center space-x-4"
                    v-if="classifield.photos.length > 0"
                >
                    <button
                        v-if="classifield.photos.length > 1"
                        @click="prevPhoto"
                        class="focus:ring-opacity-50 rounded-full bg-blue-500 p-3 text-white transition-colors duration-300 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    >
                        &lt;
                    </button>

                    <div class="h-96 w-96 overflow-hidden rounded-lg">
                        <img
                            :src="`/storage/${classifield.photos[currentPhoto].path}`"
                            alt="Classifield Photo"
                            class="h-full w-full object-cover"
                        />
                    </div>

                    <button
                        v-if="classifield.photos.length > 1"
                        @click="nextPhoto"
                        class="focus:ring-opacity-50 rounded-full bg-blue-500 p-3 text-white transition-colors duration-300 hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    >
                        &gt;
                    </button>
                </div>
                <div class="mt-8">
                    <div
                        class="mt-4 grid gap-2"
                        :class="{
                            'grid-cols-1': classifield.photos.length === 1,
                            'grid-cols-2': classifield.photos.length === 2,
                            'grid-cols-3': classifield.photos.length === 3,
                            'grid-cols-4': classifield.photos.length === 4,
                            'grid-cols-5': classifield.photos.length === 5,
                        }"
                    >
                        <div
                            v-for="(photo, index) in classifield.photos"
                            :key="index"
                            class="col-span-1 mx-auto"
                        >
                            <img
                                :src="`/storage/${photo.path}`"
                                alt="Classifield Photo"
                                class="h-24 w-24 object-cover"
                            />
                        </div>

                        <div
                            v-if="classifield.photos.length === 0"
                            class="col-span-3 text-center text-gray-400"
                        >
                            <img
                                :src="'https://images.unsplash.com/photo-1518791841217-8f162f1e1131?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=400'"
                                alt="Classifield Photo"
                                class="h-full w-full object-cover"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="space-y-4">
                <div
                    class="min-h-36 space-y-4 rounded-lg bg-gray-200 p-6 shadow"
                >
                    <h2 class="text-2xl font-semibold text-gray-900">Seller</h2>
                    <p class="text-4xl break-words text-green-600">
                        {{ classifield.user.name }}
                    </p>
                    <p class="text-base text-gray-700">
                        <b>Published at:</b>
                        {{ formatDate(classifield.created_at) }}
                    </p>
                </div>
                <div
                    class="min-h-36 space-y-4 rounded-lg bg-gray-200 p-6 shadow"
                >
                    <h2 class="text-2xl font-semibold text-gray-900">Price</h2>
                    <p
                        class="my-2 w-min rounded-lg bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 p-2 text-center font-sans text-xl text-stone-800 antialiased shadow-md"
                    >
                        {{ formatPriceDollar(classifield.price) }}
                    </p>
                </div>
                <div
                    class="min-h-60 space-y-4 rounded-lg bg-gray-200 p-6 shadow"
                >
                    <h2 class="text-2xl font-semibold text-gray-900">
                        Product Description
                    </h2>
                    <p class="break-words text-gray-700">
                        {{ classifield.description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
