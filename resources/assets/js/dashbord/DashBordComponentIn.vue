<template>
  <v-container fluid grid-list-xl>
    <v-layout row wrap>

      <v-flex lg3 sm3 xs3>
        <div class="inner-text">
          <vue-svg-gauge
            :start-angle="0"
            :end-angle="360"
            :value="3"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#00b297"
            :scale-interval="0.1"
          >
            <span class="inner-text" style="">fun</span>
          </vue-svg-gauge>
        </div>
      </v-flex>
      
       <v-flex lg3 sm3 xs3>
        <div class="inner-text">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="2"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#dc3545"
            
          />
        </div>
      </v-flex>
      
      <v-flex lg3 sm3 xs3>
        <div class="inner-text">
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="3"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#8CDFAD"
            :scale-interval="0.1"
          />
        </div>
      </v-flex>

       <v-flex lg3 sm3 xs3>
        <div class="inner-text">
          <vue-svg-gauge
            :start-angle="0"
            :end-angle="360"
            :value="3"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#0866C6"
            :scale-interval="0.1"
          />
        </div>
      </v-flex>

      <!-- Widgets-->
      <v-flex lg3 sm3 xs3>
        <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#00b297"/>
      </v-flex>
      <v-flex lg3 sm3 xs3>
        <widget icon="money_off" title="1000"   subTitle= '生産予定数'  color="#dc3545"/>
      </v-flex>
      <v-flex lg3 sm3 xs3>
        <widget icon="computer"  title="1000"   subTitle= '生産実績数'  color="#0866C6"/>
      </v-flex>
      <v-flex lg3 sm3 xs3>
        <widget  icon="watch_later" title="1000"   subTitle= '差異'     color="#1D2939"/>
      </v-flex>
  
      <v-flex lg12 sm12 xs12>
        <chart-component />
      </v-flex>
    </v-layout>
  </v-container>
</template>

<script>

import ChartComponent from './HorizontalBarChart'
//import HorizontalBarChart from '~/resources/assets/js/dashbord/HorizontalBarChart'
export default {
  components:{ChartComponent},
  data () {
    return {
      data: {
      
      },
      options: {
      
      }
    }
  },
}
</script>

<style>

.inner-text {
  height: 70%;
  width:  70%;
}
</style>
