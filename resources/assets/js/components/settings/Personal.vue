<template>
    <div class="panel panel-default">
        <div class="panel-heading">Personal</div>
        <div class="panel-body">
            <!-- Form -->
            <form @submit.prevent="updateUserPersonal" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
                <!-- Alerts -->
                <alert-success :form="form" message="Your personal settings have been updated."></alert-success>
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
                        <button :disabled="!filled || form.busy" type="submit" class="btn btn-primary">
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
                    name: null,
                    email: null
                })
            }
        },
        mounted() {
            axios.get('/api/getAuthUser')
                    .then(response => {
                                this.form.name = response.data.name
                                this.form.email = response.data.email
                        }
                    );
        },
        methods: {
            updateUserPersonal() {
                this.form.post('/api/updateUserPersonal')
                        .then(
                                this.$events.fire('updatedUserPersonal', this.form.name)
                        )
            }
        },
        computed: {
            filled() {
                return this.form.name != null && this.form.email != null
            }
        }
    }
</script>
