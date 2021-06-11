require('./bootstrap');

import Vue from 'vue'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mail-component', require('./components/MailComponent.vue').default);

const app = new Vue({
    el: '#app',
});
