<template>
<div>

  <v-navigation-drawer 
      app
      :mini-variant.sync="mini"
      style="background-color: rgba(0,0,0,0.5) !important;"
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
              v-if="dashBoard[3]"
            >
              <router-link :to="dashBoard[2]" style="color:#fff">
              <v-list-tile-title v-text="dashBoard[0]"></v-list-tile-title>
              </router-link>
            </v-list-tile>
          </v-list-group>


          <v-list-group
            prepend-icon="account_circle"
            v-if="loginFlg"
          >
            <template v-slot:activator>
              <v-list-tile>
                <v-list-tile-title>管理者</v-list-tile-title>
              </v-list-tile>
            </template>

            <v-list-tile
              v-for="(admin, i) in admins"
              :key="i"
              v-if="admin[3]"
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
              <router-link :to="client[2]" style="color:#fff">
              <v-list-tile-title v-text="client[0]"></v-list-tile-title>
              </router-link>
            </v-list-tile>
          </v-list-group>

          <v-list-group
            prepend-icon="settings"
            v-if="loginFlg"
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
                    ['進捗画面', 'donut_large', '/' , true],
                  ],

            admins: [
                    ['製造実行' , 'donut_large', '/productionexe', User.loggedIn()]
                  ],
            clients: [
              ['投入画面'   , 'donut_large', '/inputWork' , true],
            ],
            settings: [
              ['ライン設定'  , 'donut_large', '/linesetting'    , User.loggedIn()],
              ['端末設定'    , 'donut_large', '/hostsetting'    , User.loggedIn()],
              ['工程設定'　  , 'donut_large', '/processsetting' , User.loggedIn()],
              ['作業者設定'  , 'donut_large', '/workersetting'  , User.loggedIn()]
            ],
            navBar:null,
            //mini: true,
            loginFlg: User.loggedIn()
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