<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Audit de sécurité
            </h1>
        </div>

        <div class=" p-5  bg-white">
            <p class="d-flex justify-content-center text-center">
                Déposez votre lien juste ici et nous nous occupons de tout. Le résultat vous sera envoyé par mail d'ici quelques secondes, soyez patient, ça arrive !
            </p>

            <div class="my-5">
                <b-form inline class="justify-content-center" @submit.prevent="submitAudit">

                    <label class="sr-only" for="inputEmail3">E-mail</label>
                    <b-input-group prepend="@" class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input type="email" id="inputEmail3" v-model="auditEmail" :state="mailState" placeholder="E-mail" trim></b-input>
                    </b-input-group>

                    <label class="sr-only" for="inputUrl">Lien du Git</label>
                    <b-input-group class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input-group-prepend is-text>
                            <b-icon icon="link45deg"></b-icon>
                        </b-input-group-prepend>

                        <b-input type="url" id="inputUrl" v-model="auditLinkRepo" :state="urlState" placeholder="Lien du Git" trim></b-input>
                    </b-input-group>

                    <b-button type="submit" :disabled="btnState" variant="dark">Envoyer</b-button>
                </b-form>
            </div>

            <b-alert class="text-center" :show="responseSuccessShow" variant="success">{{ responseSuccessMessage }}</b-alert>
            <b-alert class="text-center" :show="responseErrorShow" variant="danger">{{ responseErrorMessage }}</b-alert>

            <div class="d-flex justify-content-center ">
                <b-img class="" width="150" height="150" src="img/audit.png" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            mailState() {
                if (this.auditEmail) {
                    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (re.test(this.auditEmail)) {
                        this.btnState2 = true;
                        return true;
                    }else{
                        this.btnState2 = false;
                        return false;
                    }
                } else {
                    //ne rien faire car value est null
                    
                }
            },
            urlState() {
                if (this.auditLinkRepo) {
                    var re = /(?:(?:https:\/\/github.com\/.+))/;
                    if (re.test(this.auditLinkRepo)) {
                        this.btnState1 = true;
                        return true;
                    }else{
                        this.btnState1 = false;
                        return false;
                    }
                } else {
                    //ne rien faire car value est null
                }
            },
            btnState() {
                if (this.btnState1 & this.btnState2) {
                    return false;
                }
                return true;
            }
        },
        data() {
            return {
                btnState1: false,
                btnState2: false,
                auditEmail: '',
                auditLinkRepo: '',
                responseSuccessMessage: '',
                responseSuccessShow: false,
                responseErrorMessage: '',
                responseErrorShow: false
            }
        },

        methods: {
            submitAudit() {
                    axios.post('/api/audit', {
                    mail: this.auditEmail,
                    link: this.auditLinkRepo
                })
                .then(response => {
                    if (response.data.message) {
                        this.responseSuccessMessage = response.data.message
                        this.responseErrorShow = false;
                        this.responseSuccessShow = true;
                    } else {
                        this.responseErrorMessage = response.data.error
                        this.responseSuccessShow = false;
                        this.responseErrorShow = true;
                    }
                })
                console.log(this.auditEmail);
                console.log(this.auditLinkRepo);
            }
        },
        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
