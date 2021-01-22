/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import common from './common.js'
Vue.mixin(common);
import HomePage from './views/HomePage.vue'
import verPage from './views/verPage.vue'
import postPage from './views/postPage.vue'
import profilePage from './views/profilePage.vue'
import settingsPage from './views/settingsPage.vue'
import forgetPage from './views/forgetPage.vue'
import recoverPage from './views/recoverPage.vue'
import router from './router.js'
import InfiniteLoading from 'vue-infinite-loading'
Vue.use(InfiniteLoading)

const app = new Vue({
    el: '#app',
    components : {
        HomePage,
        verPage,
        postPage,
        profilePage,
        settingsPage,
        forgetPage,
        recoverPage
    },
    router
});
