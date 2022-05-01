<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    NHSData: Object,
})

</script>
<template>
    <AppLayout title="Data">
        <div class="py-12 lg:py-24">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="py-16 bg-white">  
                    <h2 class="text-2xl text-gray-900 font-bold md:text-4xl text-center uppercase">COVId-19 vaccine effectiveness</h2>
                            <!-- Separator -->
                    <div class="my-8 border-b border-gray-300 lg:my-12"></div>                    
                    <div class="container m-auto px-6 text-gray-600 md:px-12 xl:px-6"><br>
                        <div class="space-y-6 md:space-y-0 md:flex md:gap-6 lg:items-center lg:gap-12">
                            <div class="md:5/12 lg:w-5/12">
                            <img src="../../../images/stock/vaccine-min.jpeg" alt="image" loading="lazy" width="" height="">
                            </div>
                            <div class="md:7/12 lg:w-6/12">
                                <h4 class="text-xl text-gray-700 font-bold md:text-xl">{{ $page.props.NHSData.hasPart[4].description }}</h4>
                                <div class="mt-4 text-gray-600" v-html="$page.props.NHSData.hasPart[4].hasPart[0].text">{{ $page.props.NHSData.hasPart[4].hasPart[0].text }}</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
