<script setup>
defineProps({ card: Object });
</script>

<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1>Card Show #{{card.id}}</h1>
                    <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150" :href="card.edit_url">Edit</a>
                    <div class="grid grid-cols-2 gap-4">
                        <div>Card Number</div>
                        <div>{{ card.card_number }}</div>
                        <div>PIN</div>
                        <div>{{ card.PIN }}</div>
                        <div>Active Date</div>
                        <div>{{ card.active_date }}</div>
                        <div>Expiry Date</div>
                        <div>{{ card.expiry_date }}</div>
                        <div>Saldo</div>
                        <div>{{ card.saldo }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>