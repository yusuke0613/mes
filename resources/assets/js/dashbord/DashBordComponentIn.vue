<template>
  <v-container fluid grid-list-xl style="padding-top:0 !important">
    <v-layout row wrap>
      <v-flex lg3 sm3 xs3>
        <div class="inner-text2">
         <div style="font-size:24px;text-align: center;">4SW22227A4</div>
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
          <span>10%</span>
           </div>
          </vue-svg-gauge>
            <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#0866C6"/>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#00b297"/>
        </div>
      </v-flex>
      
       <v-flex lg3 sm3 xs3>
        
        <div class="inner-text2">
        <div style="font-size:24px;text-align: center;">8MA38248-04</div>
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
            <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#0866C6"/>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#00b297"/>
        </div>
      </v-flex>
      
      <v-flex lg3 sm3 xs3>
         
        <div class="inner-text2">
          <div style="font-size:24px;text-align: center;">8MA38293-10</div>
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="4"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#00b297"
            
          >
          <div class="inner-text">
            <span>40%</span>
          </div>
          </vue-svg-gauge>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#0866C6"/>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#00b297"/>
        </div>

      </v-flex>

       <v-flex lg3 sm3 xs3>
        <div class="inner-text2">
        <div style="font-size:24px;text-align: center;">8MA41941-10</div>
          <vue-svg-gauge
           :start-angle="0"
            :end-angle="360"
            :value="4"
            :separator-step="2"
            :min="0"
            :max="10"
            gauge-color="#00b297"
            
          >
          <div class="inner-text">
          <span>40%</span>
          </div>
          </vue-svg-gauge>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#0866C6"/>
          <widget  icon="domain"   title="1000"   subTitle= '生産計画数'  color="#00b297"/>
        </div>
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
      }
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
  font-size: 20px;
  color: #de3a21;
  font-weight: 700;
}

.inner-text2 {
  height: 60%;
  width:  60%;

}
</style>
