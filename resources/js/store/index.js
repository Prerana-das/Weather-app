import { createStore } from 'vuex';

const store = createStore({
  state: {
    weatherData:[],
  },
  mutations: {
    setWeatherData (state, data) {
        state.weatherData = data
     },
  },
  actions: {

  },
  modules: {

  },
});

export default store;
