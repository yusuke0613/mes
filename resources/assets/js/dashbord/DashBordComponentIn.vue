<template>
  <v-container fluid grid-list-xl style="padding-top:0 !important">
    <v-layout row wrap>
       <v-flex lg4 sm4 xs12>
        <div class="inner-text2">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="2"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#dc3545"
            
          >
          <div class="inner-text">
          <span>20%</span>
           </div>
          </vue-svg-gauge>
        </div>
      </v-flex>
      <v-flex lg2 sm2 xs12>
        <div style="font-size:28px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA38248-04</div>
        <widget　title="1000"   subTitle= '実績数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '計画数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '？？数'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>

       <v-flex lg4 sm4 xs12>
        <div class="inner-text2">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="4"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#FFEA00"
            
          >
          <div class="inner-text">
          <span>40%</span>
           </div>
          </vue-svg-gauge>
        </div>
      </v-flex>
      <v-flex lg2 sm2 xs12>
        <div style="font-size:28px !important; text-align:center; color:#fff;background-color:#3F51B5">4SW22227A4</div>
        <widget　title="1000"   subTitle= '実績数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '計画数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '？？数'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>      

      <v-flex lg4 sm4 xs12>
         
        <div class="inner-text2">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="8"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#00b297"
            
          >
          <div class="inner-text">
            <span>80%</span>
          </div>
          </vue-svg-gauge>
        </div>
      </v-flex>
       <v-flex lg2 sm2 xs12>
        <div style="font-size:28px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA38293-10</div>
        <widget　title="1000"   subTitle= '実績数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '計画数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '？？数'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>      

       <v-flex lg4 sm4 xs12>
        <div class="inner-text2">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="10"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#00b297"
          >
          <div class="inner-text">
          <span>100%</span>
          </div>
          </vue-svg-gauge>
        </div>
      </v-flex>
       <v-flex lg2 sm2 xs12>
        <div style="font-size:28px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA41941-10</div>
        <widget　title="1000"   subTitle= '実績数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '計画数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '？？数'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>   
    </v-layout>
  </v-container>
</template>

<script>

import DoughnutChart from 'vue-doughnut-chart'
export default {
  components: {
    DoughnutChart
  },

  data () {
    return {
      percent: '25',
      data: {
      },
      options: {
      },
       labels: ['SU', 'MO', 'TU', 'WED', 'TH', 'FR', 'SA'],
        time: 0,
        forecast: [
          { day: '実績', icon: 'build', temp:100 },
          { day: '計画', icon: 'mdi-white-balance-sunny', temp:100 },
          { day: '予定', icon: 'mdi-cloud', temp:100},
          { day: '？？', icon: 'mdi-cloud', temp:100},
        ],
    }
  },
}
</script>

<style>

.inner-text {
  height: 100%;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 34px;
  font-weight: 700;
}

.inner-text2 {
  height: 90%;
  width:  90%;

}
</style>
