
<template >
    <div style="background-color:#ECEFF1 !important;">

    <div style="">
    <toolbar :mini=mini  ></toolbar>
    </div>
    <v-toolbar
      id="core-toolbar"
      app
      flat
      prominent
      style="background: #eee;"
    >
      <v-icon @click.stop="mini = !mini">list</v-icon>
      
      <v-spacer />
      <router-link 
        v-for="item in items"
        :key="item.title"
        :to="item.to"
        v-if="item.show"
      >
          <v-btn>{{item.title}}</v-btn>
      </router-link>
    </v-toolbar>
   


     <v-content style="background-color:#ECEFF1 !important;">

      <v-container fluid fill-height>
        <v-fade-transition mode="out-in">
          <router-view></router-view>
        </v-fade-transition>
      </v-container>
    </v-content>
    </div>

</template>




<script>
    import toolbar from './Toolbar'
    import AppToolbar from './AppToolbar'
    import Login from '../login/Login'
    export default {
        components:{toolbar,Login, AppToolbar},
        methods:{
          test() {
            return !location.pathname.match(/^\/dashboard/);
          }
        },

      data: () => ({
          mini:true,
          items: [
            {title : 'Login', to : '/login', show : !User.loggedIn()},
            {title : 'Logout', to : '/logout', show : User.loggedIn()}
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
