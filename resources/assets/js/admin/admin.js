
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./../bootstrap');

window.Vue = require('vue');

window.Vue.config.debug = true;
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import EditPanel from './components/EditPanel.vue';
import List from './components/List.vue';
import MediaBox from './components/MediaBox.vue';

const app = new Vue({
    el: '#admin-app',
    components: {
        'edit-panel': EditPanel,
        'media-box': MediaBox,
        'list': List
    },
    data: {
    }
});
