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
            <div class="donateForm">
                <div>
                    <b-card no-body class="overflow-hiddenp-3" bg-variant="dark">

                        <b-col>
                            <b-card-body class="p-2 text-center">
                                <h3 class="whiteLab pt-2">Paiement 100% sécurisé</h3>
                                <b-card-img src="img/lock.png" class="lock pb-2"></b-card-img>
                            </b-card-body>
                        </b-col>
                        <b-col class="d-flex justify-content-center">


                            <form @submit.prevent="submitPayment" class="formDon">
                                <div class='form-row'>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">€</span>
                                        </div>
                                        <input type="number" class="form-control" v-model="inputAmount"
                                            :state="amountState" trim>
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='form-group  required formDon'>
                                        <label class='control-label whiteLab'>Numéro de carte</label>
                                        <input autocomplete='off' class='form-control card-number' size='20' type='text'
                                            placeholder='XXXX XXXX XXXX XXXX' name="card_no" v-model="card_no">
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-4 form-group cvc required'>
                                        <label class='control-label whiteLab'>CVV</label>
                                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311'
                                            size='4' type='text' name="cvvNumber" v-model="cvvNumber">
                                    </div>
                                    <div class='col-4 form-group expiration required'>
                                        <label class='control-label  whiteLab'>Mois expiration</label>
                                        <input class='form-control card-expiry-month' placeholder='MM' size='4'
                                            type='text' name="ccExpiryMonth" v-model="ccExpiryMonth">
                                    </div>
                                    <div class='col-4 form-group expiration required'>
                                        <label class='control-label  whiteLab'>Année expiration</label>
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='text' name="ccExpiryYear" v-model="ccExpiryYear">
                                        <input class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                            type='hidden' name="amount" value="300">
                                    </div>
                                </div>
                                <div class='form-row'>
                                    <div class='col-md-12 form-group'>
                                        <button class='form-control btn btn-success submit-button' type='submit'>Payer
                                            »</button>
                                    </div>
                                </div>
                            </form>
                        </b-col>
                    </b-card>
                </div>
            </div>
            <div class="mt-4">
                <b-alert :show="responseSuccessShow" variant="success">{{ responseSuccessMessage }}</b-alert>
            </div>
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
            amountState() {
                if (this.inputAmount) {
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
                amount: 1,
                responseSuccessMessage: '',
                responseSuccessShow: false
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
                })
                .then(response => {
                    if (response.data.ok) {
                        this.responseSuccessMessage = response.data.ok
                        this.responseErrorShow = false;
                        this.responseSuccessShow = true;
                    }
                    this.card_no = '';
                    this.ccExpiryMonth = '';
                    this.ccExpiryYear = '';
                    this.cvvNumber = '';
                    this.inputAmount = 1;
                });
            }
        },
        mounted() {
            console.log("Component mounted.");
        },
    };

</script>
