import App from "./App.vue";
import store from './store/index.js'
import Vue from "vue";
import Vuex from "vuex";
import VueRouter from 'vue-router'
import { router } from "@/router";

Vue.config.productionTip = false;
Vue.use(Vuex);
Vue.use(VueRouter);
new Vue({
  render: (h) => h(App),
  router,
  store: new Vuex.Store(store),
}).$mount("#app");
