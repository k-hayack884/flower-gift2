import './bootstrap'

import { createApp } from 'vue'
import Counter from './components/Counter.vue'
// import deleteButton  from './components/delete-button.vue'
Vue.createApp(Counter).mount('#app')
// Vue.createApp(deleteButton).mount('#hoge')

createApp({
    components: {
        Counter,
        // deleteButton
    }
}).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
