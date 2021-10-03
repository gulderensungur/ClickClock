  (function( $ ) {
    $.Shop = function( element ) {
        this.$element = $( element );
        this.init();
    };

    $.Shop.prototype = {
        init: function() {

            this.basketPrefix = "Clock-"; 
            this.basketName = this.basketPrefix + "basket"; 
            this.shippingRates = this.basketPrefix + "shipping-rates"; 
            this.total = this.basketPrefix + "total"; 
            this.storage = sessionStorage; 

            this.$formAddToBasket = this.$element.find( "form.add-to-basket" ); 
            this.$formBasket = this.$element.find( "#shopping-basket" ); 
            this.$checkoutBasket = this.$element.find( "#checkout-basket" ); 
            this.$checkoutOrderForm = this.$element.find( "#checkout-order-form" );
            this.$shipping = this.$element.find( "#sshipping" ); 
            this.$subTotal = this.$element.find( "#stotal" ); 
            this.$shoppingBasketActions = this.$element.find( "#shopping-basket-actions" ); 
            this.$userDetails = this.$element.find( "#user-details-content" ); 



            this.currency = "&dollar;"; 
            this.currencyString = "$"; 
            
            this.requiredFields = {
                expression: {
                    value: /^([\w-\.]+)@((?:[\w]+\.)+)([a-z]){2,4}$/
                },

                str: {
                    value: ""
                }

            };


            this.createBasket();
            this.handleAddToBasketForm();
            this.handleCheckoutOrderForm();
            this.displayBasket();
            this.deleteProduct();
            this.displayUserDetails();
            this.quantityChanged();



        },

        createBasket: function() {
            if( this.storage.getItem( this.basketName ) == null ) {

                var basket = {};
                basket.items = [];

                this.storage.setItem( this.basketName, this._toJSONString( basket ) );
                this.storage.setItem( this.shippingRates, "0" );
                this.storage.setItem( this.total, "0" );
            }
        },


        displayUserDetails: function() {
            if( this.$userDetails.length ) {
                if( this.storage.getItem( "shipping-name" ) == null ) {
                    var name = this.storage.getItem( "billing-name" );
                    var email = this.storage.getItem( "billing-email" );
                    var city = this.storage.getItem( "billing-city" );
                    var address = this.storage.getItem( "billing-address" );


                    var html = "<div class='detail'>";
                    html += "<h2>Billing and Shipping</h2>";
                    html += "<ul>";
                    html += "<li>" + name + "</li>";
                    html += "<li>" + email + "</li>";
                    html += "<li>" + city + "</li>";
                    html += "<li>" + address + "</li>";
                    html += "</ul></div>";

                    this.$userDetails[0].innerHTML = html;
                } else {
                    var name = this.storage.getItem( "billing-name" );
                    var email = this.storage.getItem( "billing-email" );
                    var city = this.storage.getItem( "billing-city" );
                    var address = this.storage.getItem( "billing-address" );

                    var sName = this.storage.getItem( "shipping-name" );
                    var sEmail = this.storage.getItem( "shipping-email" );
                    var sCity = this.storage.getItem( "shipping-city" );
                    var sAddress = this.storage.getItem( "shipping-address" );

                    var html = "<div class='detail'>";
                    html += "<h2>Billing</h2>";
                    html += "<ul>";
                    html += "<li>" + name + "</li>";
                    html += "<li>" + email + "</li>";
                    html += "<li>" + city + "</li>";
                    html += "<li>" + address + "</li>";
                    html += "</ul></div>";

                    html += "<div class='detail right'>";
                    html += "<h2>Shipping</h2>";
                    html += "<ul>";
                    html += "<li>" + sName + "</li>";
                    html += "<li>" + sEmail + "</li>";
                    html += "<li>" + sCity + "</li>";
                    html += "<li>" + sAddress + "</li>";
                    html += "</ul></div>";

                    this.$userDetails[0].innerHTML = html;

                }
            }
        },

        deleteProduct: function() {
            var self = this;
            if( self.$formBasket.length ) {
                var basket = this._toJSONObject( this.storage.getItem( this.basketName ) );
                var items = basket.items;

                $( document ).on( "click", ".pdelete a", function( e ) {
                    e.preventDefault();
                    var productName = $( this ).data( "product" );
                    var newItems = [];
                    for( var i = 0; i < items.length; ++i ) {
                        var item = items[i];
                        var product = item.product;
                        if( product == productName ) {
                            items.splice( i, 1 );
                        }
                    }
                    newItems = items;
                    var updatedBasket = {};
                    updatedBasket.items = newItems;

                    var updatedTotal = 0;
                    var totalQty = 0;
                    if( newItems.length == 0 ) {
                        updatedTotal = 0;
                        totalQty = 0;
                    } else {
                        for( var j = 0; j < newItems.length; ++j ) {
                            var prod = newItems[j];
                            var sub = prod.price * prod.qty;
                            updatedTotal += sub;
                            totalQty += prod.qty;
                        }
                    }

                    self.storage.setItem( self.total, self._convertNumber( updatedTotal ) );
                    self.storage.setItem( self.shippingRates, self._convertNumber( self._calculateShipping( totalQty ) ) );

                    self.storage.setItem( self.basketName, self._toJSONString( updatedBasket ) );
                    $( this ).parents( "tr" ).remove();
                    self.$subTotal[0].innerHTML = self.currency + " " + self.storage.getItem( self.total );
                });
            }
        },

        displayBasket: function() {
            if( this.$formBasket.length ) {
                var basket = this._toJSONObject( this.storage.getItem( this.basketName ) );
                var items = basket.items;
                var $tableBasket = this.$formBasket.find( ".shopping-basket" );
                var $tableBasketBody = $tableBasket.find( "tbody" );

                if( items.length == 0 ) {
                    $tableBasketBody.html( "" );
                } else {


                    for( var i = 0; i < items.length; ++i ) {
                        var item = items[i];
                        var product = item.product;
                        var price = this.currency + " " + item.price;
                        var qty = item.qty;
                        var html = "<tr><td class='pname'>" + product + "</td>" + "<td class='pqty'><input type='text' value='" + qty + "' class='qty'/></td>";
                        html += "<td class='pprice'>" + price + "</td><td class='pdelete'><a href='' data-product='" + product + "'>&times;</a></td></tr>";

                        $tableBasketBody.html( $tableBasketBody.html() + html );
                    }

                }

                if( items.length == 0 ) {
                    this.$subTotal[0].innerHTML = this.currency + " " + 0.00;
                } else {

                    var total = this.storage.getItem( this.total );
                    this.$subTotal[0].innerHTML = this.currency + " " + total;
                }
            } else if( this.$checkoutBasket.length ) {
                var checkoutBasket = this._toJSONObject( this.storage.getItem( this.basketName ) );
                var basketItems = checkoutBasket.items;
                var $basketBody = this.$checkoutBasket.find( "tbody" );

                if( basketItems.length > 0 ) {

                    for( var j = 0; j < basketItems.length; ++j ) {
                        var basketItem = basketItems[j];
                        var basketProduct = basketItem.product;
                        var basketPrice = this.currency + " " + basketItem.price;
                        var basketQty = basketItem.qty;
                        var basketHTML = "<tr><td class='pname'>" + basketProduct + "</td>" + "<td class='pqty'>" + basketQty + "</td>" + "<td class='pprice'>" + basketPrice + "</td></tr>";

                        $basketBody.html( $basketBody.html() + basketHTML );
                    }
                } else {
                    $basketBody.html( "" );
                }

                if( basketItems.length > 0 ) {

                    var basketTotal = this.storage.getItem( this.total );
                    var basketShipping = this.storage.getItem( this.shippingRates );
                    var subTot = this._convertString( basketTotal ) + this._convertString( basketShipping );

                    this.$subTotal[0].innerHTML = this.currency + " " + this._convertNumber( subTot );
                    this.$shipping[0].innerHTML = this.currency + " " + basketShipping;
                } else {
                    this.$subTotal[0].innerHTML = this.currency + " " + 0.00;
                    this.$shipping[0].innerHTML = this.currency + " " + 0.00;
                }

            }
        },
        

        updateBasket: function() {
            var self = this;
            if( self.$updateBasketBtn.length ) {
                self.$updateBasketBtn.on( "click", function() {
                    var $rows = self.$formBasket.find( "tbody tr" );
                    var basket = self.storage.getItem( self.basketName );
                    var shippingRates = self.storage.getItem( self.shippingRates );
                    var total = self.storage.getItem( self.total );

                    var updatedTotal = 0;
                    var totalQty = 0;
                    var updatedBasket = {};
                    updatedBasket.items = [];

                    $rows.each(function() {
                        var $row = $( this );
                        var pname = $.trim( $row.find( ".pname" ).text() );
                        var pqty = self._convertString( $row.find( ".pqty > .qty" ).val() );
                        var pprice = self._convertString( self._extractPrice( $row.find( ".pprice" ) ) );

                        var basketObj = {
                            product: pname,
                            price: pprice,
                            qty: pqty
                        };

                        updatedBasket.items.push( basketObj );

                        var subTotal = pqty * pprice;
                        updatedTotal += subTotal;
                        totalQty += pqty;
                    });

                    self.storage.setItem( self.total, self._convertNumber( updatedTotal ) );
                    self.storage.setItem( self.shippingRates, self._convertNumber( self._calculateShipping( totalQty ) ) );
                    self.storage.setItem( self.basketName, self._toJSONString( updatedBasket ) );

                });
            }
        },
        

        handleAddToBasketForm: function() {
            var self = this;
            self.$formAddToBasket.each(function() {
                var $form = $( this );
                var $product = $form.parent();
                var price = self._convertString( $product.data( "price" ) );
                var name =  $product.data( "name" );

                $form.on( "submit", function() {
                    var qty = self._convertString( $form.find( ".qty" ).val() );
                    var subTotal = qty * price;
                    var total = self._convertString( self.storage.getItem( self.total ) );
                    var sTotal = total + subTotal;
                    self.storage.setItem( self.total, sTotal );
                    self._addToBasket({
                        product: name,
                        price: price,
                        qty: qty
                    });
                    var shipping = self._convertString( self.storage.getItem( self.shippingRates ) );
                    var shippingRates = self._calculateShipping( qty );
                    var totalShipping = shipping + shippingRates;

                    self.storage.setItem( self.shippingRates, totalShipping );
                });
            });
        },
        
        handleCheckoutOrderForm: function() {
            var self = this;
            if( self.$checkoutOrderForm.length ) {
                var $sameAsBilling = $( "#same-as-billing" );
                $sameAsBilling.on( "change", function() {
                    var $check = $( this );
                    if( $check.prop( "checked" ) ) {
                        $( "#fieldset-shipping" ).slideUp( "normal" );
                    } else {
                        $( "#fieldset-shipping" ).slideDown( "normal" );
                    }
                });

                self.$checkoutOrderForm.on( "submit", function() {
                    var $form = $( this );
                    var valid = self._validateForm( $form );

                    if( !valid ) {
                        return valid;
                    } else {
                        self._saveFormData( $form );
                    }
                });
            }
        },

        _formatNumber: function( num, places ) {
            var n = num.toFixed( places );
            return n;
        },


        _extractPrice: function( element ) {
            var self = this;
            var text = element.text();
            var price = text.replace( self.currencyString, "" ).replace( " ", "" );
            return price;
        },

        _convertString: function( numStr ) {
            var num;
            if( /^[-+]?[0-9]+\.[0-9]+$/.test( numStr ) ) {
                num = parseFloat( numStr );
            } else if( /^\d+$/.test( numStr ) ) {
                num = parseInt( numStr, 10 );
            } else {
                num = Number( numStr );
            }

            if( !isNaN( num ) ) {
                return num;
            } else {
                console.warn( numStr + " cannot be converted into a number" );
                return false;
            }
        },


        _convertNumber: function( n ) {
            var str = n.toString();
            return str;
        },

        _toJSONObject: function( str ) {
            var obj = JSON.parse( str );
            return obj;
        },


        _toJSONString: function( obj ) {
            var str = JSON.stringify( obj );
            return str;
        },
        

        _addToBasket: function( values ) {
            var basket = this.storage.getItem( this.basketName );
           
            var basketObject = this._toJSONObject( basket );
            var basketCopy = basketObject;
            var items = basketCopy.items;
            items.push( values );

            this.storage.setItem( this.basketName, this._toJSONString( basketCopy ) );
        },

        _calculateShipping: function( qty ) {
            var shipping = 0;
            if( qty >= 6 ) {
                shipping = 10;
            }
            if( qty >= 12 && qty <= 30 ) {
                shipping = 20;
            }

            if( qty >= 30 && qty <= 60 ) {
                shipping = 30;
            }

            if( qty > 60 ) {
                shipping = 0;
            }

            return shipping;

        },


        _validateForm: function( form ) {
            var self = this;
            var fields = self.requiredFields;
            var $visibleSet = form.find( "fieldset:visible" );
            var valid = true;

            form.find( ".message" ).remove();

            $visibleSet.each(function() {

                $( this ).find( ":input" ).each(function() {
                    var $input = $( this );
                    var type = $input.data( "type" );
                    var msg = $input.data( "message" );

                    if( type == "string" ) {
                        if( $input.val() == fields.str.value ) {
                            $( "<span class='message'/>" ).text( msg ).
                            insertBefore( $input );

                            valid = false;
                        }
                    } else {
                        if( !fields.expression.value.test( $input.val() ) ) {
                            $( "<span class='message'/>" ).text( msg ).
                            insertBefore( $input );

                            valid = false;
                        }
                    }

                });
            });

            return valid;

        },
        
        _saveFormData: function( form ) {
            var self = this;
            var $visibleSet = form.find( "fieldset:visible" );

            $visibleSet.each(function() {
                var $set = $( this );
                if( $set.is( "#fieldset-billing" ) ) {
                    var name = $( "#name", $set ).val();
                    var email = $( "#email", $set ).val();
                    var city = $( "#city", $set ).val();
                    var address = $( "#address", $set ).val();
                    
                    self.storage.setItem( "billing-name", name );
                    self.storage.setItem( "billing-email", email );
                    self.storage.setItem( "billing-city", city );
                    self.storage.setItem( "billing-address", address );

                } else {
                    var sName = $( "#sname", $set ).val();
                    var sEmail = $( "#semail", $set ).val();
                    var sCity = $( "#scity", $set ).val();
                    var sAddress = $( "#saddress", $set ).val();


                    self.storage.setItem( "shipping-name", sName );
                    self.storage.setItem( "shipping-email", sEmail );
                    self.storage.setItem( "shipping-city", sCity );
                    self.storage.setItem( "shipping-address", sAddress );


                }
            });
        }
    };

    $(function() {
        var shop = new $.Shop( "#site" );
    });

})( jQuery );


