<script setup>
import { Bar } from "vue-chartjs";

import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

</script>

<template>
  <div>
    <Bar
      :chart-data="chartData"
      :chart-options="chartOptions"
      :chart-id="chartId"
      :styles="styles"
      :width="width"
      :height="height"
      :plugins="plugins"
      :css-classes="cssClasses"
    />
  </div>
</template>

<script>
export default {
    name: "BarChart",

    components: {
        Bar,
    },

    props: {
        chartId: {
            type: String,
            default: 'bar-chart'
        },
        width: {
            type: Number,
            default: 400
        },
        height: {
            type: Number,
            default: 400
        },
        cssClasses: {
            default: '',
            type: String
        },
        styles: {
            type: Object,
            default: () => {}
        },
        plugins: {
            type: Array,
            default: () => []
        },
        labels: {
            type: Array,
            default: () => []
        },
        datasets: {
            type: Object,
            default: () => {}
        },
        chartOptions: {
            type: Object,
            required: false,
            // eslint-disable-next-line vue/require-valid-default-prop
            default: {
                responsive: true,
                maintainAspectRatio: false
            }
        }
    },

    computed: {
        chartData() {
            return {
                labels: this.labels,
                datasets: this.datasets,
            };
        }
    }
};
</script>
