/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
<script src="{{ asset('js/app.js') }}"></script>


const app = createApp({});

import ExampleComponent from './components/ExampleComponent.vue';
import EventsList from './components/EventsList.vue';

app.component('example-component', ExampleComponent);

app.component('events-list', EventsList);



app.mount('#app');
