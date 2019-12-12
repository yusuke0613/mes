/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'

import router from './Router/router.js'

import Widget from './components/Widget.vue';
import SocialWidget from './components/SocialWidget.vue';
import DataTable from './components/DataTable.vue';
import TimeLine from './components/TimeLine.vue';
import UserTreeView from './components/UserTreeView.vue';
import Stepper from './components/Stepper.vue';
import LocationStatistic from './components/statistics/LocationStatistic.vue';
import SiteViewStatistic from './components/statistics/SiteViewStatistic.vue';
import TotalEarningsStatistic from './components/statistics/TotalEarningsStatistic.vue';
import MultiFiltersPlugin from '../../../plugins/MultiFilters' 
import { VueSvgGauge } from 'vue-svg-gauge';

Vue.use(Vuetify)
Vue.use(window.puStagger)
Vue.use(MultiFiltersPlugin);

import '../../../node_modules/vuetify/dist/vuetify.css'

import User from './Heplers/User.js'
window.User = User

window.EventBus = new Vue();
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */


// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('widget', Widget);
Vue.component('social-widget', SocialWidget);
Vue.component('data-table', DataTable);
Vue.component('time-line', TimeLine);
Vue.component('user-tree-view', UserTreeView);
Vue.component('stepper', Stepper);
Vue.component('VueSvgGauge', VueSvgGauge);

Vue.component('location-statistic', LocationStatistic);
Vue.component('site-view-statistic', SiteViewStatistic);
Vue.component('total-earnings-statistic', TotalEarningsStatistic);
Vue.component('AppHome', require('./components/AppHome.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
