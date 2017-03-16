<template>
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <div class="panel panel-default panel-flush">
                    <div class="panel-heading">
                    Settings
                    </div>
                    <div class="panel-body">
                        <div class="spark-settings-tabs">
                            <ul class="nav spark-settings-stacked-tabs">
                                <router-link tag="li" :to="{ name: 'settings-personal' }">
                                    <a><i class="fa fa-fw fa-btn fa-user"></i> Personal</a>
                                </router-link>
                                <router-link tag="li" :to="{ name: 'settings-security' }">
                                    <a><i class="fa fa-fw fa-btn fa-lock"></i> Security</a>
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
