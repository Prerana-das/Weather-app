<template>
  <div>
    <div class="container">
        <Header />

        Hello
        <div class="content">
            <Sidebar />
            <div class="main-content container">
                <router-view></router-view> 
            </div>
        </div>

        
    </div>
  </div>
</template>
<script>
import Header from './shared/Header.vue'; 
import Sidebar from './shared/Sidebar.vue'; 
import axios from 'axios';

export default {
  components: {
    Header,
    Sidebar,
  },
  data() {
    return {
      weatherLogs: [],
    };
  },
  mounted() {
    axios.get('/get-weather-logs') 
      .then((response) => {
        this.weatherLogs = response.data;
      })
      .catch((error) => {
        console.error('Error fetching data:', error);
      });
  },
};
</script>