<template>
  <v-container fluid grid-list-xl>
    <v-layout row wrap>
      <!-- Widgets-->
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="domain" title="1,287,687" subTitle= '13% higher yesterday' supTitle="Today's Visits" color="#00b297"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="money_off" title="$141,291" subTitle= '$117,212 before tax' supTitle="Today's Sales" color="#dc3545"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="computer" title="33.45%" subTitle= '13% average duration' supTitle="% Unique Visits" color="#0866C6"/>
      </v-flex>
      <v-flex d-flex lg3 sm6 xs12>
        <widget icon="watch_later" title="13.00%" subTitle= '17.25% on average time' supTitle="Bounce Rate" color="#1D2939"/>
      </v-flex>
      
      <!-- Widgets Ends -->
      <!-- Statistics -->
      <v-flex d-flex lg4 sm6 xs12>
        <site-view-statistic/>
      </v-flex>
      <v-flex d-flex lg4 sm6 xs12>
        <location-statistic/>
      </v-flex>
      <v-flex d-flex lg4 sm6 xs12>
        <total-earnings-statistic/>
      </v-flex>
      <!-- Statistics Ends -->
      <!-- DataTable&TimeLine Starts -->
      <v-flex d-flex lg8 sm6 xs12>
        <data-table/>
      </v-flex>
      <v-flex d-flex lg4 sm6 xs12>
        <time-line />
      </v-flex>
      <!-- DataTable&TimeLine Ends -->
      <v-flex d-flex lg6 sm6 xs12>
        <stepper/>
      </v-flex>
      <v-flex d-flex lg6 sm6 xs12>
        <user-tree-view />
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>


export default {
  name: 'chart',
  data () {
    return {
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June'],
        datasets: [
          {
            label: 'Bar Dataset',
            data: [10, 20, 30, 40, 50, 30],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255, 99, 132, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
          },
          {
            label: 'Line Dataset',
            data: [10, 50, 20, 30, 30, 40],
            borderColor: '#CFD8DC',
            fill: false,
            type: 'line',
            lineTension: 0.3,
          }
        ]
      },
      options: {
        scales: {
          xAxes: [{
            scaleLabel: {
              display: true,
              labelString: 'Month'
            }
          }],
          yAxes: [{
            ticks: {
              beginAtZero: true,
              stepSize: 10,
            }
          }]
        }
      }
    }
  },
  mounted () {
    this.renderChart(this.data, this.options)
  }
}
</script>

<style>

</style>
