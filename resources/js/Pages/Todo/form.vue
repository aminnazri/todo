<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import {useForm} from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    todo: {
        type: Object,
        default: null
    }
});

const form = useForm({
    task: props.todo ? props.todo.task : null,
    description: props.todo ? props.todo.description : null,
    status: props.todo ? props.todo.status : null
});
// const form = useForm({
//     task: null,
//     description: null,
// });

function submit(){
    props.todo ? form.put("/" + props.todo.id) : form.post("/");
}
const weekday = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
const date = new Date();


</script>



<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-100 leading-tight bg-gray-900 p-4 rounded">
                My Day - {{ weekday[date.getDay()]}} , {{ date.getDate()}} {{ month[date.getMonth()]}}
            </h2>
        </template>
        
        <div class="py-12 bg-white-10 w-50">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 m-2">
                    
                    <form @submit.prevent="form.post('/')">
                        <!-- task title -->
                        <div>
                            <InputLabel for="task" value="Task" />
                            <TextInput type="text" id="task"
                                v-model="form.task"
                                class="mt-1 block w-full" 
                                
                            />
                            <div v-if="form.errors.task">
                                {{ form.errors.task }}
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mt-4">
                            <InputLabel for="name" value="Description" />
                            <textarea
                                v-model="form.description"
                                type="text"
                                class="mt-1 block w-full rounded border-gray-400 border-1"
                                
                            ></textarea>
                            
                            <div v-if="form.errors.description">
                                {{ form.errors.description }}
                            </div>
                        </div>

                        <!-- submit -->
                        <div class="flex items-center justify-end mt-4">
                            <PrimaryButton @click="submit()" type="submit" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                {{ todo ? "Update" : "Add Task" }}
                            </PrimaryButton>
                        </div>

                    </form>
                </div>
                
            </div>
        </div>
    </AppLayout>
</template>