import './bootstrap'

import { createApp } from 'vue'
import ReviewComponent from './components/Review.vue'
import ModalComponent from './components/Modal.vue'


createApp({
    components:{
        // router,
        ReviewComponent,
        ModalComponent
    }
}).mount('#app')
// Vue.use(VueRouter);
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
