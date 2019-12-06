<script>
import { HorizontalBar } from 'vue-chartjs'

export default {
  extends: HorizontalBar,
  mounted() {
    this.renderChart(
      {
        labels: [
          '4SW22227A4',
          '8MA38248-04'
        ],
        datasets: [
          {
            label: '生産計画',
            backgroundColor: '#00b297',
            data: [40, 20]
          },
           {
            label: '生産予定数',
            backgroundColor: '#dc3545',
            data: [30, 22]
          },
          {
            label: '生産実績数',
            backgroundColor: '#0866C6',
            data: [20, 21]
          },
          {
            label: '差異',
            backgroundColor: '#1D2939',
            data: [30, 12]
          }
        ]
      },
      {
        responsive: true,
        maintainAspectRatio: false
      }
    )
  }
}
</script>