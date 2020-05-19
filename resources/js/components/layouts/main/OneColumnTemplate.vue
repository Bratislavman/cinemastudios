<template>
    <div>
        <header-component/>

        <navigation-drawer :showMenu="showMenu"/>

        <v-content>
            <v-container
                fluid
                fill-height
            >
                <v-layout
                    align-center
                    justify-center
                >
                    <slot/>
                </v-layout>
            </v-container>
        </v-content>

        <footer/>
    </div>
</template>

<script>
    import NavigationDrawer from "./NavigationDrawer";
    import Header from "./Header";
    import Footer from "./Footer";

    export default {
        data: function () {
            return {
                showMenu: false
            }
        },
        methods: {
            changeShowMenu: function () {
                this.showMenu = !this.showMenu;
            }
        },
        components: {
            NavigationDrawer,
            headerComponent: Header,
            Footer
        },
        provide: function() {
            return {
                changeShowMenu: this.changeShowMenu
            };
        },
    }
</script>
