<template>
    <app-layout>
        <template #header>
            {{courseShow.title}}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl">
                {{courseShow.episodes[this.currentKey].title}}
            </div>

            <div class=" text-sm text-gray-400">
                {{courseShow.episodes[this.currentKey].description}}
            </div>

            <div class="mt-6">
                <ul v-for="(episode, index) in courseShow.episodes" :key="episode.id">
                    <li class="mt-3 flex justify-between items-center">
                        <div>
                            Episode n° {{index + 1}} - {{episode.title}}
                            <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir l'épisode</button>
                        </div>
                        <progress-button :episode-id= "episode.id" :watched-episodes= "watched"></progress-button>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';
import ProgressButton from './ProgressButton';

export default {
    components: {
        AppLayout,
        ProgressButton
    },

    props: ['course', 'watched'],

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
