<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Rapport</h1>
        </div>

        <div class=" p-5  bg-white">
            <!--
            <div id="v-for-object" class="demo">
                <div v-for="(message, name) in content.files" :key="message.message">
                    Il y a {{ message.errors }} erreurs dans le fichier : <br>{{ name }} <br><br>
                    <div>
                        <div v-for="(message, name) in message.messages" :key="message.message">
                            Erreur numéro :
                            {{ name }}<br>Message :
                            {{message.message}}<br>Ligne : {{message.line}}<br>
                        </div>
                    </div>
                    <br><br>
                </div>
            </div>
            -->

            <div id="accordion">
                <div class="card" v-for="(message, name, index) in content.files" :key="message.message">
                    <div class="card-header" v-bind:id="'heading'+index">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" v-bind:data-target="'#collapse'+index"
                                aria-expanded="false" v-bind:aria-controls="'collapse'+index">
                                Il y a {{ message.errors }} erreurs dans le fichier : <br>{{ name }}
                            </button>
                        </h5>
                    </div>
                    <div v-bind:id="'collapse'+index" class="collapse" v-bind:aria-labelledby="'heading'+index" data-parent="#accordion" v-for="(message, name) in message.messages" :key="message.message">
                        <template v-if="message.ignorable">
                            <div class="card-body alert alert-warning" >
                                Erreur numéro : {{ name }}<br>Message : {{message.message}}<br>Ligne : {{message.line}}<br>
                            </div>  
                        </template>
                        <template v-else>
                            <div class="card-body alert alert-danger" >
                                Erreur numéro : {{ name }}<br>Message : {{message.message}}<br>Ligne : {{message.line}}<br>
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
                content: [],
                reportId: this.$route.params.reportId
            }
        },

        created() {
            axios.get('/report/' + this.reportId + '/output.json').then(response => {
                this.content = response["data"];
            }).catch(err => console.error(err));
        },

        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
