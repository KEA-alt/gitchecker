<template>
<div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Panel Admin
            </h1>
        </div>
  <div class="container">
    <div class="row justify-content-md-center padding">
      <div class="col-6">
        <div class="card card-default">
          <div class="card-header">Administration</div>
          <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
              <p v-if="error == 'login_error'">One moment...</p>
              <p v-else>Identifiants incorrects</p>
            </div>
            <form autocomplete="off" @submit.prevent="login" method="post">
              <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email" required>
              </div>
              <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" id="password" class="form-control" v-model="password" required>
              </div>
              <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>
<script>
    export default {
    data() {
      return {
        email: null,
        password: null,
        success: false,
        has_error: false,
        error: ''
      }
    },
    mounted() {
      //
    },
    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this

        this.$auth.login({
          data: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            app.success = true
            const redirectTo = 'dashboard'
            this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
            app.error = res.response.data.error
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>

<style scoped>
.padding {
  padding: 20px 0;
}
</style>