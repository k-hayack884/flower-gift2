import './bootstrap'

import { createApp } from 'vue'
import Counter from './components/Counter.vue'
Vue.createApp(Counter).mount('#app')

createApp({
    components: {
        Counter
    }
}).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
