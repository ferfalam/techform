<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class="py-3" v-for="course in courseList" :key="course.id">
            <div class="p-3 mx-8 bg-white rounded shadow">
                <div class="flex justify-between items-center">
                    <div class="text-2xl">
                        {{course.title}}
                    </div>
                    <div class="text-sm text-gray-300">
                        25 épisodes
                    </div>
                </div>
                <div class=" text-sm text-gray-400">
                    {{course.description}}
                </div>
                <a class="bg-indigo-500 text-white py-1 px-2 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
                    Voir la formation
                </a>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';


export default {
    components: {
        AppLayout,
    },

    data() {
        return {
            courseList: this.courses
        }
    },

    props: ['courses']

}
</script>
