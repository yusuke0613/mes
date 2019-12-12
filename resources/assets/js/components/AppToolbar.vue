<template >
  <v-toolbar
    id="core-toolbar"
    app
    flat
    prominent
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
</template>

<script>

export default {
  data: () => ({
   
    title: "Sample App",
    responsive: false,
    items: [
      {title : 'Login', to : '/login', show : !User.loggedIn()},
      {title : 'Logout', to : '/logout', show : User.loggedIn()}
    ]
  }),

  watch: {
    '$route' (val) {
      this.title = val.name
    }
  },

  mounted () {
   
  },
  beforeDestroy () {
  
  },

  methods: {
  
  }
}
</script>

<style>
  #core-toolbar a {
    text-decoration: none;
  }
</style>
