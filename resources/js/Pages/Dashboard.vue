<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-green-200 text-green-500 p-3" v-if="$page.props.flash.success">
                    {{ $page.props.flash.success }}
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form action="#" method="POST" @submit.prevent="submit">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <div class="px-4 py-3 bg-white sm:p-6">
                                <div class="mb-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Titre de la formation</label>
                                    <input type="text" name="title" id="title" v-model="form.title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    <div class="bg-red-200 text-red-800 p-3 my-2" v-if="errors.title">{{ errors.title }}</div>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Description de la formation</label>
                                    <textarea type="text" name="description" id="description" v-model="form.description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                                    <div class="bg-red-200 text-red-800 p-3 my-2" v-if="errors.description">{{ errors.description }}</div>
                                </div>
                                <div>
                                    <h2 class="text-2xl">Episode de la formation</h2>
                                    <div v-for="(episode, index) in form.episodes" :key="episode.id">
                                        <label :for="'title-' + index" class="block text-sm font-medium text-gray-700 mt-2">
                                            Titre de l'episode n°{{index + 1}}
                                        </label>
                                        <input type="text" name="title" :id="'id-' + index" v-model="form.episodes[index].title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="bg-red-200 text-red-800 p-3 my-2" v-if="errors['episodes.'+index+'.title']">{{ errors['episodes.'+index+'.title'] }}</div>
                                        <label :for="'description-' + index" class="block text-sm font-medium text-gray-700 mt-2">
                                            Description de l'episode n°{{index + 1}}
                                        </label>
                                        <input type="text" name="description" :id="'id-' + index" v-model="form.episodes[index].description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="bg-red-200 text-red-800 p-3 my-2" v-if="errors['episodes.'+index+'.description']">{{ errors['episodes.'+index+'.description'] }}</div>
                                        <label :for="'video_url-' + index" class="block text-sm font-medium text-gray-700 mt-2">
                                            Url de la vidéo de l'episode n°{{index + 1}}
                                        </label>
                                        <input type="text" name="video_url" :id="'id-' + index" v-model="form.episodes[index].video_url" class="mb-4 mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        <div class="bg-red-200 text-red-800 p-3 my-2" v-if="errors['episodes.'+index+'.video_url']">{{ errors['episodes.'+index+'.video_url'] }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 pb-2 bg-gray-50 sm:px-6">
                                <div class="block">
                                    <button class="bg-green-600 rounded py-2 px-4 text-white mb-2" v-if="form.episodes.length < 15" @click.prevent="add">+</button>
                                    <button class="bg-red-600 rounded py-2 px-4 text-white  mb-2" v-if="form.episodes.length > 1" @click.prevent="remove">🗑️</button>
                                </div>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Créer la formation
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        props: {
            errors: Object,
        },

        data() {
            return {
                form : {
                    title : null,
                    description : null,
                    episodes : [
                        {title : null, description : null, video_url: null}
                    ]
                }
            }
        },

        methods: {
            submit() {
            this.$inertia.post('/courses', this.form)
            },

            add() {
                this.form.episodes.push({title : null, description : null, video_url: null})
            },

            remove() {
                this.form.episodes.pop()
            }
        },

        mounted() {
            //
        },
    }
</script>
