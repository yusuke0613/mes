<template>
  <v-container fluid grid-list-xl style="padding-top:0 !important">
    <v-layout row wrap>
      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA38248-04</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title= {{ formatTime }}   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title= {{ formatTime }}   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="2(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>

      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">4SW22227A4</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="4(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>      

      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA38293-10</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="10(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>      

      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA41941-10</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="10(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>   
      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA38293-10</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="10(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>      
      <v-flex lg2 sm2 xs12>
        <div style="font-size:24px !important; text-align:center; color:#fff;background-color:#3F51B5">8MA41941-10</div>
        <widget　title="1000"   subTitle= '計画数'  icon="build" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '予定数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '実績数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="1000"   subTitle= '差異数'  icon="calendar_today" color="#CFD8DC"/>
        <widget　title="10(秒)"   subTitle= 'ラインタクト設定'  icon="calendar_today" color="#CFD8DC"/>
      </v-flex>   
      <button v-on:click="start" v-if="!timerOn">Start</button>
      <button v-on:click="stop" v-if="timerOn">Stop</button>
    </v-layout>
  </v-container>
</template>
<script>

import DoughnutChart from 'vue-doughnut-chart'
export default {
  components: {
    DoughnutChart
  },
  created: {
  
  },
  data () {
    return {
      min: 59,
      sec: 59,
      timerOn: false,
      timerObj: null,
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
  method: {
    count: function() {
      if (this.sec <= 0 && this.min >= 1) {
        this.min --;
        this.sec = 59;
      } else if(this.sec <= 0 && this.min <= 0) {
        this.complete();
      } else {
        this.sec --;
      }
    },

    start: function() {
      let self = this;
      this.timerObj = setInterval(function() {self.count()}, 1000)
      this.timerOn = true; 
    },

    stop: function() {
      clearInterval(this.timerObj);
      this.timerOn = false; //timerがOFFであることを状態として保持
    },

    complete: function() {
      clearInterval(this.timerObj)
    }
  },
  computed: {
    formatTime: function() {
      let timeStrings = [
        this.min.toString(),
        this.sec.toString()
      ].map(function(str) {
        if (str.length < 2) {
          return "0" + str
        } else {
          return str
        }
      })
      return timeStrings[0] + ":" + timeStrings[1]
    }
  }
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
  height: 70%;
  width:  70%;
}

.inner-text3 {
  height: 50%;
  width:  50%;
  position: absolute
}
</style>
