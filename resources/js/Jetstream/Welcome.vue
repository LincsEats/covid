<script setup>
import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue';
import CovidLogo from '@/Jetstream/CovidLogo.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    NHSData: Object,
})
</script>

<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200 min-h-min mt-16">
            <div>
                <JetApplicationLogo class="block  max-w-xs w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Welcome to the Official Covid Support Portal!
            </div>

            <div class="mt-6 text-gray-500">
                Get NHS advice about COVID-19, including symptoms, testing, vaccination and staying at home.
            </div>
                <Link :href="route('booking.vaccine')">
                <button class="btn btn-outline btn-success w-full lg:w-96 mt-4 lg:ml-6">Book a Vaccine</button>
                </Link>                     
                <Link :href="route('covidtesting.orderhomekit')">
                <button class="btn btn-outline btn-info w-full lg:w-96 mt-4 lg:ml-6 mb-16">Order a Test</button>
                </Link>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                   <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.symptoms')">Symptoms</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Coronavirus (COVID-19) symptoms are similar to colds and flu. They include a high temperature, a cough and a loss or change to your smell or taste.
                    </div>

                    <a :href="route('information.symptoms')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>

                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.prevention')">Prevention</a>
                    </div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        You can help stop the spread of coronavirus (COVID-19) by getting vaccinated and taking care when meeting other people, such as meeting them outside.
                    </div>

                    <a :href="route('information.prevention')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>

                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.vaccine')">Vaccine</a>
                    </div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                       Vaccines were offered to people most at risk from coronavirus (COVID-19) first. They are now being offered to everyone aged 5 or over.
                    </div>
                    <a :href="route('information.vaccine')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>
                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>    

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.effectiveness')">Effectiveness</a>
                    </div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        Most people who have the coronavirus (COVID-19) vaccine will be protected from the virus. 2 doses are needed for stronger, longer lasting protection.
                    </div>
                    <a :href="route('information.effectiveness')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>
                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>       

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.selfCare')">Self Care</a>
                    </div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                        While you’re staying at home with coronavirus (COVID-19), you can ease mild symptoms by resting, drinking plenty of fluids and taking painkillers.
                    </div>
                    <a :href="route('information.selfCare')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>
                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>   

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                <CovidLogo class="block  h-12 w-auto" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold">
                        <a :href="route('information.medicalTreatments')">Medical Treatments</a>
                    </div>
                </div>
                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                       You can usually treat mild coronavirus (COVID-19) symptoms at home. If your symptoms are severe, you may need medical care until you recover.
                    </div>
                    <a :href="route('information.medicalTreatments')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-indigo-700">
                            <div>Read More</div>
                            <div class="ml-1 text-indigo-500">
                                <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                            </div>
                        </div>
                    </a>
                </div>
            </div>  
        </div>
    </div>
</template>
