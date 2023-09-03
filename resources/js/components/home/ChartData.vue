<template>
  <div>
    <canvas ref="chartCanvas"></canvas>
  </div>
</template>

<script>
import { ref, onMounted, watch } from 'vue';
import Chart from 'chart.js/auto';

export default {
  props: {
    chartData: Array, 
    type: String, 
  },
  setup(props) {
    const chartCanvas = ref(null);
    let chart = null;

    onMounted(() => {
      if (chartCanvas.value) {
        chart = new Chart(chartCanvas.value, {
          type: props.type,
          data: {
            labels: ['00', '02', '04', '06', '08', '09', '10', '12', '14', '16', '18', '20', '22', '24'],
            datasets: [
              {
                label: '',
                data: props.chartData,
                borderWidth: 1,
              },
            ],
          },
          options: {
            scales: {
              y: {
                beginAtZero: true,
              },
            },
          },
        });
      }
    });

    watch(() => props.chartData, (newData) => {
      if (chart) {
        chart.data.datasets[0].data = newData;
        chart.update();
      }
    });

    return {
      chartCanvas,
    };
  },
};
</script>
