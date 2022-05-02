<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, useForm } from '@inertiajs/inertia-vue3';
import JetAuthenticationCard from '@/Jetstream/AuthenticationCard.vue';
import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo.vue';
import JetButton from '@/Jetstream/Button.vue';
import JetInput from '@/Jetstream/Input.vue';
import JetCheckbox from '@/Jetstream/Checkbox.vue';
import JetLabel from '@/Jetstream/Label.vue';
import JetValidationErrors from '@/Jetstream/ValidationErrors.vue';
import { ref, reactive } from 'vue'
import { DatePicker } from 'v-calendar'
import 'v-calendar/dist/style.css'

const date = ref(new Date())
date.value.setDate(Number(date.value.getDate()) + 1)
start: new Date()

const props = defineProps({
    user: Object,
    postData: Object
});
const form = useForm({
    userId: props.user.id,
    name: props.user.name,
    niNumber:  props.user.niNumber,
    vaccine: '',
    bookingDateTime: ''
});
const submit = () => {
    form.post(route('booking.save'), {
        onFinish: () => form.reset(''),
    });
};

</script>
<template>
  <AppLayout title="CovidStats">
 <JetAuthenticationCard>
        <template #logo>
            <JetAuthenticationCardLogo />
        </template>
        <JetValidationErrors class="mb-4" />
        <form @submit.prevent="submit">
            <div class="hidden">
                <JetLabel for="userId" value="User ID" class="font-black"/>
                <JetInput
                    id="userId"
                    v-model="form.userId"
                    type="number"
                    class="mt-1 block w-full px-2 py-2"
                    required
                    autofocus
                    autocomplete="userId"            
                />
            </div>

            <div class="">
                <JetLabel for="name" value="Name" />
                <JetInput
                    id="name"
                    v-model="form.name"
                    type="text"
                    class="mt-1 block w-full px-2 py-2"
                    required
                    autofocus
                    autocomplete="name"            
                />
            </div>

             <div class="mt-4">
                <JetLabel for="niNumber" value="NI Number" />
                <JetInput
                    id="niNumber"
                    v-model="form.niNumber"
                    type="text"
                    class="mt-1 block w-full px-2 py-2"
                    autofocus
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="vaccine" value="Vaccine" class="font-black"/>
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
                    id="testType"
                    v-model="form.vaccine"
                    type="text"
                    required>
                    <option selected>Select Vaccine Dose</option>
                    <option value="1st Jab">1st Jab</option>
                    <option value="2nd Jab">2nd Jab</option>
                    <option value="Booster">Booster</option>
                    </select>
            </div>
            <DatePicker v-model="date" mode="dateTime" :columns="1" :valid-hours="{min:9, max:18}" is24hr  :minute-increment="5" class="mt-6">
            </DatePicker><br>
            <a for="movie" class="text-gray-800 ml-2 hidden">{{ date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}}</a> 
             <div class="mt-4">
                <JetLabel for="bookingDateTime" value="Booking Date & Time" />
                <JetInput
                    id="bookingDateTime"
                    v-model="form.bookingDateTime"
                    type="string"
                    class="mt-1 block w-full px-2 py-2"
                    autofocus
                    required
                    :value="date.toLocaleDateString() + ' ' + date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})"
                />
            </div>
           
            <div class="flex items-center justify-start mt-4">
                <button class="btn btn-outline btn-success px-8 py-2" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Submit
                </button>
            </div>
        </form>
    </JetAuthenticationCard>
  </AppLayout>
</template>
<style scoped>
@use form {
  field: label, group, input, button;
}
</style>