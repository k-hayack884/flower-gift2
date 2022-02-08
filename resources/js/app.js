import './bootstrap'


import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'
import ModalComponent from './components/Modal.vue'


createApp({
    components:{
        ExampleComponent,
        CounterComponent,
        ReviewComponent,
        ModalComponent
    }
}).mount('#app')

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
