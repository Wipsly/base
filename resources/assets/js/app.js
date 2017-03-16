
// Import JavaScript Dependencies
require('./bootstrap');

// Import Components
import { 
  HasError,
  AlertError,
  AlertErrors, 
  AlertSuccess
} from 'vform'

// Initializing Components
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.component(AlertErrors.name, AlertErrors)
Vue.component(AlertSuccess.name, AlertSuccess)

Vue.component('app-nav', require('./layouts/AppNav.vue'));


// Import Router
import router from './router'

const app = new Vue({
    el: '#app',
    router
});
