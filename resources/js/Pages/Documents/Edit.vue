<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import SelectInput from '@/Components/SelectInput.vue';
import { Head, useForm } from '@inertiajs/vue3';

const props = defineProps({
    document: { type: Object },
    typeDocuments: { type: Object },
    processes: { type: Object }
})

const form = useForm({
    name: props.document.name,
    description: props.document.description,
    type_document_id: props.document.type_document_id,
    process_id: props.document.process_id,
})
</script>

<template>
    <Head title="Edit Document" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Document</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form @submit.prevent="form.patch(route('documents.update', document))" class="mt-6 space-y-6 max-w-xl">
                        <!-- Name -->
                        <InputLabel for="name" value="Name:"></InputLabel>
                        <TextInput id="name" v-model="form.name" class="mt-1 block w-full" autofocus required type="text"
                            placeholder="Name">
                        </TextInput>
                        <InputError :message="form.errors.name" class="mt-2"></InputError>
                        <!-- Description -->
                        <InputLabel for="name" value="Description:"></InputLabel>
                        <TextArea id="description" v-model="form.description" class="mt-1 block w-full" autofocus required
                            placeholder="Description"></TextArea>
                        <InputError :message="form.errors.description" class="mt-2"></InputError>
                        <!-- Type Document -->
                        <InputLabel for="name" value="Type Document:"></InputLabel>
                        <SelectInput id="type_document_id" :options="typeDocuments" v-model="form.type_document_id"
                            class="mt-1 block w-full"></SelectInput>
                        <InputError :message="form.errors.type_document_id" class="mt-2"></InputError>
                        <!-- Process -->
                        <InputLabel for="name" value="Process:"></InputLabel>
                        <SelectInput id="process_id" :options="processes" class="mt-1 block w-full"
                            v-model="form.process_id"></SelectInput>
                        <InputError :message="form.errors.process_id" class="mt-2"></InputError>

                        <PrimaryButton :disabled="form.processing">Save</PrimaryButton>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
