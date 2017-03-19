<template>
    <div class="panel panel-default">
        <div class="panel-heading">Create User</div>
        <div class="panel-body">
            <!-- Modal -->
            <modal ref="theModal">
                <div slot="title">
                    Are your sure?
                </div>
                <div slot="body">
                    Your subscription will be increased by one.
                </div>
                <div slot="footer">
                    <div class="btn btn-danger" @click="no">No</div>
                    <div class="btn btn-primary" @click="yes">Yes</div>
                </div>
            </modal>
            <!-- Notice -->
            <div class="alert alert-dismissible alert-info" v-if="notice">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                <strong>Heads up!</strong> This <a href="#" class="alert-link">alert needs your attention</a>, but it's not super important.
            </div>
            <!-- Form -->
            <form @submit.prevent="openTheModal" @keydown="form.errors.clear($event.target.name)" class="form-horizontal">
                <!-- Alerts -->
                <alert-success :form="form" :message="message + ' has been created.'"></alert-success>
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
    import modal from 'vue2-bootstrap-modal'
    export default {
        data() {
            return {
                form: new Form({
                    name: null,
                    email: null
                }),
                message: null,
                notice: true
            }
        },
        methods: {
            openTheModal() {
                this.$refs.theModal.open()
            },
            yes() {
                this.$refs.theModal.close()
                this.form.post('/api/createUser')
                        .then(response => {
                            console.log(response.data)
                            this.message = response.data.name
                            this.form.reset()
                            this.notice = false
                        })
                        .catch(error => {
                            this.$refs.theModal.close()
                        });
            },
            no() {
                this.$refs.theModal.close()
            }
        },
        computed: {
            filled() {
                return this.form.name != null && this.form.email != null
            }
        },
        components: {
            modal
        }
    }
</script>
