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
            Remplissez le formulaire juste dessous et nous ferons tout pour vous répondre dans les plus bref délais.<br> 
            À de suite ...
                </p>
            </div>   
             <div class="d-flex justify-content-center pb-3">
                <img class="" width="150" height="150" src="img/contact.png" />
            </div> 
</div>

        <div class=" bg-white pb-5">
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
                        <div class="m-2 buttonContainer mx-auto">
                            <button class="btn btn-info text-white" type="submit">Envoyer</button>
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
