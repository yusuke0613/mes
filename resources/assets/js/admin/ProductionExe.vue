 <template>
      <v-flex>
        <v-card xs12 class="m-3 px-3">
          <v-card-title class="title">
            生産実行
            <v-btn flat small fab @click="dialogOpen(props.item)"><v-icon color="orange ">add_circle_outline</v-icon></v-btn>
            <v-spacer></v-spacer>
            <v-text-field
              v-model="search"
              prepend-icon="search"
              label="Search"
              single-line
              hide-details
              clearable
            ></v-text-field>
          </v-card-title>

          <v-data-table
            :headers="headers"
            :items="dashboardusers"
            :pagination.sync="pagination"
            :rows-per-page-items='[10,25,50,{"text":"All","value":-1}]'
            :search="search"
            style="white-space: nowrap; padding:0 !important; font-size:16px !important;"
          >
            <template slot="items" slot-scope="props">
              <tr style="white-space: nowrap; padding:0;">
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" ><a @click="updateUserModal(props.item)">{{props.item['id']}}</a></td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['lineCode']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['partNo']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['planQty']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['delayQty']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['packingQty']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['orderQty']}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['planDate'] | moment}}</td>
                <td :class="'text-xs-center'" style="white-space: nowrap; padding:0;" >{{props.item['status']}}</td>
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
        </v-card>
        

        <v-dialog v-model="showUpdateUserModal" fullscreen hide-overlay transition="dialog-bottom-transition">
          <v-card>
            <v-toolbar class="deep-purple accent-4">
              <v-btn icon dark @click="showUpdateUserModal = false">
                <v-icon>clear</v-icon>
              </v-btn>
              <v-toolbar-title style="color:#fff">User Update</v-toolbar-title>
              <div class="flex-grow-1"></div>
            </v-toolbar>


            <v-container>
                 <v-layout row wrap >
                    <v-flex xl6 lg6 md6 sm6 xs6>
                      <vue-qrcode v-if="targetText" :value="targetText" :options="option" tag="img"></vue-qrcode>
                    </v-flex>
                    <v-flex xl6 lg6 md6 sm6 xs6>
                      <v-list two-line style=" ">
                        <v-list-tile>
                          <v-list-tile-action>
                            <v-icon color="orange">location_on</v-icon>
                          </v-list-tile-action>

                          <v-list-tile-content>
                            <v-list-tile-title style="color:black;">{{this.lineCode}}</v-list-tile-title>
                            <v-list-tile-sub-title style="color:black;">ラインID</v-list-tile-sub-title>
                          </v-list-tile-content>
                        </v-list-tile>

                        <v-divider inset></v-divider>
                        <v-list-tile>
                          <v-list-tile-action>
                            <v-icon color="orange">phone</v-icon>
                          </v-list-tile-action>

                          <v-list-tile-content>
                            <v-list-tile-title style="color:black;">{{this.partNo}}</v-list-tile-title>
                            <v-list-tile-sub-title style="color:black;">製品</v-list-tile-sub-title>
                          </v-list-tile-content>
                        </v-list-tile>

                      </v-list>
                    </v-flex>
                 </v-layout>
            </v-container>
          </v-card>
        </v-dialog>
        </v-flex>
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
                dashboardusers: [],
                dashboarduser: [{ id: 1, name: 'aのitem' },{ id: 2, name: 'bのitem' }],
                headers: [
                  {text: 'ID', align: 'center', value: 'id'},
                  //{text: '順番', align: 'center', value: 'turnNo'},
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
                  {text: 'ステータス',align: 'center', value: 'status'},
                  {text: '開始',align: 'center', value: 'startDate'},
                  {text: '終了',align: 'center', value: 'endDate'},
                  
                ],
                search: '',
                showModal2: false,
                pagination: { sortBy: 'name', descending: false, },
                setsearch(id) {
                  this.search = id
                },
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
        },

        methods: {
           reload() {
            this.getDashbordUser()
           },


           updateUser (dashboarduser) {
            var status = dashboarduser.status;
    
            if(dashboarduser.status == 2) {
              status = 0;
            } else {
              status++;
            }
            const userProfile = {
              locationId:dashboarduser.locationId,
              location:dashboarduser.location,
              id:dashboarduser.id,
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
            alert(user);
            this.postItem = user;
            this.id          = this.postItem["id"];
            this.lineCode    = this.postItem["lineCode"];
            this.partNo      = this.postItem["partNo"];
      
            this.showUpdateUserModal= true;
          },
          closeUserModal() {
            this.showUpdateUserModal = false;
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
  color:rgb(46, 125, 50) !important;
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
