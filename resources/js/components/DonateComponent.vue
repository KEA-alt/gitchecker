<template>
    <div>
        <div class="p-4 slider">
            <h1 class="mt-5 d-flex justify-content-center">Donation</h1>
        </div>
        <div class="p-5 bg-white">
            <h2 class="d-flex justify-content-center">Pour notre fonctionnement quotidien</h2>
            <p class="d-flex justify-content-center">
                Vous avez aimé notre outil et vous avez envie de nous aider mais
                vous ne savez pas comment, faites un don pour soutenir notre
                équipe !
            </p>
            <form @submit.prevent="submitPayment">
                <div class='form-row'>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">€</span>
                        </div>
                        <input type="text" class="form-control" v-model="inputAmount" :state="amountState" trim>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='form-group card required'>
                        <label class='control-label'>Card Number</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_no"
                            v-model="card_no">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-4 form-group cvc required'>
                        <label class='control-label'>CVV</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                            type='text' name="cvvNumber" v-model="cvvNumber">
                    </div>
                    <div class='col-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label>
                        <input class='form-control card-expiry-month' placeholder='MM' size='4' type='text'
                            name="ccExpiryMonth" v-model="ccExpiryMonth">
                    </div>
                    <div class='col-4 form-group expiration required'>
                        <label class='control-label'> </label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'
                            name="ccExpiryYear" v-model="ccExpiryYear">
                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden'
                            name="amount" value="300">
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <button class='form-control btn btn-success submit-button' type='submit'>Pay »</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-center mt-2 p-3">
                <img class width="150" height="150" src="img/donate.png" />
            </div>
            <h3 class="d-flex justify-content-center">Merci</h3>
        </div>
    </div>
</template>
<script>
    export default {
        computed: {
            amountState(){
                if(this.inputAmount){
                    this.amount = this.inputAmount;
                    console.log(this.amount);
                }
            }
        },
        data() {
            return {
                card_no: '',
                ccExpiryMonth: '',
                ccExpiryYear: '',
                cvvNumber: '',
                inputAmount: 1,
                amount: 1
            }
        },

        methods: {
            submitPayment() {
                axios.post('/api/stripe', {
                    card_no: this.card_no,
                    ccExpiryMonth: this.ccExpiryMonth,
                    ccExpiryYear: this.ccExpiryYear,
                    cvvNumber: this.cvvNumber,
                    amount: this.amount
                });
            }
        },
        mounted() {
            console.log("Component mounted.");
        },
    };

</script>
