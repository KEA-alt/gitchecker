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
                <form class="m-5">
                    <div class="form-group row col-md-6 mx-auto">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"
                            >Email</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="email"
                                class="form-control"
                                id="inputEmail3"
                            />
                        </div>
                    </div>
                    <div class="form-group row col-md-6 mx-auto">
                        <label for="inputUrl" class="col-sm-2 col-form-label"
                            >Lien du Git</label
                        >
                        <div class="col-sm-10">
                            <input
                                type="text"
                                class="form-control"
                                id="inputUrl"
                            />
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <a
                        type="submit"
                        class="btn btn-dark text-white"
                    >
                        Analyser
                    </a>
                    </div>
                </form>
            <div class="d-flex justify-content-center ">
                <img class="" width="150" height="150" src="img/audit.png" />
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
