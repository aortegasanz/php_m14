require('./bootstrap');

import { createApp } from 'vue';
import ShopComponent from './components/ShopComponent';

createApp({
    components: {
        ShopComponent
    }
}).mount('#app');