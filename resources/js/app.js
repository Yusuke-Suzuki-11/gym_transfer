require('./bootstrap');
window.Vue = require('vue').default;

import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import ShowListComponent from './components/ShowListComponent.vue'
import CalendarComponent from './components/CalendarComponent.vue'

createApp({
	components: {
		ExampleComponent,
		ShowListComponent,
		CalendarComponent

	}
}).mount('#app')


// Vue.component('show-list-component', require('./components/ShowListComponent.vue').default);


// var app = new Vue({
// 	el: '#app',
// 	data: {
// 		message: 'Hello Vue!'
// 	}
// })