<script>
import { Link } from '@inertiajs/vue3';

export default {
    data: () => ({
        drawer: null,
        links: [
            ['mdi-inbox-arrow-down', 'Mi Música'],
            ['mdi-send', 'Cerrar Sesión'],
        ],
    }),

    components: {
        Link
    }
}
</script>

<template>
    <v-app id="inspire">

        <v-navigation-drawer v-model="drawer" theme="dark">

            <v-list>
                <v-list-item prependIcon="mdi-car-back">
                    <Link :href="route('coche-index')" class="text-white text-decoration-none">Mis coches
                    </Link>
                </v-list-item>
                <v-list-item prependIcon="mdi-car-2-plus">
                    <Link :href="route('coche-create')" class="text-white text-decoration-none">Añadir coche
                    </Link>
                </v-list-item>
                <v-list-item prependIcon="mdi-logout">
                    <Link :href="route('logout')" class="text-white text-decoration-none" method="post" as="button">
                    Cerar Sesión
                    </Link>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main>
            <v-system-bar class="pb-6 pt-6" color="grey-darken-4">
                <v-spacer></v-spacer>
                {{ $page.props.auth.user.name }}
            </v-system-bar>
            <v-container class="py-8 px-6" fluid>
                <v-row>
                    <slot></slot>
                </v-row>
            </v-container>
        </v-main>
    </v-app>

</template>
