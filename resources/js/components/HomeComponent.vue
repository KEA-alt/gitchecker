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
                    <b-button class="px-5" variant="outline-primary">GO</b-button>
                </div>
            </div>
        </div>
        <div class="bg-dark py-5 row d-flex justify-content-center">
            <div class="card-deck">
                <b-card bg-variant="light" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome.png" style="width: 30%; margin: 2em 0;" img-alt="Image" img-top>
                    </b-card-img>
                    <b-card-text>
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content
                        is a little bit longer.
                    </b-card-text>
                </b-card>

                <b-card bg-variant="light" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome2.png" style="width: 30%; margin: 2em 0;" img-alt="Image"
                        img-top></b-card-img>
                    <b-card-text>
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content
                        is a little bit longer.
                    </b-card-text>
                </b-card>

                <b-card bg-variant="light" text-variant="Dark" class="text-center mb-3" style="max-width: 18rem;">
                    <b-card-img src="img/gitcheckerHome3.png" style="width: 30%; margin: 2em 0;" img-alt="Image"
                        img-top></b-card-img>
                    <b-card-text>
                        This is a wider card with supporting text below as a
                        natural lead-in to additional content. This content
                        is a little bit longer.
                    </b-card-text>
                </b-card>
            </div>
        </div>


        <div class="row align-items-center bg-white">
            <b-card no-body class="overflow-hidden" style="max-width: 80%; margin: 2em auto;">
                <b-row no-gutters>
                    <b-col md="6">
                        <b-card-img src="img/ordi.png" alt="Image" class="rounded-0">
                        </b-card-img>
                    </b-col>
                    <b-col md="6">
                        <b-card-body class="p-5" title="TITRE BLOC">
                            <b-card-text class="py-5">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Mauris pretium vehicula orci. Integer at porta risus, ut
                                eleifend ipsum. Quisque molestie ligula sapien, sed mollis
                                lectus malesuada eget. Pellentesque habitant morbi tristique
                                senectus et netus et malesuada fames ac turpis egestas.
                                Phasellus mauris diam, sodales id urna ac, condimentum
                                convallis purus.
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
