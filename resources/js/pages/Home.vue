<template>
    <div>
        <div class="main-content container">
            <div class="row">
                <!-- Left Grid: Weather Reports -->
                <div class="col-md-6">
                    <Report />
                </div>
                <div class="col-md-6">
                   <Statistics/>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Report from '../components/home/Report.vue'; 
import Statistics from '../components/home/Statistics.vue'; 
import axios from 'axios';
import { mapState } from 'vuex';

export default {
  components: {
    Report,
    Statistics,
  },
  created() {
    this.getWeatherData();
    this.getStatisticsData();
  },
  computed: {
    ...mapState(['weatherData', 'selectedCityId']), 
  },
  methods: {
    //report data
    async getWeatherData() {
      try {
        const response = await axios.get('/get-weather-logs'); 
        this.$store.commit('setWeatherData', response.data); 
      } 
      catch (error) {
      }
    },

    //statistics data
     async getStatisticsData() {
      try {
        const response = await axios.get(`/get-statistics-data?city_id=${this.selectedCityId}`); 
        this.$store.commit('setStatisticsData', response.data); 
      } 
      catch (error) {
      }
    },
  },
};
</script>





