<script setup>
import HomepageSection from "../shared/HomepageSection.vue";
</script>

<template>
    <Head>
        <meta
            name="description"
            content="Home page description"
            head-key="description"
        />
    </Head>
    <HomepageSection
        gradientFrom="from-blue-100"
        gradientTo="to-blue-300"
        title="Welcome to"
        titleHighlight="CatOLX!"
        titleHighlightClass="text-blue-600"
        description="A simple, fast, and convenient classifieds system. See how
                    easy it is to sell or find something."
        linkOneUrl="/classifields"
        linkOneTitle="Browse Classifieds"
        linkTwoUrl="/classifields/create"
        linkTwoTitle="Add Classified"
        imageSrc="/images/homephoto1.jpg"
        layout="photoRight"
    />

    <HomepageSection
        gradientFrom="from-blue-300"
        gradientTo="to-blue-100"
        title="Join a community of"
        titleHighlight="passionate pet lovers"
        titleHighlightClass="text-green-600"
        description="Dive deep into the world of pets and discover a vibrant
                    community!"
        linkOneUrl="/users"
        linkOneTitle="Browse Users"
        linkTwoUrl="/users/create"
        linkTwoTitle="Add new User"
        imageSrc="/images/homephoto2.jpg"
        layout="photoLeft"
    />
</template>
