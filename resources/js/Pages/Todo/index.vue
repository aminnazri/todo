<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { router } from "@inertiajs/vue3";
defineProps({
    todos: Array,
});


</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                todo
            </h2>
        </template>

        <div class="py-12 bg-white">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!-- <Welcome /> -->
                    <!-- <table id="myTable" class="display min-w-full border text-center text-sm font-light dark:border-neutral-500 ">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col"
                                    class="data-priority='1'' px-1 py-4 border border-slate-300 bg-neutral-200">No.</th>
                                <th scope="col"
                                    class=" px-12 py-4 border border-slate-300 bg-neutral-200">Senarai</th>
                                <th scope="col"
                                    class="px-12 py-4 border border-slate-300 bg-neutral-200 ">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr class="px-12 py-3 border border-slate-300 " v-for="(todo, index) in todos" :key="index">
                                <td class="border border-slate-300">{{ index+1 }}</td>
                                <td class="px-12 py-3 border border-slate-300 text-left">
                                    {{ todo.task }}
                                    <br>
                                    {{ todo.description }}
                                    
                                </td>
                                
                                <td class="border border-slate-300">
                                    {{ todo.status }}
                                </td>
                            </tr>
                        </tbody>
                    </table> -->

                    <div >
                        <h1 class="H1">Tasks</h1>
                        <div v-for="(todo, index) in todos" :key="index" >
                            <div v-if="!todo.status==1"  class="bg-slate-100 rounded-xl p-3 dark:bg-slate-100 flex m-2"  >
                                <div class=" m-2 ">
                                <input id="default-checkbox"  type="checkbox" :checked="todo.status == 1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">                        

                                </div>
                                <div class=" space-y-4 m-2">
                                    
                                    <p class="text-m font-small">
                                        {{ todo.task }}
                                    </p>
                                </div>
                            </div>                                          
                        </div>
                       
                    </div>
                    
                    <figure >
                        <h3>completed</h3>
                        <div v-for="(todo, index) in todos" :key="index" >
                            <div v-if="todo.status==1"  class="bg-slate-100 rounded-xl p-3 dark:bg-slate-100 flex m-2"  >
                                <div class=" m-2 ">
                                <input id="default-checkbox"  type="checkbox" :checked="todo.status == 1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">                        

                                </div>
                                <div class=" space-y-4 m-2">
                                    
                                    <p class="text-m font-small">
                                        {{ todo.task }}
                                    </p>
                                </div>
                            </div>                                          
                        </div>
                       
                    </figure>
                    
                </div>


            </div>
        </div>
    </AppLayout>
</template>