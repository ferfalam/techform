<template>
    <app-layout :canLogin='canLogin' :canRegister='canRegister'>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight ">
                Liste des formations
            </h2>
        </template>
        <section class="py-6">
            <div class=" my-3 mx-8 bg-green-200 text-green-500 p-3" v-if="$page.props.flash.success">
                {{ $page.props.flash.success }}
            </div>
            <div class="py-3" v-for="course in this.courseList.data" :key="course.id">
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
                    <span class="inline-block font-semibold text-sm text-gray-700 bg-gray-200 px-3 py-1 rounded-full">{{convert(course.total_duration)}}</span>
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
            <inertia-link :href="link.url"  class="text-indigo-700 border-gray-500 p-5" v-for="link in courseList.links" :key="link.label">
                <span :class="{'text-red-700' : link.active}" v-if="link.url"> {{link.label}} </span>
            </inertia-link>
        </section>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';


export default {
    components: {
        AppLayout,
    },

    props: {
            canLogin: Boolean,
            canRegister: Boolean,
            courses: Object
    },

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
        let last = this.courseList.links.length
        this.courseList.links[0].label = "Précédent"
        this.courseList.links[last-1].label = "Suivant"
    },

}
</script>
