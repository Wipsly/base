
// Import JavaScript Dependencies
require('./bootstrap');

// Import Components
import { 
  HasError,
  AlertError,
  AlertErrors, 
  AlertSuccess
} from 'vform';

import {
    ClientTable
} from 'vue-tables-2';

import VueStash from 'vue-stash';
import VueEvents from 'vue-events';

Vue.use(ClientTable);
Vue.use(VueStash);
Vue.use(VueEvents);

// Initializing Components
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
Vue.component(AlertErrors.name, AlertErrors);
Vue.component(AlertSuccess.name, AlertSuccess);

// Navbar
Vue.component('app-nav', require('./layouts/AppNav.vue'));

// Import Router
import router from './router'
import store from './store'

const app = new Vue({
    el: '#app',
    data: { store },
    router
});
