 <template>
    <v-layout row wrap>  
      <v-flex xl3 lg3 md3 sm3 xs3 style="margin-left:50px !important;">
        <v-select
          :items="orderCodes"
          label="部門コード"
          @change="filterLineCode"
        ></v-select>
      </v-flex>
       <v-flex xl3 lg3 md3 sm3 xs3 style="margin-left:50px !important;">
        <v-select
          :items="lineCodes"
          label="ラインID"
          @change="filterLineCode"
        ></v-select>
      </v-flex>
      <v-flex xl3 lg3 md3 sm3 xs3 style="margin-left:50px !important;">
      <v-btn color="green" style="font-size:20px;color:#fff" @click="openKmiki">印刷</v-btn>
      </v-flex>

      <v-flex xs12>
        <v-data-table
          :headers="headers"
          :items="dashboardusers"
          :pagination.sync="pagination"
          :rows-per-page-items='[10,25,50,{"text":"All","value":-1}]'

          style="white-space: nowrap; padding:0 !important; font-size:16px !important;"
        >
          <template slot="items" slot-scope="props">
            <tr style="white-space: nowrap; padding:0;">
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" ><a @click="updateUserModal(props.item)">{{props.item['id']}}</a></td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >
                  <span v-if="props.item['status']==1"   class="zaiseki-badge">未実行</span>
                  <span v-if="props.item['status']==2"   class="riseki-badge">実行中</span>
                  <span v-if="props.item['status']==3"   class="torikomi-badge">実行済</span>
                  <span v-if="props.item['status']==4"   class="renraku-badge">段取り</span>
                  <span v-if="props.item['status']==5"   class="taiseki-badge"></span>
              </td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['lineCode']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['partNo']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['planQty']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['delayQty']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['packingQty']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['orderQty']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['planDate'] | moment}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['startDate']}}</td>
              <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['endDate']}}</td>
              <!--
                <template v-for="n in (headers.length - 1)">
                  <td :class="'text-xs-' + headers[n].align" style="white-space: nowrap; padding:0;" v-text="props.item[headers[n].value]"></td>
                </template>
              -->
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
              <v-toolbar-title style="color:#fff">生産実行</v-toolbar-title>
              <div class="flex-grow-1"></div>
            </v-toolbar>

            <v-container>
                 <v-layout row wrap >
                    <!--<v-flex xl6 lg6 md6 sm6 xs6>
                      <vue-qrcode v-if="targetText" :value="targetText" :options="option" tag="img"></vue-qrcode>
                    </v-flex>-->

                    <v-flex xl4 lg4 md4 sm4 xs4 style="">
                      <v-text-field style="color" prepend-icon="location_on" label="ラインID" v-model="this.lineCode" disabled/>
                    </v-flex>

                    <v-flex xl4 lg4 md4 sm4 xs4 style="">
                      <v-text-field prepend-icon="build" label="製品番号" v-model="this.partNo" disabled/>;   
                    </v-flex>

                    <v-flex xl4 lg4 md4 sm4 xs4 style="text-align:center" >
                      <v-btn color="green" style="font-size:20px;color:#fff" @click="openKmiki">組基表示</v-btn>
                    </v-flex>

                    <v-flex xl12 lg12 md12 sm12 xs12>
                      
                      <v-btn xl4 lg4 md4 sm4 xs4 color="green"   style="font-size:20px;color:#fff" @click="updateStatus(2)">開始</v-btn>
                      <v-btn xl4 lg4 md4 sm4 xs4 color="red"     style="font-size:20px;color:#fff" @click="updateStatus(3)">終了</v-btn>
                      <v-btn xl4 lg4 md4 sm4 xs4 color="orange"  style="font-size:20px;color:#fff" @click="updateStatus(4)">段取り</v-btn>
                    </v-flex>

                    <v-flex xl5 lg5 md5 sm5 xs5　style="margin:20px;">
                      <v-text>作業者</v-text>
                      <v-data-table
                        :headers="workeHeaders"
                        :items="workerUsers"
                        :pagination.sync="pagination"
                        :rows-per-page-items='[10,25,50,{"text":"All","value":-1}]'
                        :search="search"
                        class="elevation-0 p-1"
                      >
                        <template slot="items" slot-scope="props">
                          <tr>
                            <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['processID']}}</td>
                            <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['workerID']}}</td>
                             <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >
                                <span v-if="props.item['status']==0"   class="zaiseki-badge">未着手</span>
                                <span v-if="props.item['status']==1"   class="riseki-badge">着手中</span>
                                <span v-if="props.item['status']==2"   class="torikomi-badge">着手済</span>
                            </td>
                          </tr>
                        </template>
                      </v-data-table>
                    </v-flex>

                    <v-flex xl5 lg5 md5 sm5 xs5 style="margin:20px;">
                      <v-text>構成品</v-text>
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
                 </v-layout>
            </v-container>
          </v-card>
        </v-dialog>
        <v-dialog  v-model="kumiki">
          <v-img  height=100vh src='/001.JPG'  style ="background-color:rgba(255,255,255,0.9) !important"></v-img>
        </v-dialog>
    </v-layout>
    </template>
