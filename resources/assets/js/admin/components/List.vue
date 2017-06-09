<template>
    <div class="list">
        <div class="row">
            <div class="col-xs-12">
                <a href="#" @click="toggleFilters">
                    <i class="material-icons">filter_list</i>
                </a>
                <a href="#" @click="toggleSorting">
                    <i class="material-icons">sort</i>
                </a>
            </div>
        </div>
        <div class="filters row" v-if="showFilters">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        We are the filters
                    </div>
                </div>
            </div>
        </div>
        <div class="filters row" v-if="showSorting">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-12">
                        We are the sorting methods
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ul class="list-group">
                    <li v-if="items.length" class="list-group-item justify-content-between" v-for="item in items">
                        {{ item.designation }}
                        <span class="pull-right">
                            <a :href="item.action_routes.update">
                            <i class="material-icons">mode_edit</i>
                            </a>
                        </span>
                        <span class="pull-right">
                            <a :href="item.action_routes.show">
                            <i class="material-icons">chevron_right</i>
                            </a>
                        </span>
                        <span class="pull-right">
                            <form :id="'delete-form-' + item.id" :action="item.action_routes.destroy" method="POST">
                            <input type="hidden" name="_token" :value="token">
                            <input type="hidden" name="_method" value="DELETE">
                            <a @click="deleteItem(item.id)"><i class="material-icons">delete_forever</i></a>
                            </form>
                        </span>
                    </li>
                    <li v-else class="list-group-item justify-content-between">
                    There are no {{ resource }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [
            'items',
            'resource',
            'token'
        ],
        data () {
            return {
                showFilters: false,
                showSorting: false
            }
        },
        computed: {

        },
        methods: {
            toggleFilters () {
                this.showFilters = !this.showFilters
            },
            toggleSorting () {
                this.showSorting = !this.showSorting
            },
            getFormId (itemId) {
                return 'delete-form-' + itemId
            },
            deleteItem (itemId) {
                document.getElementById('delete-form-' + itemId).submit()
            }
        },
        mounted() {
            console.log('List')
        }
    }
</script>
