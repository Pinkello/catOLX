<script setup>
import { ref } from "vue";
import { formatDate } from "@/utils/dateFormatter";
import { formatPriceDollar } from "../../utils/priceFormatter";

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
            <Link
                :href="returnUrl"
                class="flex items-center font-bold text-blue-400 hover:underline"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.5"
                    stroke="currentColor"
                    class="mr-2 h-5 w-5"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M15.75 19.5L8.25 12l7.5-7.5"
                    />
                </svg>
                Go Back
            </Link>
        </div>
        <div class="grid grid-cols-1 gap-12 md:grid-cols-2">
            <div class="h-160 space-y-4 rounded-lg bg-gray-200 p-6 shadow">
                <h1 class="mb-10 text-4xl font-bold text-gray-900">
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
                    <p class="text-4xl text-gray-800">
                        {{ classifield.user.name }}
                    </p>
                    <p class="text-base text-gray-700">
                        {{ formatDate(classifield.created_at) }}
                    </p>
                </div>
                <div
                    class="min-h-36 space-y-4 rounded-lg bg-gray-200 p-6 shadow"
                >
                    <h2 class="text-2xl font-semibold text-gray-900">Price</h2>
                    <p class="text-xl text-gray-700">
                        {{ formatPriceDollar(classifield.price) }}
                    </p>
                </div>
                <div
                    class="min-h-60 space-y-4 rounded-lg bg-gray-200 p-6 shadow"
                >
                    <h2 class="text-2xl font-semibold text-gray-900">
                        Product Description
                    </h2>
                    <p class="text-gray-700">
                        {{ classifield.description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>
