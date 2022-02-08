import './bootstrap'

import router from "./routes";
import VueRouter from "vue-router";


import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'
import ModalComponent from './components/Modal.vue'


createApp({
    components:{
        // router,
        ExampleComponent,
        CounterComponent,
        ReviewComponent,
        ModalComponent
    }
}).mount('#app')
// Vue.use(VueRouter);
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
