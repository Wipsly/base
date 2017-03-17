<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default panel-flush">
                    <div class="panel-heading">
                        Users
                    </div>
                    <div class="panel-body">
                        <div class="spark-settings-tabs">
                            <ul class="nav spark-settings-stacked-tabs">
                                <router-link tag="li" :to="{ name: 'users-index' }">
                                    <a><i class="fa fa-fw fa-btn fa-list"></i> Overview</a>
                                </router-link>
                                <router-link tag="li" :to="{ name: 'users-create' }">
                                    <a><i class="fa fa-fw fa-btn fa-plus"></i> Create User</a>
                                </router-link>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
