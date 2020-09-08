import products from "./store/modules/products";
import buyProduct from "./components/home/Products/buyProduct";

export default {
    mode: 'history',
    route: [
        { path: '/', component: products },
        { path: '/buy/products/:slug', component: buyProduct }
    ]
}
