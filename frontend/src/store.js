import Vue from 'vue';
import Vuex from 'vuex';

import app from './modules/components/core/store/app';
import shared from '@/modules/shared/store/';
import pergunta from '@/modules/pergunta/store/';

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    app,
    shared,
    pergunta,
  },
  getters: {
    route: state => state.route,
  },
  strict: process.env.NODE_ENV !== 'production',
});
