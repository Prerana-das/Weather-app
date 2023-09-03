<template>
    <div>
        <div class="main-content container">
            <div class="row">
                <!-- Left Grid: Weather Reports -->
                <div class="col-md-6">
                    <Report />
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h2>Temperature Data</h2>
                        <div id="datepickerContainer">
                            <input type="text" class="form-control" id="datepicker" placeholder="Select Date">
                        </div>
                    </div>

                    <div id="temperatureGraph" style="height: 300px;"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Report from '../components/home/Report.vue'; 
import axios from 'axios';
import { mapState } from 'vuex';

export default {
  components: {
    Report,
  },
  created() {
    this.fetchWeatherData();
  },
  computed: {
    ...mapState(['weatherData']), 
  },
  methods: {
    async fetchWeatherData() {
      try {
        const response = await axios.get('/get-weather-logs'); 
        console.log(response.data);
        this.$store.commit('setWeatherData', response.data); // Commit data to the 'weatherData' state
      } 
      catch (error) {
        console.error('Error fetching weather data:', error);
      }
    },
  },
};
</script>





