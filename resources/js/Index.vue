<template>
    <div id="main">
       <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
                <img class="navbar-brand logoNav" src="">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link text-light text-uppercase">Accueil</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/audit" class="nav-link text-light text-uppercase">Audit de sécurité
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/documentation" class="nav-link text-light text-uppercase">Documentation
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/donate" class="nav-link text-light text-uppercase">Donation</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/contact" class="nav-link text-light text-uppercase">Contact</router-link>
                        </li>
                    </ul>
                     <ul class="nav justify-content-end" v-if="!$auth.check()">
                        <li class="nav-item mr-2">
                            <router-link to="/login" class="btn btn-outline-light">Administration</router-link>
                        </li>
                    </ul>
                    <ul class="nav justify-content-end" v-if="$auth.check()">
                        <li class="nav-item mr-2">
                            <a class="btn btn-outline-light" href="#" @click.prevent="$auth.logout()">Se déconnecter</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <div id="content">
            <router-view></router-view>
        </div>
         <footer>
            <div class="navbar navbar-expand-lg navbar-dark bg-dark p-4 row align-items-center">

                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2 text-light">
                    <h3>BESOIN D'AIDE</h3>
                    <router-link to="/documentation" class="btn btn-light mt-2">Documentation</router-link>
                </div>
                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2  text-light">
                    <h3>CONTACTEZ-NOUS</h3>

                </div>
                <div class="p-5 col-12 col-md-5 col-lg-4 order-md-2 text-light">
                    <h3>GITCHECKER</h3>
                    <p>est un outil d'audit de cybersécurité</p>
                    <p>Copyright © It-Akademy 2020 </p>
                </div>

            </div>
        </footer>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        routes: {
          // UNLOGGED
          unlogged: [
            { name: 'Login', path: 'login'}
          ],
          // LOGGED USER
          user: [
            { name: 'Dashboard', path: 'dashboard' }
          ],
        }
      }
    },
    components: {
      
    }
  }
</script>