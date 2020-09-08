export default {
    state: {
        items: []
    },

    mutations:  {
        LOAD_PRODUCTS (state, products) {
            state.items = products;
        }
    },

    actions: {
        loadProducts (context) {
            axios.get('/products')
                .then(
                    response => {
                       context.commit('LOAD_PRODUCTS', response.data.products)
                    }
                )
        },

        buyProduct(context, param){
            axios.get( '/products/{param}')
                .then(
                    reponse => {
                        console.log(reponse)
                    }
                )
        }
    }
}
