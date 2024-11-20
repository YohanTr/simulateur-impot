/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// import { createApp } from 'vue';
// import App from './App.vue';

// createApp(App).mount('#app');
import { createApp } from 'vue';
import TaxForm from './components/TaxForm.vue';

createApp(TaxForm).mount('#app');