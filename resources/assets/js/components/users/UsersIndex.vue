<template>
    <div class="panel panel-default">
        <div class="panel-heading">Overview</div>
        <div class="panel-body">
            <div class="alert alert-info"> {{ user }}</div>
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
                user: null,
                loaded: false,
                users: null,
                columns: ['name', 'email', 'actions'],
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
            this.$events.listen('userDeleted', form => {
                console.log(form.name)
                this.user = form.name
            })

            axios.get('/api/getAllUsers')
                    .then(response => {
                        this.users = response.data
                        this.loaded = true
                    });
        }
    }
</script>
