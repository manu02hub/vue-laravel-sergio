<script setup>
import Admin from '@/Layouts/Admin.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <Admin>

        <v-container>
            <v-row>
                <v-col cols="lg-3 md-4 sm-6">
                    <v-card theme="dark" class="mt-8" v-for="coche in $page.props.coches">

                        <v-card-title>
                            {{ coche.modelo }}
                        </v-card-title>

                        <v-card-subtitle>
                            Marca: {{ coche.marca }}
                        </v-card-subtitle>

                        <v-card-actions>
                            <v-btn prepend-icon="mdi-pencil" color="yellow" size="small">
                                <Link :href="route('coche-edit', coche.id)" class="text-decoration-none text-yellow">
                                edit
                                </Link>
                            </v-btn>
                            <v-btn prepend-icon="mdi-delete" color="red-accent-4" size="small">
                                <Link :href="route('coche-destroy', coche.id)"
                                    class="text-decoration-none text-red-accent-4">
                                delete
                                </Link>
                            </v-btn>

                        </v-card-actions>
                    </v-card>
                </v-col>
            </v-row>
        </v-container>
    </Admin>
</template>
