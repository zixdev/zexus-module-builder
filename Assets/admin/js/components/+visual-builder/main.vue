<template>
    <div>
        <v-layout row wrap>
            <v-card class="portrait"
                    height="300px"
                    @contextmenu="show"></v-card>
        </v-layout>
        <v-menu offset-y v-model="showMenu" absolute :position-x="x" :position-y="y">
            <v-list>
                <v-list-tile v-for="action in actions" :key="action.name" @click="callAction(action)">
                    <v-list-tile-title>{{ action.title }}</v-list-tile-title>
                </v-list-tile>
            </v-list>
        </v-menu>
    </div>
</template>

<script type="text/babel">
    import Vue from 'vue';
    import Component from 'vue-class-component';
    import draggable from 'vuedraggable'


    @Component({
        components: {
            draggable
        }
    })
    export default class VisualBuilder extends Vue {

        showMenu = false;
        x = 0;
        y = 0;
        actions = [
            {
                title: 'Create Plugin',
                name: 'create.plugin',
            }
        ];
        items = [
            {title: 'Click Me'},
            {title: 'Click Me'},
            {title: 'Click Me'},
            {title: 'Click Me 2'}
        ];

        mounted() {


        }

        show(e) {
            e.preventDefault();
            this.showMenu = false;
            this.x = e.clientX;
            this.y = e.clientY;
            this.$nextTick(() => {
                this.showMenu = true
            })
        }

        callAction(action) {
            console.info(action)
        }


    }
</script>
<style lang="stylus" scoped>
    .portrait.card
        margin: 0 auto
        width: 100%
</style>