<template>
    <div class="panel panel-default">
        <div class="panel-heading">Security</div>
        <div class="panel-body">
            <form @submit.prevent="changePassword" class="form-horizontal">
                <alert-success :form="form" message="Your password has been updated."></alert-success>
                <alert-error :form="form"></alert-error>
                <div class="form-group" :class="{ 'has-error': form.errors.has('password') }">
                    <label for="password" class="col-md-2 control-label">Password</label>
                    <div class="col-md-8">
                        <input type="password" class="form-control" id="password" v-model="form.password">
                        <has-error :form="form" field="password"></has-error>
                    </div>
                </div>
                <div class="form-group">                                    
                    <div class="col-md-10 col-md-offset-2">
                        <button :disabled="form.busy" type="submit" class="btn btn-primary">
                            <i v-if="form.busy" class="fa fa-fw fa-spinner fa-spin"></i>
                            <i v-else class="fa fa-fw fa-refresh"></i>
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new Form({
                    password: null
                })
            }
        },
        methods: {
            changePassword() {
                this.form.post('/api/updateUserSecurity')
                        .then(response => console.log(response.data));
            }
        }
    }
</script>
