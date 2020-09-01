<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Audit de sécurité
            </h1>
        </div>

        <div class=" p-5  bg-white">
            <h2 class="d-flex justify-content-center">
                SOUS TITRE
            </h2>
            <p class="d-flex justify-content-center">
                Explications à rédiger<br />
                Pellentesque habitant morbi tristique senectus et netus et
                malesuada fames ac turpis egestas. Phasellus mauris diam,
                sodales id urna ac, condimentum convallis purus. Lorem ipsum
                dolor sit amet, consectetur adipiscing elit. Mauris pretium
                vehicula orci. Integer at porta risus, ut eleifend ipsum.
                Quisque molestie ligula sapien, sed mollis lectus malesuada
                eget. Pellentesque habitant morbi tristique senectus et netus et
                malesuada fames ac turpis egestas. Phasellus mauris diam,
                sodales id urna ac, condimentum convallis purus.<br />
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris
                pretium vehicula orci. Integer at porta risus, ut eleifend
                ipsum. Quisque molestie ligula sapien, sed mollis lectus
                malesuada eget. Lorem ipsum dolor sit amet, consectetur
                adipiscing elit. Mauris pretium vehicula orci. Integer at porta
                risus, ut eleifend ipsum. Quisque molestie ligula sapien, sed
                mollis lectus malesuada eget.
            </p>

            <div class="my-5">
                <b-form inline class="justify-content-center" @submit.prevent="submitAudit">

                    <label class="sr-only" for="inputEmail3">E-mail</label>
                    <b-input-group prepend="@" class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input type="email" id="inputEmail3" v-model="auditEmail" placeholder="E-mail"></b-input>
                    </b-input-group>

                    <label class="sr-only" for="inputUrl">Lien du Git</label>
                    <b-input-group class="mb-2 mr-sm-2 mb-sm-0">
                        <b-input-group-prepend is-text>
                            <b-icon icon="link45deg"></b-icon>
                        </b-input-group-prepend>

                        <b-input type="url" id="inputUrl" v-model="auditLinkRepo" placeholder="Lien du Git"></b-input>
                    </b-input-group>

                    <b-button type="submit" variant="primary">Envoyer</b-button>
                </b-form>

                <div>
                    <b-progress :value="78" :max="100" animated class="w-25 my-5 mx-auto"></b-progress>
                </div>

            </div>


            <div class="d-flex justify-content-center ">
                <b-img class="" width="150" height="150" src="img/audit.png" />
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                auditEmail: '',
                auditLinkRepo: ''
            }
        },

        methods: {
            submitAudit() {
                axios.post('/api/audit', {
                    mail: this.auditEmail,
                    link: this.auditLinkRepo
                });
                console.log(this.auditEmail);
                console.log(this.auditLinkRepo);
            }
        },
        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
