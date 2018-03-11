
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
window.Vue = require('toastr');
window.Vue = require('vue');

// Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('image-box', require('./components/general/imageBox.vue'));
Vue.component('images-box', require('./components/general/imagesBox.vue')); 
Vue.component('images-with-content', require('./components/general/imagesWithContent.vue'));   

const app = new Vue({
    el: '#app'
});
