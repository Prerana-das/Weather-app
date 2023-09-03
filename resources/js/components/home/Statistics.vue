<template>
  <div>
      <div class="row">
        <div class="d-flex justify-content-between statistics-top">
          <h2 class="title">Statistics</h2>
          <div class="statistics-top-right">
            <select v-model="city_id" @change="handleCityChange" name="city" id="city">
              <option v-for="(item, index) in allCity" :key="index" :value="item.id">
                {{ item.name }}
              </option>
            </select>

            
            <h5 class="selected-date">Selected date: {{ selectedDate }}</h5>
            <input
              type="date"
              id="datePicker"
              v-model="selectedDate"
              @input="dateSelected"
            />
          </div>
        </div>
      </div>
      <div class="row ">
        <div class="statistics-card">
          <h2>Temperature (Last 24 Hours)</h2>
          <ChartData :chartData="statisticsData?.temperatureData" type="line"/>
        </div>
      </div>
      <div class="row">
         <div class="statistics-card">
          <h2>Wind (Last 24 Hours)</h2>
          <ChartData :chartData="statisticsData?.windData" type="line"/>
         </div>
      </div>
      <div class="row">
        <div class="statistics-card">
          <h2>Wind (Last 24 Hours)</h2>
          <ChartData :chartData="statisticsData?.humidityData" type="bar"/>
        </div>
      </div>
  </div>
</template>
<script>
import { mapState } from 'vuex';
import axios from 'axios';
import ChartData from './ChartData.vue';

export default {
  components: {
    ChartData
  },
  computed: {
    ...mapState(['statisticsData', 'selectedCityId']), 
  },
  data() {
    return {
      selectedDate: '',
      allCity: [],
      city_id:1,
      data: [12.12, 19.5, 3, 5, 2, 3],
    };
  },
  methods:{
    //change city selection
    handleCityChange(){
      this.$store.commit('setSelectedCityId', this.city_id); 
      this.getStatisticsData();
    }, 

    //change date selection
    dateSelected(event) {
      this.selectedDate = event.target.value;
      console.log(this.selectedDate);
      this.getStatisticsData(this.selectedDate);
    },

    //statictics data
    async getStatisticsData(selectedDate = null) {

      let dateParam = selectedDate ?? '';

      try {
        const response = await axios.get(`/get-statistics-data?city_id=${this.selectedCityId}&filter_date=${dateParam}`); 
        this.$store.commit('setStatisticsData', response.data); 
      } 
      catch (error) {
      }
    },
  },
  async created(){
    try {
      const response = await axios.get('/get-all-city'); 
      this.allCity = response.data
    } 
    catch (error) {
    }
  }
};
</script>

