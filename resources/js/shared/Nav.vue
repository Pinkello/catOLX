<script setup>
import NavLink from "./NavLink.vue";
</script>
<template>
    <nav class="mtl-6">
        <ul class="flex space-x-6">
            <li>
                <NavLink href="/" :active="$page.component === 'Welcome'"
                    >Home nav</NavLink
                >
            </li>
            <li>
                <NavLink href="/users" :active="$page.component === 'Users'"
                    >Users</NavLink
                >
            </li>

            <li>
                <NavLink
                    href="/settings"
                    :active="$page.component === 'Settings'"
                    >Settings</NavLink
                >
            </li>

            <li>
                <NavLink
                    href="/classifields"
                    :active="$page.component === 'Classifields'"
                    >Classifields</NavLink
                >
            </li>
        </ul>
    </nav>
</template>
