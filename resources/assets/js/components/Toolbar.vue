<template>
<div>
  <v-navigation-drawer 
      app
      :mini-variant.sync="mini"
      style="background-color:#0D47A1;"
      dark
      permanent
    >
      <v-list style="padding: 0">
          <v-list-group
            prepend-icon="access_alarm"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>ダッシュボード</v-list-tile-title>
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
                <v-list-tile-title>管理者</v-list-tile-title>
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
                <v-list-tile-title>作業者</v-list-tile-title>
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
                <v-list-tile-title>設定</v-list-tile-title>
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
                    ['進捗画面', 'donut_large', '/'],
                  ],

            admins: [
                    ['製造実行' , 'donut_large', '/productionexe']
                  ],
            clients: [
              ['投入画面'          , 'donut_large'],
              ['作業中断'   , 'donut_large']
            ],
            settings: [
              ['ライン設定'  , 'donut_large', '/linesetting'],
              ['端末設定'    , 'donut_large', '/hostsetting'],
              ['工程設定'　  , 'donut_large', '/processsetting'],
              ['作業者設定'  , 'donut_large', '/workersetting']
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