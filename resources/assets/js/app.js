import Vue from 'vue';
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
import App from "./components/App";

Vue.config.devtools = process.env.NODE_ENV === 'development'
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

new Vue({
    el: '#app',
    render: h => h(App)
});
