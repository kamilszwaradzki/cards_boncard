<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardsEdit from '@/Components/CardsEdit.vue';
defineProps({ card: Object });
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cards Edit</h2>
        </template>
        <Head title="Cards Edit" />
        <CardsEdit :card="card" />
    </AuthenticatedLayout>
</template>