require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('full-calendar-component', require('./components/FullCalendarComponent.vue').default);
Vue.component('student-search-component', require('./components/StudentSearchComponent.vue').default);


var app = new Vue({
    el: '#app',
})