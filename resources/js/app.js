require('./bootstrap');

window.Vue = require('vue').default;
import StripeForm from './components/StripeForm.vue'
Vue.component('stripe-form', StripeForm)

const app = new Vue({
    el: '#app',
});
