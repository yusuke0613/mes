 <template>
    <v-layout row wrap>  
      <v-flex xl12 lg12 md12 sm12 xs12 style="">
        <v-text-field style="color" prepend-icon="location_on" label="ユーザID" v-model="this.lineCode" />
      </v-flex>

      <v-dialog v-model="showUpdateUserModal" fullscreen hide-overlay transition="dialog-bottom-transition">
        <v-card>
          <v-toolbar style="background-color:#1976D2">
            <v-btn icon dark @click="showUpdateUserModal = false">
              <v-icon>clear</v-icon>
            </v-btn>
            <v-toolbar-title style="color:#fff">User Update</v-toolbar-title>
            <div class="flex-grow-1"></div>
          </v-toolbar>
        </v-card>
      </v-dialog>  
    </v-layout>  
</template>
<script>

    export default {
        watch: {
          a: function(v) { if (v.length >= 3) { this.$refs.r2.focus() } },
          b: function(v) { if (v.length >= 4) { this.$refs.r3.focus() } },
        },
        data() {
            return {
                dashboardusers: [],
                dashboarduser: [{ id: 1, name: 'aのitem' },{ id: 2, name: 'bのitem' }],
                loading: false,
                search: 'aaaaa',
                showModal2: false,
                pagination: { sortBy: 'name', descending: false, },
                setsearch(id) {
                  this.search = id
                },
                postItem: { id: 1, displayId:'1', name: 'aのitem' },
              
            }
        },
        
        created() {
          Echo.channel("dashBordChannel")
          .listen("DashBordEvent", (e) => {
             this.getDashbordUser();
          })
          this.getDashbordUser();
          document.getElementById('lineId').focus();
        },

        methods: {
           reload() {
            this.getDashbordUser()
           },

          update(userProfile) {
              axios.patch(`/api/hostmaster/${userProfile.id}`, userProfile)
              .then(res =>  console.log(res.data))
              .catch(error => console.log(error.res))
              this.getDashbordUser();
          },
          getDashbordUser() {
             axios.get('/api/hostmaster')
            .then(res => this.dashboardusers = res.data.data)
            .catch(error => console.log(error.res.data))
      
          },

          updateUserModal(user) {
            this.postItem = user;
            this.displayId   = this.postItem["displayId"];
            this.displayName = this.postItem["displayName"];
            this.firstName   = this.postItem["firstName"];
            this.lastName    = this.postItem["lastName"];
            this.rankNo      = this.postItem["rankNo"];
            this.phoneNo     = this.postItem["phoneNo"];
            this.belongsName = this.postItem["belongsName"];
            this.mail        = this.postItem["mail"];
            this.Belongs     = { label: this.postItem["belongsName"], value: this.postItem["belongsId"] };

            console.log(this.Belongs);

            this.showUpdateUserModal= true;
          },
          closeUserModal() {
            this.showUpdateUserModal = false;
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
