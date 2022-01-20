import './bootstrap'

import { createApp } from 'vue'
import Counter from './components/Counter.vue'
// import deleteButton  from './components/delete-button.vue'

if (document.getElementById('counter')){
    Vue.createApp(Counter).mount('#counter')
}

// createApp({
//     components: {
//         Counter,
//         // deleteButton
//     }
// }).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
