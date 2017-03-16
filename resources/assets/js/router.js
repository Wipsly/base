import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/dashboard',
            name: 'dashboard',
            component: require('./components/dashboard/DashboardWrapper.vue')
        },
        {
            path: '/settings',
            name: 'settings',
            component: require('./components/settings/SettingsWrapper.vue'),
            children: [
                {
                    path: 'personal',
                    name: 'settings-personal',
                    component: require('./components/settings/Personal.vue')
                },
                {
                    path: 'security',
                    name: 'settings-security',
                    component: require('./components/settings/Security.vue')
                }
            ]
        }
    ]
})

export default router
