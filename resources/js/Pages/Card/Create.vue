<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardsCreate from '@/Components/CardsCreate.vue';
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cards Create</h2>
        </template>
        <Head title="Cards Create" />
        <CardsCreate />
    </AuthenticatedLayout>
</template>