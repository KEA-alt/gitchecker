<template>
    <div>
        <div class="p-4 slider">
            <div class="m-5 p-5">
                <h1 class="mt-5 d-flex justify-content-center">GITCHECKER</h1>
                <h2 class="d-flex justify-content-center">
                    Vous pemet de faire des audits de cybersécurité<br />de
                    votre Git en quelques cliques
                </h2>
                <div class="d-flex justify-content-center m-5">
                    <button type="button" class="mb-5 btn btn-dark">
                        Go !
                    </button>
                </div>
            </div>
        </div>
        <div class="bg-dark p-5 row d-flex justify-content-center">
            <div class="card-deck">
                <div class="card  mb-3 p-3" style="max-width: 18rem;">
                    <img
                    class=""
                    width="70" height="70"
                    src="img/gitcheckerHome.png"
                />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content
                            is a little bit longer.
                        </p>
                    </div>
                </div>
                <div class="card  mb-3 p-3" style="max-width: 18rem;">
                    <img
                    class=""
                    width="70" height="70"
                    src="img/gitcheckerHome2.png"
                />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content
                            is a little bit longer.
                        </p>
                    </div>
                </div>
                <div class="card  mb-3 p-3" style="max-width: 18rem;">
                    <img
                    class=""
                    width="70" height="70"
                    src="img/gitcheckerHome3.png"
                />
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                            This is a wider card with supporting text below as a
                            natural lead-in to additional content. This content
                            is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center bg-white">
            <div class="p-5 col-12 col-md-5 col-lg-7 order-md-2">
                <h2 class="p-3">TITRE BLOC</h2>
                <p class="p-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Mauris pretium vehicula orci. Integer at porta risus, ut
                    eleifend ipsum. Quisque molestie ligula sapien, sed mollis
                    lectus malesuada eget. Pellentesque habitant morbi tristique
                    senectus et netus et malesuada fames ac turpis egestas.
                    Phasellus mauris diam, sodales id urna ac, condimentum
                    convallis purus.
                </p>
            </div>
            <div class="col-12 col-md-5 col-lg-5 order-md-2">
                <img
                    class="img-fluid mb-6 mb-md-0"
                    src="img/ordi.png"
                />
            </div>
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
