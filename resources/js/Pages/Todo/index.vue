<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Menu, MenuButton, MenuItem, MenuItems } from '@headlessui/vue'
import { ChevronDownIcon } from '@heroicons/vue/20/solid'
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Head, Link, router, useForm } from '@inertiajs/vue3';


defineProps({
    todos: Array,
});
function padam(senarai) {
    router.delete(route("todos.delete", senarai));
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
        
        <div class="py-6 bg-white-100">
            
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <!-- <PrimaryButton class="ml-4 bg-dark-600" > -->
                    <button class="rounded bg-black p-2 text-white ">
                        <Link :href="route('todos.addtask')" >
                            Add Task
                        </Link>
                    </button>
                    
                    
                <!-- </PrimaryButton> -->

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4 mt-2">
                    <div >
                        <h1 class="H1">Tasks</h1>
                        <div v-for="(todo, index) in todos" :key="index" >
                            <div v-if="!todo.status==1"  class="bg-slate-100 rounded-xl p-3 dark:bg-slate-100 m-2 flex justify-between"  >
                                <div class="flex ">
                                    <div class=" m-2 ">
                                        <input id="default-checkbox"  type="checkbox" :checked="todo.status == 1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded   dark:ring-offset-gray-800 focus:ring-0 dark:bg-gray-700 dark:border-gray-600">                        

                                    </div>
                                    <div class=" space-y-2 m-2">
                                        
                                        <p class="text-base/ ">
                                            {{ todo.task }}
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            {{ todo.description }}
                                        </p>
                                    </div>
                                </div>
                                <!-- dropdown -->
                                <div>
                                    <Menu as="div" class="relative inline-block text-left">
                                        <div>
                                            <MenuButton class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-2 py-2 text-sm font-semibold text-black shadow-sm ring-0 ring-inset ring-gray-300 hover:bg-gray-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                </svg>

                                                <!-- <ChevronDownIcon class="-mr-1 h-5 w-5 text-black" aria-hidden="true" /> -->
                                            </MenuButton>
                                        </div>

                                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems class="absolute right-0 z-10 mt-2  origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1">
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit</a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']" @click="padam(todo)" >Delete</a>
                                                    </MenuItem>
                                                </div>
                                            </MenuItems>
                                        </transition>
                                    </Menu>
                                </div>
                                
                            </div>                                          
                        </div>
                       
                    </div>
                    
                    <figure >
                        <h3>completed</h3>
                        <div v-for="(todo, index) in todos" :key="index" >
                            <div v-if="todo.status==1"  class="bg-slate-100 rounded-xl p-3 dark:bg-slate-100 m-2 flex justify-between"  >
                                <div class="flex ">
                                    <div class=" m-2 ">
                                        <input id="default-checkbox"  type="checkbox" :checked="todo.status == 1" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-400 rounded  dark:ring-offset-gray-800 focus:ring-0 dark:bg-gray-700 dark:border-gray-600">                        

                                    </div>
                                    <div class=" space-y-2 m-2">
                                        
                                        <p class="text-base font-small">
                                            {{ todo.task }}
                                        </p>
                                        <p class="text-sm text-gray-700">
                                            {{ todo.description }}
                                        </p>
                                    </div>
                                </div>
                                <!-- dropdown -->
                                <div>
                                    <Menu as="div" class="relative inline-block text-left">
                                        <div>
                                            <MenuButton class="inline-flex w-full justify-center gap-x-1.5 rounded-md  px-2 py-2 text-sm font-semibold text-black shadow-sm ring-0 ring-inset ring-gray-300 hover:bg-gray-50">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                                </svg>

                                                <!-- <ChevronDownIcon class="-mr-1 h-5 w-5 text-black" aria-hidden="true" /> -->
                                            </MenuButton>
                                        </div>

                                        <transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
                                            <MenuItems class="absolute right-0 z-10 mt-2  origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                                                <div class="py-1">
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">Edit</a>
                                                    </MenuItem>
                                                    <MenuItem v-slot="{ active }">
                                                        <a href="#" :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']" @click="padam(todo)" >Delete</a>
                                                    </MenuItem>
                                                </div>
                                            </MenuItems>
                                        </transition>
                                    </Menu>
                                </div>
                                
                            </div>                                       
                        </div>
                       
                    </figure>
                    
                </div>
                
                


            </div>
        </div>
    </AppLayout>
</template>