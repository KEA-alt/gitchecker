<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Contact
            </h1>
        </div>

        <div class=" pt-5  bg-white ">
            <h2 class="d-flex justify-content-center">
                Restons en contact !
            </h2>
            <div class="d-flex justify-content-center">
                <p class="col-lg-8">
                    Une question, un renseignement ou même un conseil ? Nous sommes à votre écoute !
                    Remplissez le formulaire juste dessous et nous ferons tout pour vous répondre dans les plus bref
                    délais.<br>
                    À de suite ...
                </p>
            </div>
            <div class="d-flex justify-content-center pb-3">
                <img class="" width="150" height="150" src="img/contact.png" />
            </div>
        </div>

        <div class=" bg-white pb-5">

            <div class="my-5 px-5">
                <b-form @submit.prevent="submitContact">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <b-form-group id="fieldset-1" description="Communiquez-nous votre nom."
                                label="Entrez votre nom" label-for="idcontactLastname"
                                :invalid-feedback="lastnameInvalidFeedback" :valid-feedback="lastnameValidFeedback"
                                :state="lastnameState">
                                <b-form-input id="idcontactLastname" v-model="contactLastname" :state="lastnameState"
                                    trim></b-form-input>
                            </b-form-group>
                        </div>
                        <div class="form-group col-md-6">
                            <b-form-group id="fieldset-1" description="Communiquez-nous votre prénom."
                                label="Entrez votre prénom" label-for="idcontactFirstname"
                                :invalid-feedback="firstnameInvalidFeedback" :valid-feedback="firstnameValidFeedback"
                                :state="firstnameState">
                                <b-form-input id="idcontactFirstname" v-model="contactFirstname" :state="firstnameState"
                                    trim></b-form-input>
                            </b-form-group>
                        </div>
                    </div>

                    <b-form-input type="email" v-model="contactEmail" :state="mailState" placeholder="E-mail" trim>

                            <b-form-input id="idcontactFirstname" v-model="contactFirstname" :state="mailState"
                                trim></b-form-input>
                    </b-form-input>

                    <b-form-group id="fieldset-1" description="dit nous tout, on s'occupe du reste"
                        label="Votre message : " label-for="textarea" :invalid-feedback="textAreaInvalidFeedback"
                        :valid-feedback="textAreaValidFeedback" :state="textAreaState">

                        <b-form-textarea id="textarea" class="my-3" v-model="contactMessage" rows="3" max-rows="6" :state="textAreaState">
                        </b-form-textarea>

                    </b-form-group>

                    <b-button type="submit" :disabled="btnState" variant="dark">Envoyer</b-button>

                    <h3 id="pMsg" class="py-5 justify-content-center text-center">Message envoyée</h3>


                </b-form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        computed: {
            mailState() {
                if (this.contactEmail) {
                    var re =
                        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    if (re.test(this.contactEmail)) {
                        this.btnState1 = true;
                        return true;
                    } else {
                        this.btnState1 = false;
                        return false;
                    }
                }
            },
            lastnameState() {
                if (this.contactLastname) {
                    if(this.contactLastname.length >= 4){
                        this.btnState2 = true;
                        return true;
                    }else{
                        this.btnState2 = false;
                        return false;
                    }
                }
            },
            lastnameInvalidFeedback() {
                if (this.contactLastname) {
                    if (this.contactLastname.length > 4) {
                        return ''
                    } else if (this.contactLastname.length > 0) {
                        return 'Entrez au moins 4 caractères'
                    } else {
                        return 'Veuillez saisir quelque chose'
                    }
                }
            },
            lastnameValidFeedback() {
                if (this.contactLastname) {
                    return this.contactLastname === true ? 'Merci' : ''
                }
            },
            firstnameState() {
                if (this.contactFirstname) {
                    if(this.contactFirstname.length >= 4){
                        this.btnState3 = true;
                        return true;
                    }else{
                        this.btnState3 = false;
                        return false;
                    }
                }
            },
            firstnameInvalidFeedback() {
                if (this.contactFirstname) {
                    if (this.contactFirstname.length > 4) {
                        return ''
                    } else if (this.contactFirstname.length > 0) {
                        return 'Entrez au moins 4 caractères'
                    } else {
                        return 'Veuillez saisir quelque chose'
                    }
                }
            },
            firstnameValidFeedback() {
                if (this.contactFirstname) {
                    return this.contactFirstname === true ? 'Merci' : ''
                }
            },

            textAreaState() {
                if (this.contactMessage) {
                    if(this.contactMessage.length >= 20 ? true : false){
                        this.btnState4 = true;
                        return true;
                    }else{
                        this.btnState4 = false;
                        return false;
                    }
                }
            },
            textAreaInvalidFeedback() {
                if (this.contactMessage) {
                    if (this.contactMessage.length > 20) {
                        return ''
                    } else if (this.contactMessage.length > 0) {
                        return 'Entrez au moins 20 caractères'
                    } else {
                        return 'Veuillez saisir quelque chose'
                    }
                }
            },
            textAreaValidFeedback() {
                if (this.contactMessage) {
                    return this.contactMessage === true ? 'Merci' : ''
                }
            },
            btnState() {
                if (this.btnState1 & this.btnState2 & this.btnState3 & this.btnState4 ) {
                    return false;
                }
                return true;
            }
        },
        data() {
            return {
                btnState1: false,
                btnState2: false,
                btnState3: false,
                btnState4: false,
                contactFirstname: '',
                contactLastname: '',
                contactEmail: '',
                pMsg: '',
                contactMessage: ''
            }
        },

        methods: {
            submitContact() {
                axios.post('/api/contact', {
                    firstname: this.contactFirstname,
                    lastname: this.contactLastname,
                    mail: this.contactEmail,
                    message: this.contactMessage
                });
                this.pMsg.style.display = 'block'
                this.contactLastname = '';
                this.contactFirstname = '';
                this.contactEmail = '';
                this.contactMessage = '';
            }
        },
        mounted() {
            console.log("Component mounted.");
            this.pMsg = document.getElementById("pMsg")
            this.pMsg.style.display = 'none'
        }
    };

</script>
