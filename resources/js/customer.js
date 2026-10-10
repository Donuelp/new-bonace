import { createApp } from 'vue';
import '../css/customer.css';
import CustomerApp from './components/CustomerApp.vue';

const customerRoot = document.getElementById('customer-app');

if (customerRoot) {
    createApp(CustomerApp).mount(customerRoot);
}
