import './bootstrap'

import router from "./routes";
import VueRouter from "vue-router";


import { createApp } from 'vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'
import ExampleComponent from './components/Example.vue'
import FlashmessageComponent from './components/Flashmessage.vue'
import FavoriteComponent from './components/Favorite.vue'
createApp({
    components:{
        // CounterComponent,
        ReviewComponent,
    }
}).mount('#app')
createApp({
    components:{
        FavoriteComponent
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



import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
