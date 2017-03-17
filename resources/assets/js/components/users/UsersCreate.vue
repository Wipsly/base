<template>
    <div class="panel panel-default">
        <div class="panel-heading">Create User</div>
        <div class="panel-body">
            <!-- Form -->
            <form @submit.prevent="createUser" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
                <!-- Alerts -->
                <alert-success :form="form" :message="message"></alert-success>
                <alert-error :form="form"></alert-error>
                <!-- Name -->
                <div class="form-group" :class="{ 'has-error': form.errors.has('name') }">
                    <label for="name" class="col-md-2 control-label">Name</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="name" v-model="form.name">
                        <has-error :form="form" field="name"></has-error>
                    </div>
                </div>
                <!-- Email -->
                <div class="form-group" :class="{ 'has-error': form.errors.has('email') }">
                    <label for="name" class="col-md-2 control-label">Email</label>
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="email" v-model="form.email">
                        <has-error :form="form" field="email"></has-error>
                    </div>
                </div>
                <!-- Submit -->
                <div class="form-group">
                    <div class="col-md-10 col-md-offset-2">
                        <button :disabled="form.busy" type="submit" class="btn btn-primary">
                            <i v-if="form.busy" class="fa fa-fw fa-spinner fa-spin"></i>
                            <i v-else class="fa fa-fw fa-plus"></i>
                            Create User
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
                    name: null,
                    email: null
                }),
                message: ''
            }
        },
        methods: {
            createUser() {
                this.form.post('/api/createUser')
                        .then(response => {
                            console.log(response.data)
                            this.message = response.data.name
                            this.form.reset()
                        });
            }
        }
    }
</script>
