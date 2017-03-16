<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Security</div>
                    <div class="panel-body">
                        <form @submit.prevent="changePassword" class="form-horizontal">
                                <div class="form-group">
                                    <label for="password" class="col-md-2 control-label">Password</label>
                                    <div class="col-md-8">
                                        <input type="password" class="form-control" id="password" v-model="form.password">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import Form from './form'
    import errors from './errors'
    export default {
        data() {
            return {
                form: new Form({
                    password: ''
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            changePassword() {
                this.form.post('/api/changePassword')
                        .then(response => {
                            console.log(response.data)
                        })
            }
        }
    }
</script>
