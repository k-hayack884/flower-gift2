import './bootstrap'


import { createApp } from 'vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'
import ExampleComponent from './components/Example.vue'
import ApiComponent from './components/Api.vue'
import FavoriteComponent from './components/Favorite.vue'
createApp({
    components:{
        // CounterComponent,
        ReviewComponent,
    }
}).mount('#app')
createApp({
    components:{
        // ExampleComponent,
        // ApiComponent,
        FavoriteComponent
    }
}).mount('#api')
// //data() {
//     return {
//         info: null
//       };
//     },



import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
