<template>
<Radar
    :options="chartOptions"
    :data="chartData"
  />
</template>

<script>
 
import { Radar } from 'vue-chartjs'
import {
  Chart as ChartJS,
  RadialLinearScale,
  PointElement,
  LineElement,
  Filler,
  Tooltip,
  Legend
} from 'chart.js'

ChartJS.register(
  RadialLinearScale,
  PointElement,
  LineElement,
  Filler,
  Tooltip,
  Legend
)

export default {
  name: 'RadarChart',
  components: { Radar },
  data() {
    return {
      chartData: {
        labels: [  
          'Strength',
          'Willpower',
          'Agility',
          'Endurance',
          'Personality',
          'Luck',
          'Running' 
        ],
        datasets: [
    {
      label: 'My Second dataset',
      backgroundColor: 'rgba(255,99,132,0.2)',
      borderColor: 'rgba(255,99,132,1)',
      pointBackgroundColor: 'rgba(255,99,132,1)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgba(255,99,132,1)',
      data: [1, 2, 4, 5, 6, 7, 9]
    }

  ]
      },
      chartOptions: {
        responsive: true,
        maintainAspectRatio: true
      }
    }
  }
}
</script>