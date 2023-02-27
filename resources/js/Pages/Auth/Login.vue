<script setup>
import Auth from '@/Layouts/Auth.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import BtnPrimary from '@/Components/BtnPrimary.vue'

const form = useForm({

    email: '',
    password: '',

});

const submit = () => {

    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head>Login</Head>

    <Auth>
        <v-card theme="dark" class="cartaAuth" id="cartaRegistro">
            <v-container>
                <v-card-title class="text-cyan-accent-2 mt-3">BIENVENIDO A MUSIC WORLD</v-card-title>
                <v-form @submit.prevent="submit">


                    <TextInput id="email" label="Correo electronico" type="email" v-model="form.email" required />
                    <!-- <InputError :message="form.errors.email" /> -->

                    <TextInput id="password" label="Contraseña" type="password" v-model="form.password" required />
                    <!-- <InputError :message="form.errors.password" /> -->


                    <v-card-actions>
                        <div class="flex items-center justify-end">
                            <Link :href="route('register')" class="text-decoration-none text-cyan-accent-2">
                            ¿Aún no estás registrado?
                            </Link>

                            <BtnPrimary class="ml-4 bg-cyan-accent-2" :class="{ 'opacity-25': form.processing }"
                                id="btnRegistro" :disabled="form.processing">
                                Login
                            </BtnPrimary>
                        </div>
                    </v-card-actions>
                </v-form>
            </v-container>
        </v-card>
    </Auth>
</template>
