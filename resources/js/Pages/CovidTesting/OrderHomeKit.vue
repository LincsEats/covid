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

const props = defineProps({
    user: Object,
    postData: Object
});
const form = useForm({
    userId: props.user.id,
    name: props.user.name,
    niNumber:  props.user.niNumber,
    email: props.user.email,
    testType: '',
    streetName: '',
    buildingNumber: '',
    postcode: '',
    city: '',
});
const submit = () => {
    form.post(route('covidtesting.save'), {
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
                    type="text"
                    class="mt-1 block w-full px-2 py-2"
                    required
                    autofocus
                    autocomplete="userId"            
                />
            </div>

            <div class="hidden">
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

             <div class="mt-4 hidden">
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

            <div class="mt-4 hidden">
                <JetLabel for="email" value="Email" />
                <JetInput
                    id="email"
                    v-model="form.email"
                    type="email"
                    class="mt-1 block w-full px-2 py-2"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="testType" value="Test Type" class="font-black"/>
                    <select class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" aria-label="Default select example"
                    id="testType"
                    v-model="form.testType"
                    type="text"
                    required>
                    <option selected>Select PCR or Lateral Flow</option>
                    <option value="PCR">PCR</option>
                    <option value="Lateral Flow">Lateral Flow</option>
                    </select>
            </div>

            <div class="mt-4">
                <JetLabel for="streetName" value="Street Name" class="font-black" />
                <JetInput class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    id="streetName"
                    v-model="form.streetName"
                    type="text"
                    required
                />
            </div>

            <div class="mt-4">
                <JetLabel for="buildingNumber" value="Building Number" class="font-black" />
                <JetInput
                    id="streetName"
                    v-model="form.buildingNumber"
                    type="text"
                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    required
                />
            </div>        

            <div class="mt-4">
                <JetLabel for="postcode" value="Postcode" class="font-black" />
                <JetInput
                    id="postcode"
                    v-model="form.postcode"
                    type="text"
                    class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"                    required
                />
            </div>  

            <div class="mt-4">
                <JetLabel for="city" value="City" class="font-black" />
                <JetInput
                    id="city"
                    v-model="form.city"
                    type="text"
                class="form-select appearance-none block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding bg-no-repeat border border-solid border-gray-300 rounded transition ease-in-out m-0
                             focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                    required
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