<script setup>
const form = useForm({});

function destroy(id) {
    if (confirm("Are you sure you want to delete this card?")) {
        form.delete(route("cards.destroy", id));
    }
}
</script>
<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Cards</h1>
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" :href="create_url">Create Card</a>
                    <table class="md:table-auto">
                        <thead>
                            <tr>
                            <th class="p-3 border border-slate-600">Id</th>
                            <th class="p-3 border border-slate-600">Card Number</th>
                            <th class="p-3 border border-slate-600">PIN</th>
                            <th class="p-3 border border-slate-600">Active Date</th>
                            <th class="p-3 border border-slate-600">Expiry Date</th>
                            <th class="p-3 border border-slate-600">Saldo</th>
                            <th class="p-3 border border-slate-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="card in cards.data" :key="card.id">
                                <td class="p-3 border border-slate-700">{{ card.id }}</td>   
                                <td class="p-3 border border-slate-700">{{ card.card_number }}</td>
                                <td class="p-3 border border-slate-700">{{ card.PIN }}</td>
                                <td class="p-3 border border-slate-700">{{ card.active_date }}</td>
                                <td class="p-3 border border-slate-700">{{ card.expiry_date }}</td>
                                <td class="p-3 border border-slate-700">{{ card.saldo }}</td>
                                <td class="p-3 border border-slate-700">
                                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" :href="card.show_url">Show</a>
                                    <a class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" :href="card.edit_url">Edit</a>
                                    <a class="ml-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" @click="destroy(card.id)">Delete</a>
                                </td>    
                            </tr>
                        </tbody>
                    </table>
                    <pagination :links="cards.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from '@/Shared/Pagination.vue'
import { useForm } from '@inertiajs/vue3'

export default {
components: {
    Pagination,
},
props: {
    cards: Object,
    create_url: String,
},
}
</script>