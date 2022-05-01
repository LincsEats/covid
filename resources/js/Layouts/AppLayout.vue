<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/inertia-vue3';
import JetApplicationMark from '@/Jetstream/ApplicationMark.vue';
import JetBanner from '@/Jetstream/Banner.vue';
import JetDropdown from '@/Jetstream/Dropdown.vue';
import JetDropdownLink from '@/Jetstream/DropdownLink.vue';
import JetNavLink from '@/Jetstream/NavLink.vue';
import JetResponsiveNavLink from '@/Jetstream/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    Inertia.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title" />
        <JetBanner />
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="w-full text-gray-700 bg-white h-16 fixed max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 shadow">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <JetApplicationMark class="block h-12 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <ul class="menu menu-horizontal">
                                    <li><a><JetNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</JetNavLink></a></li>
                                    <li tabindex="0">
                                        <a><JetNavLink>Information</JetNavLink></a>
                                        <ul class="bg-base-100 p-2">
                                            <li>
                                            <a><JetNavLink :href="route('information.overview')" :active="route().current('information.overview')">COVID-19 Overview</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.symptoms')" :active="route().current('information.symptoms')">Symptoms</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.prevention')" :active="route().current('information.prevention')">Prevention</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.vaccine')" :active="route().current('information.vaccine')">Vaccine</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.effectiveness')" :active="route().current('information.effectiveness')">Effectiveness</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.selfCare')" :active="route().current('information.selfCare')">Self Care</JetNavLink></a>
                                            <a><JetNavLink :href="route('information.medicalTreatments')" :active="route().current('information.medicalTreatments')">Medical Treatments</JetNavLink></a>
                                            </li>
                                        </ul>
                                    </li>                         <!-- tabindex will make the parent menu focusable to keep the submenu open if it's focused -->
                                    <li tabindex="0">
                                        <a><JetNavLink>Data</JetNavLink></a>
                                        <ul class="bg-base-100 p-2">
                                            <li>
                                            <a><JetNavLink :href="route('covidstats.index')" :active="route().current('covidstats.index')">Covid Stats</JetNavLink></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <JetDropdown align="right" width="48">
                                    <template #trigger>
                                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                                        </button>

                                        <span v-else class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            Manage Account
                                        </div>

                                        <JetDropdownLink :href="route('profile.show')">
                                            Profile
                                        </JetDropdownLink>

                                        <JetDropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                                            API Tokens
                                        </JetDropdownLink>

                                        <div class="border-t border-gray-100" />

                                        <!-- Authentication -->
                                        <form @submit.prevent="logout">
                                            <JetDropdownLink as="button">
                                                Log Out
                                            </JetDropdownLink>
                                        </form>
                                    </template>
                                </JetDropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                                <svg
                                    class="h-6 w-6"
                                    stroke="currentColor"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden min-h-screen">
                    <div class="pt-16 pb-3 space-y-1 py-10">
                        <ul class="menu">
                        <li><a><JetNavLink :href="route('dashboard')" :active="route().current('dashboard')">Dashboard</JetNavLink></a></li>
                        <!-- tabindex will make the parent menu focusable to keep the submenu open if it's focused -->
                        <li tabindex="0" class="w-fit">
                        <a><JetNavLink>Information</JetNavLink></a>
                            <ul class="w-fit bg-white">
                            <li><a><JetNavLink :href="route('information.overview')" :active="route().current('information.overview')">COVID-19 Overview</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.symptoms')" :active="route().current('information.symptoms')">Symptoms</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.prevention')" :active="route().current('information.prevention')">Prevention</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.vaccine')" :active="route().current('information.vaccine')">Vaccine</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.effectiveness')" :active="route().current('information.effectiveness')">Effectiveness</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.selfCare')" :active="route().current('information.selfCare')">Self Care</JetNavLink></a></li>
                            <li><a><JetNavLink :href="route('information.medicalTreatments')" :active="route().current('information.medicalTreatments')">Medical Treatments</JetNavLink></a></li>
                            </ul>
                        </li>
                        <li tabindex="0" class="w-fit">
                        <a><JetNavLink>Data</JetNavLink></a>
                            <ul class="w-fit bg-white">
                            <li><a><JetNavLink :href="route('covidstats.index')" :active="route().current('covidstats.index')">Covid Stats</JetNavLink></a></li>
                            </ul>
                        </li>
                        </ul>
                    </div>
                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="flex items-center px-4">
                            <div v-if="$page.props.jetstream.managesProfilePhotos" class="shrink-0 mr-3">
                                <img class="h-10 w-10 rounded-full object-cover" :src="$page.props.user.profile_photo_url" :alt="$page.props.user.name">
                            </div>

                            <div>
                                <div class="font-medium text-base text-gray-800">
                                    {{ $page.props.user.name }}
                                </div>
                                <div class="font-medium text-sm text-gray-500">
                                    {{ $page.props.user.email }}
                                </div>
                            </div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <JetResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                Profile
                            </JetResponsiveNavLink>

                            <JetResponsiveNavLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')" :active="route().current('api-tokens.index')">
                                API Tokens
                            </JetResponsiveNavLink>

                            <!-- Authentication -->
                            <form method="POST" @submit.prevent="logout">
                                <JetResponsiveNavLink as="button">
                                    Log Out
                                </JetResponsiveNavLink>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header v-if="$slots.header" class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main class="pt-12">
                <slot />
            </main>
        </div>
    </div>
    <footer class="sticky footer items-center p-4 bg-neutral text-neutral-content">
  <div class="items-center grid-flow-col">
    <svg width="36" height="36" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"><path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path></svg> 
    <p>Copyright © 2022 - All right reserved</p>
  </div> 
  <div class="grid-flow-col gap-4 md:place-self-center md:justify-self-end">
    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg>
    </a> 
    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a>
    <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
  </div>
</footer>
</template>
