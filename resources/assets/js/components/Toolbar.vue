<template>
<div>
  <v-navigation-drawer 
      app
      :mini-variant.sync="mini"
      class="deep-purple accent-4"
      dark
      permanent
    >
      <v-list style="padding: 0">


          <v-list-group
            prepend-icon="access_alarm"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>DashBoard</v-list-tile-title>
              </v-list-tile>
            </template>

            <v-list-tile
              v-for="(dashBoard, i) in dashBoards"
              :key="i"
            >
              <router-link :to="dashBoard[2]" style="color:#fff">
              <v-list-tile-title v-text="dashBoard[0]"></v-list-tile-title>
              </router-link>
            </v-list-tile>
          </v-list-group>


          <v-list-group
            prepend-icon="account_circle"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>Admin</v-list-tile-title>
              </v-list-tile>
            </template>

            <v-list-tile
              v-for="(admin, i) in admins"
              :key="i"
            >
                <router-link :to="admin[2]" style="color:#fff">
                <v-list-tile-title v-text="admin[0]"></v-list-tile-title>
                </router-link>
            </v-list-tile>
          </v-list-group>

          <v-list-group
            prepend-icon="build"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>Client</v-list-tile-title>
              </v-list-tile>
            </template>
            <v-list-tile
              v-for="(client, i) in clients"
              :key="i"

            >
              <v-list-tile-title v-text="client[0]"></v-list-tile-title>
              <v-list-tile-action>
                <v-icon v-text="client[1]"></v-icon>
              </v-list-tile-action>
            </v-list-tile>
          </v-list-group>

          <v-list-group
            prepend-icon="settings"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>Setting</v-list-tile-title>
              </v-list-tile>
            </template>

            <v-list-tile
              v-for="(setting, i) in settings"
              :key="i"
            >
              <router-link :to="setting[2]" style="color:#fff">
              <v-list-tile-title v-text="setting[0]"></v-list-tile-title>
              </router-link>
            </v-list-tile>
          </v-list-group>

      </v-list>   
    </v-navigation-drawer>

    
    </div>



</template>



<script>

    export default {
        props: ['mini'],
        data() {
            return {
            dashBoards: [
                    ['Line Board', 'donut_large', '/'],
                  ],

            admins: [
                    ['Production Plan', 'donut_large', '/tag'],
                    ['Production Exe' , 'donut_large', '/linesetting']
                  ],
            clients: [
              ['Throw'          , 'donut_large'],
              ['Interruption'   , 'donut_large']
            ],
            settings: [
              ['LineSetting'   , 'donut_large', '/linesetting'],
              ['HostSetting'   , 'donut_large', '/hostsetting'],
              ['ProcessSetting', 'donut_large', '/processsetting'],
              ['WorkerSettig'  , 'donut_large', '/workersetting']
            ],
            navBar:null,
            //mini: true,
            }
        },

        created() {
            EventBus.$on('logout', () => {
                User.logout()
            })

        }

    }

</script>



<style>

      a {

    text-decoration: none;

  }



</style>