<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from '@/Components/DangerButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref, watch, defineProps } from "vue";
import Swal from 'sweetalert2'

const props = defineProps({
    documents: { type: Object },
})

const search = ref('')
const formSearch = useForm({})
const form = useForm({
    search: '',
})

watch(search, (value) => {
    formSearch.get(route('documents.index', { search: value }), {
        preserveState: true,
        replace: true
    })
})

const deleteDocument = async (id, name) => {
    const alert = Swal.mixin({
        buttonsStyling: true,
    })

    const result = await alert.fire({
        title: `Are you sure delete ${name}`,
        icon: 'question',
        showCancelButton: true,
        confirmButtonText: "Yes, Delete",
        cancelButtonText: "Cancal"
    })

    if (result.isConfirmed) {
        form.delete(route('documents.destroy', id))
    }
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
            <div class="bg-white grid v-screen place-items-end">
                <div class="mt-3 mb-3 flex">
                    <TextInput id="search" v-model="search" class="mt-1 block w-full" autofocus required type="text"
                        placeholder="Search">
                    </TextInput>
                </div>
            </div>
            <div class="bg-white grid v-screen place-items-center">
                <table class="table-auto border border-gray-400">
                    <thead>
                        <tr class="bg-gray-100">
                            <td class="px-2 py-2" scope="row">#</td>
                            <td class="px-2 py-2">Name</td>
                            <td class="px-2 py-2">Code</td>
                            <td class="px-2 py-2">Description</td>
                            <td class="px-2 py-2">Process Name</td>
                            <td class="px-2 py-2">Type Document</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(document, index) in documents" :key="document.id">
                            <td class="border border-gray-400 px-2 py-2" scope="row">{{ index + 1 }}</td>
                            <td class="border border-gray-400 px-2 py-2">{{ document.name }}</td>
                            <td class="border border-gray-400 px-2 py-2">{{ document.code }}</td>
                            <td class="border border-gray-400 px-2 py-2">{{ document.description }}</td>
                            <td class="border border-gray-400 px-2 py-2">{{ document.process.name }}</td>
                            <td class="border border-gray-400 px-2 py-2">{{ document.type_document.name }}</td>
                            <td class="border border-gray-400 px-2 py-2">
                                <Link :href="route('documents.edit', document.id)"
                                    :class="'px-4 py-2 bg-yellow-400 text-white border rounded-md font-semibold text-xs'">
                                Edit
                                </Link>
                            </td>
                            <td class="border border-gray-400 px-2 py-2">
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
