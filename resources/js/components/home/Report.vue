<template>
  <div>
    <h2 class="title">Weather Reports</h2>
    <div class="row">
      <div class="col-md-4" v-for="item in weatherData" :key="item.id">
        <div class="card text-white">
          <h3 class="card-title">{{ item.city.name }}</h3>
          <h5 class="card-sub-title">{{ item.city?.country?.name }}</h5>
          <div class="card-body">
            <img :src="`/img/weather/${item.condition_img}`" :alt="item.name" class="card-img-top" />
            <p class="card-temparature">{{ item.temperature }}<span>°C</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState } from 'vuex';

export default {
  computed: {
    ...mapState(['weatherData']), 
  },
};
</script>