<script>
  import VueQrcode from "@chenfengyuan/vue-qrcode";
  import moment from 'moment';

    export default {
        components: {
          VueQrcode
        },
        filters: {
          moment: function (date) {
            return moment(date).format('YYYY/MM/DD');
          }
        },
        data() {
            return {
                kumiki:false,
                filters: {
                  search: '',
                  orderCode: '',
                },
                Partstructs:[],
                orderCodes: ['A1513'],
                lineCodes: ['A001'],
                dashboardusers: [],
                workerUsers: [],
                dashboarduser: [{ id: 1, name: 'aのitem' },{ id: 2, name: 'bのitem' }],
                headers: [
                  {text: 'ID', align: 'center', value: 'id'},
                  //{text: '順番', align: 'center', value: 'turnNo'},
                  {text: 'ステータス',align: 'center', value: 'status'},
                  {text: 'ラインID',align: 'center', value: 'lineCode'},
                  {text: '品番', align: 'center', value: 'partNo'},
                  {text: '計画数',align: 'center', value: 'planQty'},
                  {text: '遅れ数', align: 'center', value: 'delayQty'},
                  {text: '梱包数',align: 'center',value: 'packingQty'},
                  {text: 'オーダ数',align: 'center', value: 'orderQty'},
                  //{text: 'オーダ数+1',align: 'center', value: 'orderQty1'},
                  //{text: 'オーダ数+2',align: 'center', value: 'orderQty2'},
                  //{text: 'オーダ数+3',align: 'center', value: 'orderQty3'},
                  {text: '計画日',align: 'center', value: 'planDate'},
                  {text: '開始',align: 'center', value: 'startDate'},
                  {text: '終了',align: 'center', value: 'endDate'},
                ],

                structHeaders: [
                  //{text: 'ID', align: 'center', value: 'id'},
                  {text: '構成品'   ,align: 'center',value: 'childPartNo'},
                  {text: '状況'　　　,align: 'center',value: 'status'},
                  //{text: '親品番',align: 'center',value: 'parentPartNo'},
                ],

                workeHeaders: [
                  {text: '工程ID'　　,align: 'center',value: 'processID'},
                  {text: '作業者ID'　,align: 'center',value: 'workerID'},
                  {text: '状況'　　　,align: 'center',value: 'status'},
                ],


                showModal2: false,
                pagination: { sortBy: 'name', descending: false, },
        
                postItem: { id: 1, displayId:'1', name: 'aのitem' },
                showUpdateUserModal: false,
                valid: false,
                id: '',
                lineCode:'',
                partNo: '',

             
                items: [
                  {label:'IT企画部'   , value:'0'},
                  {label:'システム1課', value:'1'},
                  {label:'システム2課', value:'2'},
                  {label:'システム3課', value:'3'},
                ],
              
                inputText: "fdfdfd",
                targetText: "ffdfd",
                option: {
                  errorCorrectionLevel: "M",
                  maskPattern: 0,
                  margin: 5,
                  scale: 2,
                  width: 200,
                  color: {
                    dark: "#000000FF",
                    light: "#FFFFFFFF"
                  }
              }            
            }
        },
        
        created() {
          Echo.channel("dashBordChannel")
          .listen("DashBordEvent", (e) => {
             this.getDashbordUser();
          })
          this.getDashbordUser();
          this.getWorkerUser();
          this.getPartstructr();
        },

        methods: {
           reload() {
            this.getDashbordUser()
           },

           getWorkerUser() {
             axios.get('/api/workermaster')
            .then(res => this.workerUsers = res.data.data)
            .catch(error => console.log(error.res.data))
           },

          getPartstructr() {
             axios.get('/api/Partstruct')
            .then(res => this.Partstructs = res.data.data)
            .catch(error => console.log(error.res.data))
           },

          openKmiki() {
            this.kumiki = true;
          },

          updateStatus(status) {
            var status = status;
            const userProfile = {
              id: this.id ,
              status:status
            }
          
            this.update(userProfile)
          },



          update(userProfile) {
              axios.patch(`/api/Productionexe/${userProfile.id}`, userProfile)
              .then(res =>  console.log(res.data))
              .catch(error => console.log(error.res))
              this.getDashbordUser();
          },

          getDashbordUser() {
             axios.get('/api/Productionexe')
            .then(res => this.dashboardusers = res.data.data)
            .catch(error => console.log(error.res.data))
      
          },

          updateUserModal(user) {
            this.postItem = user;
            this.id          = this.postItem["id"];
            this.lineCode    = this.postItem["lineCode"];
            this.partNo      = this.postItem["partNo"];
            this.showUpdateUserModal= true;
          },
          closeUserModal() {
            this.showUpdateUserModal = false;
          },

          customFilter(items, filters, filter, headers) {
            // Init the filter class.
            const cf = new this.$MultiFilters(items, filters, filter, headers);

            cf.registerFilter('search', function (searchWord, items) {
              if (searchWord.trim() === '') return items;

              return items.filter(item => {
                return item.name.toLowerCase().includes(searchWord.toLowerCase());
              }, searchWord);

            });


            cf.registerFilter('lineCode', function (lineCode, items) {
              if (lineCode.trim() === '') return items;

              return items.filter(item => {
                return item.lineCode.toLowerCase() === lineCode.toLowerCase();
              }, lineCode);

            });

            // Its time to run all created filters.
            // Will be executed in the order thay were defined.
            return cf.runFilters();
          },


          /**
           * Handler when user input something at the "Filter" text field.
           */
          filterSearch(val) {
            this.filters = this.$MultiFilters.updateFilters(this.filters, {search: val});
          },

          /**
           * Handler when user  select some author at the "Author" select.
           */
          filterLineCode(val) {
            this.filters = this.$MultiFilters.updateFilters(this.filters, {lineCode: val});
          },
      }
    }
</script>

<style>

table.v-table thead th {
  padding: 0 !important;
  font-size: 18px !important;
}

table.v-table tbody td {
  font-size: 16px !important;
}

.zaiseki-badge, .riseki-badge, .torikomi-badge, .renraku-badge, .taiseki-badge {
  margin-right: 2px !important;
  margin-left: 2px !important;
  font-size: 16px !important;
  padding: 3px !important;
  color: white;
  border-radius: 6px;
  box-shadow: 0 0 3px #ddd;
  white-space: nowrap;
  text-align: center;
}
.zaiseki-badge {
  background-color: blue; 
  cursor: pointer;
}
.riseki-badge {
  background-color: green; 
  cursor: pointer;
}
.torikomi-badge {
  background-color: red; 
  cursor: pointer;
}
.renraku-badge {
  background-color: orange; 
  cursor: pointer;
}
.taiseki-badge {
  background-color: #E91E63; 
  cursor: pointer;
}
</style>
