<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Erreur 404
            </h1>
        </div>
        <div class=" p-5  bg-white">
            <h2 class="d-flex justify-content-center">
                La page que vous recherchez semble introuvable.
            </h2>
        </div>
        <div class="d-flex justify-content-center bg-white">
            <router-link to="/" class="btn btn-dark text-white"
                >Accueil</router-link
            >
        </div>
        <div class="d-flex justify-content-center p-5 bg-white">
            <img class="" width="150" height="150" src="img/404.png" />
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
