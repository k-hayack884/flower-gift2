import './bootstrap'


import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import CounterComponent from './components/Counter.vue'


createApp({
    components:{
        ExampleComponent,
        CounterComponent
    }
}).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
