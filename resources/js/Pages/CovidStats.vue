<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    covidData: Object,
})

</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ $page.props.covidData.country}}
            </h2>
        </template>
        <div class="bg-white rounded-b-box flex min-h-[6rem] min-w-[18rem]  flex-wrap items-center justify-center gap-2 overflow-x-hidden border bg-cover bg-top p-4 undefined" style="background-size: 5px 5px">
            <div class="overflow-x-auto">
            <table class="table table-compact w-full"  data-theme="light" id="example-1">
                <thead>
                <tr>
                    <th>Country</th>
                    <th>Cases</th> 
                    <th>Deaths</th> 
                    <th>Recovered</th> 
                    <th>Critical</th> 
                    <th>Active Cases</th> 
                    <th>Tests</th> 

                </tr>
                </thead> 
                <tbody>
                <tr v-for="co in covidData" :key="co.country">
                    <th >{{ co.country }}</th> 
                    <td >{{ Number(co.cases).toLocaleString() }}</td>
                    <td >{{ Number(co.deaths).toLocaleString() }}</td>
                    <td >{{ Number(co.recovered).toLocaleString() }}</td>
                    <td >{{ Number(co.critical).toLocaleString() }}</td>
                    <td >{{ Number(co.active).toLocaleString() }}</td>
                    <td >{{ Number(co.tests).toLocaleString() }}</td>                    
                </tr>
                </tbody> 
            </table>
            </div>
        </div>
    </AppLayout>
</template>
