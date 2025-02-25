import { createApp } from 'vue';
import CarSearch from './components/CarSearch.vue';

// Initialize Vue when the page loads
window.addEventListener('load', () => {
    const app = createApp({});
    
    // Register the component
    app.component('car-search', CarSearch);
    
    // Mount Vue app if the element exists
    if (document.getElementById('app')) {
        app.mount('#app');
    }
});