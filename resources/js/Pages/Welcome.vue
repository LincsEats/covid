<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
<Head title="Welcome" />
    <div class="hero min-h-screen" style="background-image: url(../../images/herobg.jpeg);">
    <div class="hero-overlay bg-opacity-60"></div>
        <div class="text-center text-neutral-content">
            <div class="max-w-md">
            <img src="../../images/covid19.png" class="p-1 max-w-sm" alt="..." />
                <h1 class="text-5xl font-bold">Support Portal</h1>
                <p class="py-6 text-1xl font-bold">Register to get NHS advice about COVID-19, including symptoms, testing, vaccination and staying at home.</p>
                    <div v-if="canLogin" class="">
                        <Link v-if="$page.props.user" :href="route('dashboard')" class="text-sm text-gray-700">
                                <button class="btn btn-outline btn-info">Dashboard</button>
                        </Link>
                        <template v-else>
                            <Link :href="route('login')" class="text-sm text-gray-700 ">
                                <button class="btn btn-outline btn-success w-28">Login</button>
                            </Link>
                            <Link v-if="canRegister" :href="route('register')" class="ml-4 text-sm text-gray-700">
                                <button class="btn btn-outline btn-info w-28">Register</button>
                            </Link>
                        </template>
                    </div>
            </div>
        </div>
    </div>
</template>
