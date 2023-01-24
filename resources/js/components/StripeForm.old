<template>
    <stripe-checkout
        button="Suscribirme"
        button-class="btn btn-course"
        :stripeKey="stripe_key"
        :product="product"
    >
    </stripe-checkout>
</template>

<script>
import { StripeCheckout } from 'vue-stripe';
export default {
    name: "StripeForm",
    components: {
        StripeCheckout,
    },
    props: {
        stripe_key: '',
        name: '',
        amount: '',
        description: '',
    },
    computed: {
      product() {
          return {
              name: this.name,
              amount: parseFloat(this.amount),
              description: this.description
          }
      }
    },
    data: () => ({

    })
}
</script>

<style scoped>

</style>
