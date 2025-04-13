<script setup>
import NavLink from "./NavLink.vue";
</script>
<template>
    <nav class="mt-4">
        <ul class="flex space-x-2">
            <li>
                <NavLink href="/" :active="$page.component === 'Home'"
                    >Home</NavLink
                >
            </li>
            <li>
                <NavLink
                    href="/classifields"
                    :active="$page.component === 'Classifields/Index'"
                    >Classifields</NavLink
                >
            </li>
            <li>
                <NavLink
                    href="/users"
                    :active="$page.component === 'Users/Index'"
                    >Users</NavLink
                >
            </li>
        </ul>
    </nav>
</template>
