<template>
    <div class="panel panel-default">
        <div class="panel-heading">Overview</div>
        <div class="panel-body">
            <div class="alert alert-info alert-dismissible" role="alert" v-if="deletedUser">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               {{ this.$route.params.deletedUser }} has been deleted.
            </div>
            <div id="users">
                <v-client-table :data="users" :columns="columns" :options="options" v-if="loaded"></v-client-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                loaded: false,
                columns: ['name', 'email', 'actions', 'roles'],
                options: {
                    highlightMatches: true,
                    texts: {
                        filter: 'Filter',
                        filterPlaceholder: 'Search',
                        limit: 'Records'
                    },
                    templates: {
                        actions: function(h, row) {
                            return <router-link to={{ name: 'users-edit', params: { id: row.id }}} class="btn btn-primary"><i class="fa fa-pencil"></i></router-link>
                        }
                    }
                }
            }
        },
        mounted() {
            console.log(this.$route.params)
            axios.get('/api/getAllUsers')
                    .then(response => {
                        this.users = response.data
                        this.loaded = true
                    });
        },
        computed: {
            deletedUser() {
                if (this.$route.params.deletedUser) {
                    return true
                }
            }
        }
    }
</script>
