// import { createStore } from 'vuex';
import BlogModule from './modules/BlogModule';
import BlogDetailsModule from './modules/BlogDetailsModule';
import ProjectModule from "./modules/ProjectModule";
import PtojectDetailsModule from "./modules/PtojectDetailsModule";

// Vue.use(Vuex);

export default {
  modules: {
    PtojectDetailsModule,
    BlogModule,
    BlogDetailsModule,
    ProjectModule
  }
}
