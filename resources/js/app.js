/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue').default;
import $ from 'jquery';
window.$ = window.jQuery = $;


import 'jquery-ui/ui/widgets/datepicker.js';
import Vue from 'vue';
$('#datepicker').datepicker();

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component(
    "content-wrapper",
    require("./components/Content-Component.vue").default
);
Vue.component(
    "main-footer",
    require("./components/Footer-Component.vue").default
);
Vue.component(
    "navbar",
    require("./components/Header-Component.vue").default
);
Vue.component(
    "sidebar",
    require("./components/Sidebar-Component.vue").default
);
Vue.component(
    "form-component",
    require("./components/Form-Component.vue").default
);
Vue.component(
    "teacher-component",
    require("./components/Teacher-Component.vue").default
);
Vue.component(
    "subject-component",
    require("./components/Subject-Component.vue").default
);
Vue.component(
    "subject",
    require("./components/FormSubject-Component.vue").default
);
Vue.component(
    "upload-report",
    require("./components/Upload-Component.vue").default
);
Vue.component(
    "set-mark",
    require("./components/SetMark-Component.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
