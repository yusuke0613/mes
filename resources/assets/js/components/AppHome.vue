
<template>
    <div>
    
    <v-toolbar
      id="core-toolbar"
      app
      flat
      prominent
      style="background: #eee;"
    >

    <v-icon  @click.stop="mini = !mini">lists</v-icon>
    <v-spacer />

    <v-toolbar-items>
      <v-flex align-center  layout  py-2>
        <v-menu  bottom  left  content-class="dropdown-menu"  offset-y  transition="slide-y-transition">
          <router-link
            v-ripple
            slot="activator"
            class="toolbar-items"
            to="/notifications"
          >
            <v-badge
              color="error"
              overlap
            >
              <template slot="badge">
                {{ notifications.length }}
              </template>
              <v-icon color="tertiary">email</v-icon>
            </v-badge>
          </router-link>
          <v-spacer />
          <v-card>
            <v-list dense>
              <v-list-tile
                v-for="notification in notifications"
                :key="notification"
                @click="onClick"
              >
                <v-list-tile-title
                  v-text="notification"
                />
              </v-list-tile>
            </v-list>
          </v-card>

        </v-menu>

      </v-flex>
    </v-toolbar-items>
  </v-toolbar>
    <toolbar :mini=mini></toolbar>


     <v-content>

      <v-container fluid fill-height>
        <v-fade-transition mode="out-in">
          <router-view></router-view>
        </v-fade-transition>
      </v-container>
    </v-content>

    <app-footer></app-footer>

   

    </div>

</template>




<script>
    import toolbar from './Toolbar'
    import AppToolbar from './AppToolbar'
    import AppFooter from './Appfooter'
    import Login from '../login/Login'
    export default {
        components:{toolbar,AppFooter,Login, AppToolbar},
        methods:{
          test() {
            return !location.pathname.match(/^\/dashboard/);
          }
        },

      data: () => ({
          mini:false,
          notifications: [
            'Mike, John responded to your email',
            'You have 5 new tasks',
            'You\'re now a friend with Andrew',
            'Another Notification',
            'Another One'
          ],
          title: "Sample App",
          responsive: false
        }),

        watch: {
          '$route' (val) {
            this.title = val.name
          }
        },
        mounted () {
          this.onResponsiveInverted()
          window.addEventListener('resize', this.onResponsiveInverted)
        },
        beforeDestroy () {
          window.removeEventListener('resize', this.onResponsiveInverted)
        },

        methods: {
          
          onClickBtn () {
            this.setDrawer(!this.$store.state.app.drawer)
          },
          onClick () {
            //
          },
          onResponsiveInverted () {
            if (window.innerWidth < 991) {
              this.responsive = true
            } else {
              this.responsive = false
            }
          }
        }
      }
</script>

<style>
  #core-toolbar a {
    text-decoration: none;
  }
</style>


    }

   
  
</script>

<style>

</style>
