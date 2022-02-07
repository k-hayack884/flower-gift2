import './bootstrap'


import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'


createApp({
    components:{
        ExampleComponent,
        CounterComponent,
        ReviewComponent
    }
}).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
