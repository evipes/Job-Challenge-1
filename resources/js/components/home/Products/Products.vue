<template>
    <div class="container">

            <div class="row">
            <div class="col-md-4" v-for="product in products":key="product.id">
                <div class="card mb-4 shadow-sm">

                    <img class="card-img-top" src="http://placehold.it/500x400" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-text">{{ product.name }}</h4>
                        <p>{{ product.description }} </p>
                        <hr class="line">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <p class="price">${{ product.amount }}</p>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <router-link
                                    :to="'./Vehicle/'+product.id"
                                    @input="setActiveProduct"
                                    :value="$store.state.activeProduct"
                                ><button>More</button></router-link>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    export default {
        created () {
          this.$store.dispatch('loadProducts')
        },
       computed: {
           products (){
                return this.$store.state.products.items;
           }
       }
    };
</script>
