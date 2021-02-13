require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('full-calendar-component', require('./components/FullCalendarComponent.vue').default);


var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!'
    }
})