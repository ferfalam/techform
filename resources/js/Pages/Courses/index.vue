<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class="py-3" v-for="course in this.courseList" :key="course.id">
            <div class="p-3 mx-8 bg-white rounded shadow">
                <div class="text-sm text-gray-300">
                    {{course.user.name}} épisodes
                </div>
                <div class="flex justify-between items-center">
                    <div class="text-2xl">
                        {{course.title}}
                    </div>
                    <div class="text-sm text-gray-300">
                        Mise en ligne par {{course.episodes_count}}
                    </div>
                </div>
                <div class=" text-sm text-gray-400">
                    {{course.description}}
                </div>
                <a :href="'courses/' + course.id" class="bg-indigo-500 text-white py-1 px-2 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
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

    props: ['courses'],

    data() {
        return {
            courseList: this.courses
        }
    },

    mounted() {

    },

}
</script>
