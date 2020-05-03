<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;

        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>


<input type="text" id="card-holder-name">

<div id="card-element"></div>

<button id="card-button">
    Process payment
</button>

<script src="https://js.stripe.com/v3/"></script>
<script>
    const stripe = Stripe('pk_test_RIgwt8ctItRYXlYmfoS94Z1100CvV0ujlN');
    const elements = stripe.elements();
    const cardElement = elements.create('card');

    cardElement.mount('#card-element');


    const cardHolderName=document.getElementById('card-holder-name');
    const cardButton = document.getElementById('card-button');

    cardButton.addEventListener('click',async(e)=>{
        const { paymentMethod,error}=await stripe.createPaymentMethod(
            'card',cardElement,{
                billing_details:{name: cardHolderName.value}
            }
        );
        if(error){
            //Display "error.message" to the user
        }else{
            console.log(paymentMethod);
            //The card has been verified successfully
        }
    });
</script>