<template>
    <div>
        <div class="p-4 slider">
            <div class="m-5 p-5">
                <h1 class="mt-5 d-flex justify-content-center">GITCHECKER</h1>
                <h2 style="text-align: center;" class="d-flex justify-content-center">
                    Vous pemet de faire des audits de cybersécurité<br />de
                    votre Git en quelques cliques
                </h2>
                <div class="d-flex justify-content-center m-5">
                    <b-button class="px-5" variant="dark">GO</b-button>
                </div>
            </div>
        </div>
        <div class="bg-dark py-5 row d-flex justify-content-center">
            <div class="card-deck">
                <b-card bg-variant="white" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome.png" style="width: 30%; margin: 2em 0;" img-alt="Image" img-top>
                    </b-card-img>
                    <b-card-text>
                        Un outil simple qui permet de connaître toutes les
                        failles de son code en quelques cliques pour plus de
                        fiabilité !
                    </b-card-text>
                </b-card>

                <b-card bg-variant="white" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome2.png" style="width: 30%; margin: 2em 0;" img-alt="Image"
                        img-top></b-card-img>
                    <b-card-text>
                        Un résultat d'audit de sécurité rapide, complet, épuré
                        et facile à comprendre à la porté de tous
                    </b-card-text>
                </b-card>

                <b-card bg-variant="white" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome3.png" style="width: 30%; margin: 2em 0;" img-alt="Image"
                        img-top></b-card-img>
                    <b-card-text>
                        Un fois fini n'hésitez pas à nous faire un retour de
                        votre experience avec GitChecker pour une amélioration
                        en continue. Si vous avez aimé vous pouvez partager nos
                        réseaux sociaux ou laisser un don sur la cagnotte !
                    </b-card-text>
                </b-card>
            </div>
        </div>


        <div class="row align-items-center">
            <b-card no-body class="overflow-hiddenp-3" border-variant="white">
                <b-row no-gutters>
                    <b-col md="6" class="d-flex justify-content-center">
                        <b-card-img src="img/ordi.png" alt="Image" class="rounded-0 gitImg"></b-card-img>
                    </b-col>
                    <b-col md="6">
                        <b-card-body class="p-5" title="Comment ça marche ?">
                            <b-card-text class="py-5">
                                Copiez le lien de votre Git à analyser.
                                <br />Allez dans la page Audit de sécurité, coller
                                votre Url plus cliquez sur le bouton
                                Analyser.
                                <br />Le rapport complet vous sera envoyé par mail dans quelques
                                secondes.
                                <br />Corrigez votre code. Vous avez terminé !
                                <br />Maintenant votre code et sans fautes, propore et
                                sécurisé.
                            </b-card-text>
                        </b-card-body>
                    </b-col>
                </b-row>
            </b-card>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
