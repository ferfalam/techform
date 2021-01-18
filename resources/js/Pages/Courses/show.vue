<template>
    <app-layout>
        <template #header>
            {{this.courseShow.title}}
        </template>
            <div class="py-4 mx-8">
                <div class="text-2xl">
                    {{this.courseShow.episodes[this.currentKey].title}}
                </div>

                <div class=" text-sm text-gray-400">
                    {{this.courseShow.episodes[this.currentKey].description}}
                </div>
            </div>
        <div class="mt-6">
            <ul v-for="(episode, index) in this.courseShow.episodes" :key="episode.id">
                <li class="mt-3">
                    Episode n° {{index + 1}} - {{episode.title}}
                    <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir l'épisode</button>
                </li>
            </ul>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';


export default {
    components: {
        AppLayout,
    },

    props: ['course'],

    data() {
        return {
            courseShow: this.course,
            currentKey: 0
        }
    },

    methods: {
        switchEpisode(index){
            this.currentKey = index
        }
    },

    mounted() {

    },

}
</script>
