<template>
    <div class="panel panel-default">
        <div class="panel-heading">Overview</div>
        <div class="panel-body">
            <div id="users">
                <v-client-table :data="users" :columns="columns" v-if="loaded"></v-client-table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                loaded: false,
                users: null,
                columns: ['name', 'email']
            }
        },
        mounted() {
            axios.get('/api/getAllUsers')
                    .then(response => {
                        this.users = response.data
                        this.loaded = true
                    });
        },
    }
</script>
