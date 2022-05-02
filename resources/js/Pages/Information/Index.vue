<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
 import FormPicker from '@/components/FormPicker.vue';

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
        <div class="bg-white rounded-b-box flex min-h-[6rem] min-w-[18rem]  flex-wrap items-center justify-center gap-2 overflow-x-hidden border bg-cover bg-top p-4 undefined mt-28" style="background-size: 5px 5px">
            <div class="overflow-x-auto">
                <FormPicker />               
            </div>
        </div>
    </AppLayout>
</template>
