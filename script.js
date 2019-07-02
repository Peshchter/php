const URL = 'http://localhost:3000';

Vue.component('search', {
    data() {
        return {
            searchLine: ''
        }
    },
    template: `
        <form action="#" class="header-form">
             <ul>
                        <li class="browse-button-point">
                            <a href="product.html" class="unlined">
                                <div class="browse-button">Browse&nbsp;<i class="fas fa-caret-down fa-my-style"></i>
                                </div>
                            </a>
                            <div class="drop-menu" style="top: 35px;">
                                <div class="drop-flex">
                                    <h3 class="drop-h3">WOman</h3>
                                    <ul>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Dresses</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Tops</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Sweaters/Knits</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Jackets/Coats</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Blazers</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Denim</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Leggings/Pants</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Skirts/Shorts</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html"
                                                                      class="drop-link">Accessories</a></li>
                                    </ul>
                                    <h3 class="drop-h3">man</h3>
                                    <ul>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Tees/Tank
                                            tops</a></li>
                                        <li class="drop-menu-link"><a href="product.html"
                                                                      class="drop-link">Shirts/Polos</a></li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Sweaters</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Sweatshirts/Hoodies</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Blazers</a>
                                        </li>
                                        <li class="drop-menu-link"><a href="product.html" class="drop-link">Jackets/vests</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
             <input type="text" class="search-form" v-model="searchLine" placeholder="Search for Item...">
             <button class="search-button" @click.prevent="handleSearchClick"><i class="fas fa-search"></i></button>
        </form>`,
    methods: {
        handleSearchClick() {
            this.$emit('search', this.searchLine)
        }
    },

});

Vue.component('product', {
    props: ['item'],
    template: `
        <div class="product-flex">
            <a :href="link(item)" class="product-item">
                <div class="product-image" :style="{ backgroundImage: bImage }" ></div>
                <p class="product-name">{{item.title}}</p>
                <p class="product-price">\${{item.price}} </p>
            </a>
            <a href="#addtocart" class="add-to-cart" @click.prevent="buy(item)"><img src="img/cart-white.svg" alt="cart">Add to Cart</a>
        </div>`,
    computed: {
        bImage() {
            return `url(img/${this.item.img})`;
        }
    },
    methods: {
        buy(item) {
            this.$emit('onBuy', item)
        },
        link(item){
            return `singlepage.html?id=${item.id}`;
        },
    }

});

Vue.component('products', {
    props: ['query','maxprice'],
    data() {
        return {
            items: [],
        }
    },
    template: `
        <div class="items-container" style=" justify-content: space-between;">
              <product v-for="entry in filteredItems" :item="entry" @onBuy="handleBuyClick"></product>
        </div>
    `,

    mounted() {
        fetch(`${URL}/products`)
            .then(response => response.json())
            .then((items) => {
                this.items = items;
            });
    },
    computed: {
        filteredItems() {
            if (this.query) {
                const regexp = new RegExp(this.query, 'i');
                return this.items.filter((item) => regexp.test(item.title)).filter((item) => item.price < this.maxprice);
            } else {
                return this.items.filter((item) => item.price < this.maxprice);
            }

        }
    },
    methods: {
        handleBuyClick(item) {
            this.$emit('onbuy', item)
        }
    }
});

Vue.component('cart', {
    props: {
        items: Array,
        cost: Number,
    },

    template: `
          <div class="drop-menu" style="left: -100px; flex-direction: column; min-width: 260px; ">
              <div v-if="items.length > 0">
              <div v-for="item in this.items" class="cart-menu-item">
                  <a :href="link(item)" class="drop-link elastic">
                      <div class="cart-menu-img" :style="{ backgroundImage: bImage(item) }"></div>
                                    <div class="cart-menu-product-info">
                                        <h3 class="drop-cart-menu-h3">{{item.title}}</h3>
                                        <div class="cart-menu-rating"><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i><i
                                                class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        <h4 class="cart-drop-menu-price">{{item.count}} x \${{item.price}}</h4>
                                    </div>
                                </a>
                                <div class="cart-menu-product-remove">
                                    <button class="action-delete" @click.prevent="ondelete(item)"><i class="fas fa-times-circle"></i></button>
                                </div>
                            </div>
              </div>            
              <div class="cart-menu-price">
                  <h2 class="cart-menu-h2">Итог</h2>
                  <h2 class="cart-menu-h2">\${{cost}}</h2>
              </div>
                            <a href="checkout.html" class="white-pink-button form-button"
                               style="text-decoration: none; width: 100%; margin-bottom: 10px;">checkout</a>

                            <a href="cart.html" class="form-button "
                               style="text-decoration: none; width: 100%;     display: flex;    align-items: center;    justify-content: center;">
                               В корзину</a>
                        </div>
    `,
    methods: {
        ondelete(item) {
            this.$emit('ondelete', item)
        },
        link(item){
            return `singlepage.html?id=${item.id}`;
        },
        bImage(item) {
            return `url(img/${item.img})`;
        }
    },
});

