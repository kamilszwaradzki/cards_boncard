<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardsShow from '@/Components/CardsShow.vue';
defineProps({ card: Object });
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cards Show</h2>
        </template>
        <Head title="Cards Show" />
        <CardsShow :card="card" />
    </AuthenticatedLayout>
</template>