<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Rapport</h1>
        </div>

        <div class=" p-5  bg-white">
            <ul id="v-for-object" class="demo">
                <li v-for="(message, name) in content.files" :key="message.message">
                    Il y a {{ message.errors }} erreurs dans le fichier : <br>{{ name }} <br><br>
                    <div>
                <li v-for="(message, name) in message.messages" :key="message.message">Erreur numéro : {{ name }}<br>Message :
                    {{message.message}}<br>Ligne : {{message.line}}<br></li>
        </div>
        
        <br><br><br><br>
        </li>
        </ul>

    </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                content: [],
                reportId: this.$route.params.reportId
            }
        },

        created() {
            axios.get('/report/'+this.reportId+'/output.json').then(response => {
                    this.content = response["data"];
                }).catch(err => console.error(err));
        },
        
        mounted() {
            console.log("Component mounted.");
        }
    };

</script>
