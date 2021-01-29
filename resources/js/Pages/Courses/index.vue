<template>
    <app-layout>
        <template #header>
            Liste des formations
        </template>
        <div class=" my-3 mx-8 bg-green-200 text-green-500 p-3" v-if="$page.props.flash.success">
            {{ $page.props.flash.success }}
        </div>
        <div class="py-3" v-for="course in this.courseList" :key="course.id">
            <div class="p-3 mx-8 bg-white rounded shadow">
                <div class="text-sm text-gray-300 flex justify-between items-center">
                    <div>
                        Mise en ligne par {{course.user.name}} -
                        <span class="text-gray-500 text-sm"> {{course.participants}} participant<span v-if="parseInt(course.participants) > 1">s</span> </span>
                    </div>
                    <span class="block text-sm text-gray-400">{{course.episodes_count}} épisode<span v-if="parseInt(course.episodes_count) > 1">s</span></span>
                </div>
                <h1 class="text-2xl">
                    {{course.title}}
                </h1>
                <span class="font-semibold text-gray-500">{{convert(course.total_duration)}}</span>
                <div class=" text-sm text-gray-400">
                    {{course.description}}
                </div>
                <div class="flex items-center justify-between">
                    <a :href="'courses/' + course.id" class="bg-indigo-500 text-white py-1 px-2 text-sm mt-3 inline-block rounded hover:bg-indigo-700">
                        Voir la formation
                    </a>
                    <a :href="'course/edit/' + course.id" v-if="course.update" class="bg-gray-500 text-white py-1 px-2 text-sm mt-3 inline-block rounded hover:bg-gray-700">
                        Editer la formation
                    </a>
                </div>
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

    methods: {
        convert(timestamps){
            let hours = Math.floor(timestamps / 3600)
            let minutes = Math.floor((timestamps / 60) - (hours / 60))
            let seconds = timestamps % 60

            return hours.toString().padStart(2, 0) + ':' + minutes.toString().padStart(2, 0) + ':' + seconds.toString().padStart(2, 0)
        }
    },

    mounted() {
        // console.log(this.courseList[0].total_duration)
    },

}
</script>
