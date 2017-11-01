
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
Vue.use(require('vue-moment'));

/**
 * Our Vuejs event handler which we will be using for flash messaging
 * @type {Vue}
 */
window.events = new Vue();

/**
 * Our Flash function which will be used to add new flash events to our event handler
 *
 * @param  String message Our alert message
 * @param  String type    The type of alert we want to show
 */
window.flash = function(message, type) {
  window.events.$emit('flash', message, type);
};

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/**
 * Initialize Generic Vue components
 */
Vue.component('helper-states', require('./components/Helpers/States.vue'));
Vue.component('flash', require('./components/Helpers/Flash.vue'));
Vue.component('modal', require('./components/Helpers/Modal.vue'));

/**
 * Initialize Property Vue components
 */
Vue.component('properties-quick', require('./components/Properties/Quick.vue'));
Vue.component('properties-edit', require('./components/Properties/Edit.vue'));
Vue.component('properties-view', require('./components/Properties/View.vue'));


const app = new Vue({
    el: '#app'
});
