<template>
    <stripe-checkout
        button="Suscribirme"
        button-class="btn btn-course"
        :stripe-key="stripe_key"
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
      producto() {
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
