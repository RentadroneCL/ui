/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';

window.Vue = Vue;

/**
 * Global event bus.
 */
Vue.prototype.$eventBus = new Vue();

import Markers from './components/Markers';
import Location from './components/Location';
import AppUploader from './components/AppUploader';
import Media from './components/Media';

Vue.component('app-uploader', AppUploader);

/**
* Next, we will create a fresh Vue application instance and attach it to
* the page. Then, you may begin adding components to this application
* or customize the JavaScript scaffolding to fit your unique needs.
*/
const app = new Vue({
  el: '#app'
});

import { Application } from 'stimulus';
import { definitionsFromContext } from 'stimulus/webpack-helpers';

const application = Application.start();
const context = require.context('./controllers', true, /\.js$/);
application.load(definitionsFromContext(context));
