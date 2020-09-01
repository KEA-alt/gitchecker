<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Rapport</h1>
        </div>
        <div class=" p-5  bg-white">
            <div id="accordion" class="container">
                <div>
                    <b-card no-body>
                        <b-tabs card>
                            <b-tab title="PhpStan" active>
                                <b-card-text>
                                    <div role="tablist" v-for="(message, name, index) in contentPhpStan.files"
                                        :key="name.value">
                                        <b-card no-body class="mb-1">
                                            <b-card-header header-tag="header" class="p-0" role="tab">
                                                <b-button block v-b-toggle="'accordion-'+index" variant="light">
                                                    <p>Il y a {{ message.errors }} erreurs dans le fichier : </p>
                                                    <p>{{ name }}</p>
                                                </b-button>
                                            </b-card-header>
                                            <b-collapse v-bind:id="'accordion-'+index" accordion="my-accordion"
                                                role="tabpanel" v-for="(message, name) in message.messages"
                                                :key="name.value">
                                                <template v-if="message.ignorable">
                                                    <b-card-body>
                                                        <h4>
                                                            <b-badge style="vertical-align: top;" variant="warning">
                                                                Attention
                                                            </b-badge>
                                                        </h4>
                                                        <b-card-text>
                                                            <p><strong>Erreur numéro :</strong> {{ name }}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Message : </strong>{{message.message}}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Ligne : </strong>{{message.line}}</p>
                                                        </b-card-text>
                                                    </b-card-body>
                                                </template>
                                                <template v-else>
                                                    <b-card-body>
                                                        <h4>
                                                            <b-badge style="vertical-align: top;" variant="danger">
                                                                Critique
                                                            </b-badge>
                                                        </h4>
                                                        <b-card-text><strong>Erreur numéro : </strong>{{ name }}
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Message : </strong>{{message.message}}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Ligne : </strong>{{message.line}}</p>
                                                        </b-card-text>
                                                    </b-card-body>
                                                </template>
                                            </b-collapse>
                                        </b-card>
                                    </div>
                                </b-card-text>
                            </b-tab>
                            <b-tab title="PhpCodeSniffer">
                                <b-card-text>
                                    <div role="tablist" v-for="(message, name, index) in contentPhpCS.files"
                                        :key="name.value">
                                        <b-card no-body class="mb-1">
                                            <b-card-header header-tag="header" class="p-0" role="tab">
                                                <b-button block v-b-toggle="'accordion-'+index" variant="light">
                                                    <p>Il y a {{ message.errors }} erreurs dans le fichier : </p>
                                                    <p>{{ name }}</p>
                                                </b-button>
                                            </b-card-header>
                                            <b-collapse v-bind:id="'accordion-'+index" accordion="my-accordion"
                                                role="tabpanel" v-for="(message, name) in message.messages"
                                                :key="name.value">
                                                <template v-if="message.ignorable">
                                                    <b-card-body>
                                                        <h4>
                                                            <b-badge style="vertical-align: top;" variant="danger">
                                                                Critique
                                                            </b-badge>
                                                        </h4>
                                                        <b-card-text>
                                                            <p><strong>Erreur numéro :</strong> {{ name }}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Message : </strong>{{message.message}}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Ligne : </strong>{{message.line}}</p>
                                                        </b-card-text>
                                                    </b-card-body>
                                                </template>
                                                <template v-else>
                                                    <b-card-body>
                                                        <h4>
                                                            <b-badge style="vertical-align: top;" variant="warning">
                                                                Attention
                                                            </b-badge>
                                                        </h4>
                                                        <b-card-text><strong>Erreur numéro : </strong>{{ name }}
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Message : </strong>{{message.message}}</p>
                                                        </b-card-text>
                                                        <b-card-text>
                                                            <p><strong>Ligne : </strong>{{message.line}}</p>
                                                        </b-card-text>
                                                    </b-card-body>
                                                </template>
                                            </b-collapse>
                                        </b-card>
                                    </div>
                                </b-card-text>
                            </b-tab>
                        </b-tabs>
                    </b-card>
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
                contentPhpCS: [],
                reportId: this.$route.params.reportId
            }
        },

        created() {
            axios.get('/report/' + this.reportId + '/phpstan.json').then(response => {
                this.contentPhpStan = response["data"];
            }).catch(err => console.error(err));

            axios.get('/report/' + this.reportId + '/phpcs.json').then(response => {
                this.contentPhpCS = response["data"];
            }).catch(err => console.error(err));
        },

        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
