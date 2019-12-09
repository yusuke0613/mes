 <template>
    <v-layout row wrap  style="padding-top:0 !important">  
      <v-flex xl4 lg3 md3 sm3 xs3>
        <v-text-field style="color" prepend-icon="location_on" label="ユーザID" v-model="lineCode" v-on:change="changeRoute()"/>
      </v-flex>
      <v-btn v-if="show"  xl3 lg3 md3 sm3 xs3 color="green"      style="font-size:20px;color:#fff" >終了</v-btn>
      <v-btn v-if="show"  xl3 lg3 md3 sm3 xs3 color="red"     　 style="font-size:20px;color:#fff" @click="showModal()">中断</v-btn>
      <v-btn v-if="show"  xl3 lg3 md3 sm3 xs3 color="orange"     style="font-size:20px;color:#fff" >組基</v-btn>
      <v-flex v-flex v-if="show" xl12 lg12 md12 sm12 xs12 style="margin:20px;">
        <v-data-table
          :headers="structHeaders"
          :items="Partstructs"
          :pagination.sync="pagination"
          :rows-per-page-items='[10,25,50,{"text":"All","value":-1}]'
          :search="search"
          class="elevation-0 p-1"
        >
          <template slot="items" slot-scope="props">
            <tr>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['childPartNo']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0; text-align: center;" >
                  <span v-if="props.item['status']==0"   class="torikomi-badge">未投入</span>
                  <span v-if="props.item['status']==1"   class="riseki-badge">投入済</span>
              </td>
            </tr>
          </template>
        </v-data-table>
      </v-flex>
      
      <v-dialog v-model="showUpdateUserModal" fullscreen hide-overlay transition="dialog-bottom-transition">
          <v-card>
            <v-toolbar style="background-color:#0D47A1;">
              <v-btn icon dark @click="showUpdateUserModal = false">
                <v-icon>clear</v-icon>
              </v-btn>
              <v-toolbar-title style="color:#fff">作業中断</v-toolbar-title>
              <div class="flex-grow-1"></div>
            </v-toolbar>

            <v-container>
                 <v-layout row wrap >

                    <v-flex xl3 lg3 md3 sm3 xs3 style="">
                      <v-text-field style="color" label="ユーザID" v-model="this.lineCode" disabled/>
                    </v-flex>
                    <v-flex xl9 lg9 md9 sm9 xs9 style="">
                     
                    </v-flex>

                    <v-flex xl12 lg12 md12 sm12 xs12 style="">
                      <v-select :items="items" label="中断理由"></v-select>
                    </v-flex>

                    <v-btn xl12 lg12 md12 sm12 xs12 color="green" style="font-size:20px;color:#fff" @click="openKmiki">確定</v-btn> 
                 </v-layout>
            </v-container>
          </v-card>
        </v-dialog>
      
    </v-layout> 

    
     
    
</template>
<script>

    export default {
        watch: {

        },
        data() {
            return {
              　showUpdateUserModal:false,
                dashboardusers: [],
                dashboarduser: [{ id: 1, name: 'aのitem' },{ id: 2, name: 'bのitem' }],
                loading: false,
                search: '',
                showModal2: false,
                pagination: { sortBy: 'name', descending: false, },
                setsearch(id) {
                  this.search = id
                },
                postItem: { id: 1, displayId:'1', name: 'aのitem' },
                worker:'',
                lineCode:'',
                Partstructs:[],
            　  structHeaders: [
                  //{text: 'ID', align: 'center', value: 'id'},
                  {text: '構成品'   ,align: 'center',value: 'childPartNo'},
                  {text: '状況'　　　,align: 'center',value: 'status'},
                  //{text: '親品番',align: 'center',value: 'parentPartNo'},
                ],
                show:false,
                items: ['理由A', '理由B', '理由C', '理由D'],
            }
        },
        
        created() {
          Echo.channel("dashBordChannel")
          .listen("DashBordEvent", (e) => {
             this.getDashbordUser();
          })
          this.getPartstructr();
         // document.getElementById('lineId').focus();
        },

        methods: {
          reload() {
            this.getDashbordUser()
          },

           changeRoute() {
            if (this.lineCode == '') {

            }else {
               this.findWorker(this.lineCode);
  
            }
          },
          showModal() {
            this.showUpdateUserModal = true;
          },

          getPartstructr() {
            axios.get('/api/Partstruct')
          .then(res => this.Partstructs = res.data.data)
          .catch(error => console.log(error.res.data))
           },
          update(userProfile) {
              axios.patch(`/api/hostmaster/${userProfile.id}`, userProfile)
              .then(res =>  console.log(res.data))
              .catch(error => console.log(error.res))
              this.getDashbordUser();
          },
        
          async findWorker(workerId) {
              const res   = await axios.get(`/api/WorkerMaster/worker/${workerId}`);
              if (res.data == 'no') {
                this.show = false;
                alert('No User');
              }else {
                this.show = true;
              }
          },
      
        }
    }
</script>

<style>

.green-box {
  padding:5px;
  background-color: #009688 !important;
}

.yerrow-box {
  padding:5px;
  background-color: #CDDC39 !important;
}

.red-box {
  padding:5px;
  background-color: #F44336 !important;
}

.zero-box {
  font-size:16px; 
  padding: 1px; 
  color:"white" !important;
}

.first-box {
  font-size:16px; 
  padding: 1px; 
  color:rgb(198, 40, 40) !important;
}
.second-box {
  font-size:16px; 
  padding: 1px; 
  color:rgb(40, 53, 147) !important;
}

.third-box {
  font-size:16px; 
  padding: 1px; 
  color:rgb(191, 243, 194) !important;
}

.color-nomal {
  font-size:12px;
  color: #fff !important;
}

.color-orange {
  font-size:12px;
  color: orange !important;
}

</style>
