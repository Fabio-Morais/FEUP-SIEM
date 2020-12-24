function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

(function () {
    var coursesArray = [];
    var arrCookie = [];

    // Add to Cart Interaction - by CodyHouse.co
    var cart = document.getElementsByClassName('js-cd-cart');
    if (cart.length > 0) {
        var cartAddBtns = document.getElementsByClassName('js-cd-add-to-cart'),
            cartBody = cart[0].getElementsByClassName('cd-cart__body')[0],
            cartList = cartBody.getElementsByTagName('ul')[0],
            cartListItems = cartList.getElementsByClassName('cd-cart__product'),
            cartTotal = cart[0].getElementsByClassName('cd-cart__checkout')[0].getElementsByTagName('span')[0],
            cartCount = cart[0].getElementsByClassName('cd-cart__count')[0],
            cartCountItems = cartCount.getElementsByTagName('li'),
            cartUndo = cart[0].getElementsByClassName('cd-cart__undo')[0],
            productId = 0, //this is a placeholder -> use your real product ids instead
            cartTimeoutId = false,
            animatingQuantity = false;
        initCartEvents();


        function initCartEvents() {
            // add products to cart
            for (var i = 0; i < cartAddBtns.length; i++) {
                (function (i) {
                    cartAddBtns[i].addEventListener('click', addToCart);
                })(i);
            }

            // open/close cart
            cart[0].getElementsByClassName('cd-cart__trigger')[0].addEventListener('click', function (event) {
                event.preventDefault();
                toggleCart();
            });



            cart[0].addEventListener('click', function (event) {
                if (event.target == cart[0]) { // close cart when clicking on bg layer
                    toggleCart(true);
                } else if (event.target.closest('.cd-cart__delete-item')) { // remove product from cart
                    event.preventDefault();
                    removeProduct(event.target.closest('.cd-cart__product'));
                }
            });

            // update product quantity inside cart
            cart[0].addEventListener('change', function (event) {
                if (event.target.tagName.toLowerCase() == 'select') quickUpdateCart();
            });

            //reinsert product deleted from the cart
            cartUndo.addEventListener('click', function (event) {
                if (event.target.tagName.toLowerCase() == 'a') {
                    event.preventDefault();
                    if (cartTimeoutId) clearInterval(cartTimeoutId);
                    // reinsert deleted product
                    var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted')[0];
                    Util.addClass(deletedProduct, 'cd-cart__product--undo');
                    deletedProduct.addEventListener('animationend', function cb() {
                        deletedProduct.removeEventListener('animationend', cb);
                        Util.removeClass(deletedProduct, 'cd-cart__product--deleted cd-cart__product--undo');
                        deletedProduct.removeAttribute('style');
                        quickUpdateCart();
                    });
                    Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                }
            });
        };

        async function addToCart(event) {

            await sleep(1200);
            event.preventDefault();
            var aux = this.parentElement.parentNode
            var image = $(this).parent().parent().find('.img-wrap img').attr('src')
            var course = $(this).parent().parent().find('.title').html()
            var price = $(this).parent().parent().find('.price').html()
            if(!coursesArray.find(element => element == course)){
                coursesArray.push(course);
            }
            else
                return;

            if (animatingQuantity) return;
            var cartIsEmpty = Util.hasClass(cart[0], 'cd-cart--empty');
            //update cart product list
            addProduct(this, image, course, price);
            //update number of items
            updateCartCount(cartIsEmpty);
            //update total price
            updateCartTotal(this.getAttribute('data-price'), true);
            //show cart
            Util.removeClass(cart[0], 'cd-cart--empty');

        };

        function toggleCart(bool) { // toggle cart visibility
            var cartIsOpen = (typeof bool === 'undefined') ? Util.hasClass(cart[0], 'cd-cart--open') : bool;

            if (cartIsOpen) {
                Util.removeClass(cart[0], 'cd-cart--open');
                //reset undo
                if (cartTimeoutId) clearInterval(cartTimeoutId);
                Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                removePreviousProduct(); // if a product was deleted, remove it definitively from the cart

                setTimeout(function () {
                    cartBody.scrollTop = 0;
                    //check if cart empty to hide it
                }, 500);
            } else {
                Util.addClass(cart[0], 'cd-cart--open');
            }
        };
        function createCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+ d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        function addProduct(target, image, course, price) {
            // this is just a product placeholder
            // you should insert an item with the selected product info
            // replace productId, productName, price and url with your real product info
            // you should also check if the product was already in the cart -> if it is, just update the quantity
            productId = productId + 1;
            var productAdded = '<li class="cd-cart__product"><div class="cd-cart__image"><a href="#0"><img src="' + image + '" alt="placeholder"></a></div><div class="cd-cart__details"><h3 class="truncate"><a href="#0">' + course + '</a></h3><span class="cd-cart__price">' + price + '</span><div class="cd-cart__actions"><a href="#0" class="cd-cart__delete-item">Delete</a><div class="cd-cart__quantity"><span class="cd-cart__select"><select class="reset" id="cd-product-' + productId + '" name="quantity"><option value="1">1</option></select></span></div></div></div></li>';
            cartList.insertAdjacentHTML('beforeend', productAdded);
            

            var size = $('.cd-cart__product').length;

            for(i = 0; i < size; i++){
                arrCookie.push($('.cd-cart__product')[i])
                var json_str = JSON.stringify(arrCookie);
            }
            console.log(arrCookie)
            createCookie('cartCookie', json_str,1);

           /* arrCookie.push(productAdded)
            console.log(arrCookie)
            var json_str = JSON.stringify(arrCookie);*/

            var input = '<input type="hidden" name="course[]" value="'+course+'" class="'+course.replace(/ /g,'') +'"/> <input type="hidden" name="image[]" value="'+image+'" class="'+course.replace(/ /g,'') +'"/><input type="hidden" name="price[]" value="'+price+'" class="'+course.replace(/ /g,'') +'"/>';
            cartList.insertAdjacentHTML('beforeend', input);
        };

        function removeProduct(product) {

            var size = $('.cd-cart__product').length;
            arrCookie=[] //reset no array
            for(i = 0; i < size; i++){
                arrCookie.push($('.cd-cart__product')[i])
                var json_str = JSON.stringify(arrCookie);
            }
            createCookie('cartCookie', json_str,1);

            /*Remove all inputs forms*/
            var course = $(product).find('.truncate a')[0].innerHTML
            $("."+course.replace(/ /g,'')).remove()
            var index = coursesArray.indexOf(course)
            coursesArray.splice(index,1)

            if (cartTimeoutId) clearInterval(cartTimeoutId);
            removePreviousProduct(); // prduct previously deleted -> definitively remove it from the cart

            var topPosition = product.offsetTop,
                productQuantity = Number(product.getElementsByTagName('select')[0].value),
                productTotPrice = Number((product.getElementsByClassName('cd-cart__price')[0].innerText).replace('€', '')) * productQuantity;

            product.style.top = topPosition + 'px';
            Util.addClass(product, 'cd-cart__product--deleted');

            //update items count + total price
            updateCartTotal(productTotPrice, false);
            updateCartCount(true, -productQuantity);
            Util.addClass(cartUndo, 'cd-cart__undo--visible');

            //wait 8sec before completely remove the item
            cartTimeoutId = setTimeout(function () {
                Util.removeClass(cartUndo, 'cd-cart__undo--visible');
                removePreviousProduct();
            }, 8000);
        };

        function removePreviousProduct() { // definitively removed a product from the cart (undo not possible anymore)
            var deletedProduct = cartList.getElementsByClassName('cd-cart__product--deleted');
            if (deletedProduct.length > 0) deletedProduct[0].remove();
        };

        function updateCartCount(emptyCart, quantity) {
            if (typeof quantity === 'undefined') {
                var actual = Number(cartCountItems[0].innerText) + 1;
                var next = actual + 1;

                if (emptyCart) {
                    cartCountItems[0].innerText = actual;
                    cartCountItems[1].innerText = next;
                    animatingQuantity = false;
                } else {
                    Util.addClass(cartCount, 'cd-cart__count--update');

                    setTimeout(function () {
                        cartCountItems[0].innerText = actual;
                    }, 150);

                    setTimeout(function () {
                        Util.removeClass(cartCount, 'cd-cart__count--update');
                    }, 200);

                    setTimeout(function () {
                        cartCountItems[1].innerText = next;
                        animatingQuantity = false;
                    }, 230);
                }
            } else {
                var actual = Number(cartCountItems[0].innerText) + quantity;
                var next = actual + 1;

                cartCountItems[0].innerText = actual;
                cartCountItems[1].innerText = next;
                animatingQuantity = false;
            }
        };

        function updateCartTotal(price, bool) {
            cartTotal.innerText = bool ? (Number(cartTotal.innerText) + Number(price)).toFixed(2) : (Number(cartTotal.innerText) - Number(price)).toFixed(2);
        };

        function quickUpdateCart() {
            var quantity = 0;
            var price = 0;

            for (var i = 0; i < cartListItems.length; i++) {
                if (!Util.hasClass(cartListItems[i], 'cd-cart__product--deleted')) {
                    var singleQuantity = Number(cartListItems[i].getElementsByTagName('select')[0].value);
                    quantity = quantity + singleQuantity;
                    price = price + singleQuantity * Number((cartListItems[i].getElementsByClassName('cd-cart__price')[0].innerText).replace('€', ''));
                }
            }

            cartTotal.innerText = price.toFixed(2);
            cartCountItems[0].innerText = quantity;
            cartCountItems[1].innerText = quantity + 1;
        };

        /*function checkout() {
            var string="";
            for (i = 0; i < $(".truncate a").length; i++) {//.truncate a
                var x = $(".truncate a")[i].innerText.toLowerCase()
                var withoutWhiteSpaces = x.replace(/\s/g, '')
                var final = withoutWhiteSpaces.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-')
               // console.log(final)
                string=string.concat("course[]=");
                string= string.concat(final);
                string=string.concat("&image[]=");
                var s =$(".cd-cart__image a img")[i].src.split("/")
                string= string.concat(s[s.length-1]);
                string=string.concat("&price[]=");
                string= string.concat(($(".cd-cart__price")[i].innerText));
                if(i<$(".truncate a").length -1)
                    string=string.concat("&");

            }
            console.log(string)
            window.location.href = 'carrinho.php?'+string;
        }*/

    }
})();

