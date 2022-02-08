import './bootstrap'


import { createApp } from 'vue'
import ExampleComponent from './components/ExampleComponent.vue'
import CounterComponent from './components/Counter.vue'
import ReviewComponent from './components/Review.vue'
import FavoriteComponent from './components/Favorite.vue'


createApp({
    components:{
        ExampleComponent,
        CounterComponent,
        ReviewComponent,
        FavoriteComponent,
    }
}).mount('#app')


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
