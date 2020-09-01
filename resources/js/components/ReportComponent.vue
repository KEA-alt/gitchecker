<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Rapport</h1>
        </div>
        <div class=" p-5  bg-white">
            <div id="accordion" class="container">
                <div class="card" v-for="(message, name, index) in contentPhpStan.files" :key="message.message">
                    <div class="card-header text-center" v-bind:id="'heading'+index">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                v-bind:data-target="'#collapse'+index" aria-expanded="false"
                                v-bind:aria-controls="'collapse'+index">
                                <p>Il y a {{ message.errors }} erreurs dans le fichier : </p>
                                <p><strong>{{ name }}</strong></p>
                            </button>
                        </h5>
                    </div>
                    <div v-bind:id="'collapse'+index" class="collapse" v-bind:aria-labelledby="'heading'+index"
                        data-parent="#accordion" v-for="(message, name) in message.messages" :key="message.message">
                        <template v-if="message.ignorable">
                            <div class="card-body alert-warning">
                                <p><strong>Erreur numéro : </strong>{{ name }}</p>
                                <p><strong>Message : </strong>{{message.message}}</p>
                                <p><strong>Ligne : </strong>{{message.line}}</p>
                            </div>
                        </template>
                        <template v-else>
                            <div class="card-body alert-danger">
                                Erreur numéro : {{ name }}<br>Message : {{message.message}}<br>Ligne :
                                {{message.line}}<br>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
        <div class=" p-5  bg-white">
            <div id="accordion" class="container">
                <div class="card" v-for="(message, name, index) in contentPhpStan.files" :key="message.message">
                    <div class="card-header text-center" v-bind:id="'heading'+index">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse"
                                v-bind:data-target="'#collapse'+index" aria-expanded="false"
                                v-bind:aria-controls="'collapse'+index">
                                <p>Il y a {{ message.errors }} erreurs dans le fichier : </p>
                                <p><strong>{{ name }}</strong></p>
                            </button>
                        </h5>
                    </div>
                    <div v-bind:id="'collapse'+index" class="collapse" v-bind:aria-labelledby="'heading'+index"
                        data-parent="#accordion" v-for="(message, name) in message.messages" :key="message.message">
                        <template v-if="message.ignorable">
                            <div class="card-body alert-warning">
                                <p><strong>Erreur numéro : </strong>{{ name }}</p>
                                <p><strong>Message : </strong>{{message.message}}</p>
                                <p><strong>Ligne : </strong>{{message.line}}</p>
                            </div>
                        </template>
                        <template v-else>
                            <div class="card-body alert-danger">
                                Erreur numéro : {{ name }}<br>Message : {{message.message}}<br>Ligne :
                                {{message.line}}<br>
                            </div>
                        </template>
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
                contentPhpStan: [],
                reportId: this.$route.params.reportId
            }
        },

        created() {
            axios.get('/report/' + this.reportId + '/output.json').then(response => {
                this.contentPhpStan = response["data"];
            }).catch(err => console.error(err));
        },

        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
