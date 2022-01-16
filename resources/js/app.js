import './bootstrap'
import Vue from 'vue'
import Sample from './components/Sample'
import FlashMessage from './components/flash-message'

const app = new Vue({
    el: '#app',
    components: {
        Sample,
        FlashMessage,
    }
})
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