Vue.component('cart-table', {
    props: ['items'],
    template: `
        <div>
            <div class="cart-table">
            <h2 class="cart-headers">Product Details</h2>
            <h2 class="cart-headers">unite Price</h2>
            <h2 class="cart-headers">Quantity</h2>
            <h2 class="cart-headers">shipping </h2>
            <h2 class="cart-headers">Subtotal </h2>
            <h2 class="cart-headers">ACTION</h2>
        </div>
        <article v-for="item in items" class="product">
            <div class="cart-table">
                <div class="cart-headers">
                    <a :href="link(item)" class="cart-product-link">
                        <img :src="path(item)" alt="" class="cart-product-image"
                             style="background-color: rgba(101, 169, 200, 0.09);">
                        <div class="cart-product">
                            <h2 class="product-name">{{item.title}}</h2>
                            <div>
                                <p class="cart-product-parameter">Color: <span class="cart-parameter-value">Red</span>
                                </p>
                                <p class="cart-product-parameter">Size: <span class="cart-parameter-value"> Xll</span>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="cart-headers product-cart-details">\${{item.price}}</div>
                <div class="cart-headers"><input type="number" v-model.number="item.count" class="default-input quantity-input" @change="countchange(item)">
                </div>
                <div class="cart-headers product-cart-details">FREE</div>
                <div class="cart-headers product-cart-details">\${{subtotal(item)}}</div>
                <div class="cart-headers cart-action">
                    <button class="action-delete" @click.prevent="ondelete(item)"><i class="fas fa-times-circle"></i></button>
                </div>
            </div>
        </article>
            <div class="header-flex" style="margin-top: 40px;">
            <button class="form-button" style="width: 235px;" @click.prevent="clearcart">Очистить корзину</button>
            <form action="product.html">
                <button type="submit" class="form-button" style="width: 225px;">cONTINUE sHOPPING</button>
            </form>
        </div>
        </div>
    `,
    methods: {
        ondelete(item) {
            this.$emit('ondelete', item);
        },
        countchange(item) {
            this.$emit('countchange', item);
        },
        clearcart() {
            this.$emit('clearcart');
        },
        path(item) {
            return `img/${item.img}`;
        },
        link(item){
           return `singlepage.html?id=${item.id}`;
        },
        subtotal(item) {
            return +(item.price * item.count);
        }
    },
});

const app = new Vue({
    el: '#app',
    data: {
        filterLine: '',
        cart: [],
        maxPrice: 100000
    },
    methods: {
        handleBuyClick(item) {
            const cartItem = this.cart.find((ci) => ci.id === item.id);
            if (cartItem) {
                fetch(`${URL}/cart/${cartItem.id}`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({count: cartItem.count + 1})
                }).then(
                    (response) => response.json()
                ).then((item) => {
                    const idx = this.cart.findIndex((pr) => pr.id === item.id);
                    Vue.set(this.cart, idx, item);
                })
            } else {
                fetch(`${URL}/cart`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({...item, count: 1})
                }).then(
                    (response) => response.json()
                ).then((item) => {
                        this.cart.push(item)
                    }
                )
            }
        },
        handleSearchClick(Line) {
            this.filterLine = Line;
        },
        handleClearCart() {
            for (item of this.cart) {
                this.ondelete(item)
            }
        },
        ondelete(item) {
            fetch(`${URL}/cart/${item.id}`, {
                method: 'DELETE',
            }).then(() =>
                this.cart = this.cart.filter((cartItem) => cartItem.id !== item.id)
            )
        },
        calculate() {
            if (this.cart.length > 0) {
                let cost = 0;
                for (item of this.cart) {
                    cost += item.count * item.price;
                }
                return cost;
                // return +this.items.reduce((acc, item) => acc + item.count * item.price);
            } else {
                return 0;
            }
        },
        countchange(item){
            fetch(`${URL}/cart/${item.id}`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({count: item.count})
            }).then(
                (response) => response.json()
            ).then((item) => {
                const idx = this.cart.findIndex((pr) => pr.id === item.id);
                Vue.set(this.cart, idx, item);
            })
        }
    },
    mounted() {
        fetch(`${URL}/cart`)
            .then(response => response.json())
            .then((items) => {
                this.cart = items;
            });
    },
});
