<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

const props = defineProps({
    documents: { type: Object }
})

const form = useForm({
    id: '',
})

const deleteDocument = (id, name) => {
    form.delete(route('documents.destroy', id))
    // console.log('id :>> ', id);
}

</script>

<template>
    <Head title="Documents" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Documents</h2>
        </template>

        <div class="py-12">
            <div class="bg-white grid v-screen place-items-center">
                <div class="mt-3 mb-3 flex">
                    <Link :href="route('documents.create')"
                        :class="'px-4 py-2 bg-gray-800 text-white border rounded-md font-semibold text-xs'">
                    Add
                    </Link>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <td class="px-4 py-4" scope="row">#</td>
                            <td class="px-4 py-4">Name</td>
                            <td class="px-4 py-4">Code</td>
                            <td class="px-4 py-4">Description</td>
                            <!-- <td class="px-4 py-4">Opciones</td> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(document, index) in documents" :key="document.id">
                            <td class="border border-gray-400 px-4 py-4" scope="row">{{ index + 1 }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ document.name }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ document.code }}</td>
                            <td class="border border-gray-400 px-4 py-4">{{ document.description }}</td>
                            <td class="border border-gray-400 px-4 py-4">
                                <Link :href="route('documents.edit', document.id)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                Edit
                                </Link>
                            </td>
                            <td class="border border-gray-400 px-4 py-4">
                                <DangerButton @click="deleteDocument(document.id, document.name)">
                                    Delete
                                </DangerButton>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
