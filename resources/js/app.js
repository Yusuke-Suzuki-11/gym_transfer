require('./bootstrap');
window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('full-calendar-component', require('./components/FullCalendarComponent.vue').default);
Vue.component('student-search-component', require('./components/StudentSearchComponent.vue').default);
Vue.component('student-transfer-select-component', require('./components/StudentTransferSelectComponent.vue').default);
Vue.component('select-lesson-calendar', require('./components/SelectLessonCalendar.vue').default);


var app = new Vue({
    el: '#app',
})