<script setup>
import { useForm } from '@inertiajs/vue3'
const props = defineProps({ card: Object });
const form = useForm({
    card_number: props.card.card_number,
    PIN: props.card.PIN,
    active_date: props.card.active_date,
    expiry_date: props.card.expiry_date,
    saldo: props.card.saldo,
})
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Card #{{ card.id }}</h1>
                    <form class="grid grid-cols-2 gap-4" @submit.prevent="form.put(`/cards/${card.id}`)">
                        <!-- Card number -->
                        <label for="card_number">Card Number</label>
                        <input type="text" v-model="form.card_number" id="card_number">
                        <div v-if="form.errors.card_number">{{ form.errors.card_number }}</div>
                        <!-- PIN -->
                        <label for="PIN">PIN</label>
                        <input type="text" v-model="form.PIN" id="PIN">
                        <div v-if="form.errors.PIN">{{ form.errors.PIN }}</div>
                        <!-- Active date -->
                        <label for="active_date">Active Date</label>
                        <input type="datetime-local" v-model="form.active_date" id="active_date">
                        <div v-if="form.errors.active_date">{{ form.errors.active_date }}</div>
                        <!-- Expiry date -->
                        <label for="expiry_date">Expiry Date</label>
                        <input type="date" v-model="form.expiry_date" id="expiry_date">
                        <div v-if="form.errors.expiry_date">{{ form.errors.expiry_date }}</div>
                        <!-- Saldo -->
                        <label for="saldo">Saldo</label>
                        <input type="text" v-model="form.saldo" id="saldo">
                        <div v-if="form.errors.saldo">{{ form.errors.saldo }}</div>
                        <!-- submit -->
                        <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" type="submit" :disabled="form.processing">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>