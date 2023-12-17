<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import CardsList from '@/Components/CardsList.vue';
defineProps({ cards: Object, create_url: String });
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Cards Index</h2>
        </template>
        <Head title="Cards Index" />
        <CardsList :cards="cards" :create_url="create_url" />
    </AuthenticatedLayout>
</template>