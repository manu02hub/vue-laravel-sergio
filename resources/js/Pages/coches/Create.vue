<script setup>
import Admin from '@/Layouts/Admin.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import BtnPrimary from '@/Components/BtnPrimary.vue'

const form = useForm({
    modelo: '',
    marca: '',
});

const submit = () => {
    form.post(route('coche-store'));
};
</script>

<template>
    <Head title="Create" />

    <Admin>
        <v-col cols="lg-12 md-12 sm-12">
            <v-card theme="dark" class="cartaAuth" id="cartaRegistro">
                <v-container>
                    <v-card-title class="text-cyan-accent-2 mt-3">BIENVENIDO A MUSIC WORLD</v-card-title>
                    <v-form @submit.prevent="submit">
                        <TextInput id="modelo" label="Modelo coche" type="text" v-model="form.modelo" required autofocus />

                        <TextInput id="marca" label="Marca coche" type="text" v-model="form.marca" required />

                        <v-card-actions>
                            <div class="flex items-center justify-end">
                                <BtnPrimary class="ml-4 bg-cyan-accent-2" :class="{ 'opacity-25': form.processing }"
                                    id="btnRegistro" :disabled="form.processing">
                                    Agregar
                                </BtnPrimary>
                            </div>
                        </v-card-actions>
                    </v-form>
                </v-container>
            </v-card>
        </v-col>
    </Admin>
</template>
