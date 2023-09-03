import { createStore } from 'vuex';

const store = createStore({
  state: {
    weatherData:[],
    statisticsData:[],
    selectedCityId:1,
  },
  mutations: {
    setWeatherData (state, data) {
        state.weatherData = data
     },
    setStatisticsData (state, data) {
      state.statisticsData = data
    },
    setSelectedCityId (state, data) {
      state.selectedCityId = data
    },
  },
  actions: {

  },
  modules: {

  },
});

export default store;
