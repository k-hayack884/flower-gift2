import './bootstrap'

import { createApp } from 'vue'
import ReviewComponent from './components/Review.vue'
import FlashmessageComponent from './components/Flashmessage.vue'
import FavoriteComponent from './components/Favorite.vue'
import ModalComponent from './components/Modal.vue'
createApp({
    components:{
        ReviewComponent,
        ModalComponent
    }
}).mount('#app')
createApp({
    components:{
        FavoriteComponent,
        
    }
}).mount('#api')
createApp({
    components:{
        FlashmessageComponent
    }
}).mount('#flash')

// //data() {
//     return {
//         info: null
//       };
//     },

// import Alpine from 'alpinejs';

// window.Alpine = Alpine;

// Alpine.start();
