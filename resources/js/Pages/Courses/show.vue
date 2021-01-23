<template>
    <app-layout>
        <template #header>
            {{courseShow.title}}
        </template>
        <div class="py-4 mx-8">
            <div class="text-2xl">
                {{courseShow.episodes[this.currentKey].title}}
            </div>

            <iframe class="w-full h-screen" :src="courseShow.episodes[this.currentKey].video_url" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

            <div class=" text-sm text-gray-400">
                {{courseShow.episodes[this.currentKey].description}}
            </div>

            <div class="py-6">
                <progress-bar :watched-episodes = 'watched' :episodes = "course.episodes" ></progress-bar>
            </div>

            <div class="mt-6">
                <ul v-for="(episode, index) in courseShow.episodes" :key="episode.id">
                    <li class="mt-3 flex justify-between items-center">
                        <div>
                            Episode n° {{index + 1}} - {{episode.title}}
                            <button class="text-gray-500 focus:text-indigo-500 focus:outline-none" @click="switchEpisode(index)">Voir l'épisode</button>
                        </div>
                        <progress-button :watched-episodes= "watched" :episode-id= "episode.id" ></progress-button>
                    </li>
                </ul>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from './../../Layouts/AppLayout';
import ProgressButton from './ProgressButton';
import ProgressBar from './ProgressBar';

export default {
    components: {
        AppLayout,
        ProgressButton,
        ProgressBar
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
        // console.log(this.watched)
    },

}
</script>
