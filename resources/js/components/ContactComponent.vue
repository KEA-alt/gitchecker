<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">
                Contact
            </h1>
        </div>

        <div class=" p-5  bg-white">
            <div class="container">
                <form action="#" method="post">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Prénom" id="firstname" name="firstname">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="text" class="form-control" placeholder="Nom" id="lastname" name="lastname">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                        </div>
                        <textarea class="form-control" placeholder="Message" id="content" rows="3"
                            name="content"></textarea>
                        <div class="buttonContainer">
                            <button class="btn btn-success" type="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
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
