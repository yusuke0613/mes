<template>
    <v-container>
        <v-form @submit.prevent="login">
            <v-text-field
            v-model="form.email"
            label="E-mail"
            required
            ></v-text-field>

            <v-text-field
            v-model="form.password"
            label="Password"
            required
            type="password"
            ></v-text-field>

            <v-btn
                type="submit"
                style="color:#fff;background-color:#3F51B5"
            >Login
            </v-btn>
        </v-form>
    </v-container>
</template>

<script>
    
    export default {
        data(){
            return {
                form : {
                    email: null,
                    password:null
                }
            }
        },

        created() {
            if (User.loggedIn()) {
                this.$router.push({name:'top'})
            }
        },
        methods:{
            login(){
               User.login(this.form)
            }
        }
    }
</script>

<style>

</style>
