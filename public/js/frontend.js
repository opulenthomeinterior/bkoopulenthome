/*=============== SHOW MENU ===============*/
const showMenu = (toggleId, navId) => {
   const toggle = document.getElementById(toggleId),
      nav = document.getElementById(navId)

   toggle.addEventListener('click', () => {
      // Add show-menu class to nav menu
      nav.classList.toggle('show-menu')
      // Add show-icon to show and hide menu icon
      toggle.classList.toggle('show-icon')
   })
}

showMenu('nav-toggle', 'nav-menu')

/*=============== SHOW DROPDOWN MENU ===============*/
const dropdownItems = document.querySelectorAll('.dropdown__item')

// 1. Select each dropdown item
dropdownItems.forEach((item) => {
   const dropdownButton = item.querySelector('.dropdown__button')

   // 2. Select each button click
   dropdownButton.addEventListener('click', () => {
      // 7. Select the current show-dropdown class
      const showDropdown = document.querySelector('.show-dropdown')

      // 5. Call the toggleItem function
      toggleItem(item)

      // 8. Remove the show-dropdown class from other items
      if (showDropdown && showDropdown !== item) {
         toggleItem(showDropdown)
      }
   })
})

// 3. Create a function to display the dropdown
const toggleItem = (item) => {
   // 3.1. Select each dropdown content
   const dropdownContainer = item.querySelector('.dropdown__container')

   // 6. If the same item contains the show-dropdown class, remove
   if (item.classList.contains('show-dropdown')) {
      dropdownContainer.removeAttribute('style')
      item.classList.remove('show-dropdown')
   } else {
      // 4. Add the maximum height to the dropdown content and add the show-dropdown class
      dropdownContainer.style.height = dropdownContainer.scrollHeight + 'px'
      item.classList.add('show-dropdown')
   }
}

/*=============== DELETE DROPDOWN STYLES ===============*/
const mediaQuery = matchMedia('(min-width: 1118px)'),
   dropdownContainer = document.querySelectorAll('.dropdown__container')

// Function to remove dropdown styles in mobile mode when browser resizes
const removeStyle = () => {
   // Validate if the media query reaches 1118px
   if (mediaQuery.matches) {
      // Remove the dropdown container height style
      dropdownContainer.forEach((e) => {
         e.removeAttribute('style')
      })

      // Remove the show-dropdown class from dropdown item
      dropdownItems.forEach((e) => {
         e.classList.remove('show-dropdown')
      })
   }
}

addEventListener('resize', removeStyle)


$(document).ready(function () {

   $(document).on('click', '#flatpacked_btn', function (e) {
      e.preventDefault();
      const row = $(e.target).closest('.row');
      row.find(`#flatpacked`).removeClass('d-none').addClass('d-block');
      row.find('#rigid').addClass('d-none');
      e.preventDefault();
   })

   $(document).on('click', '#rigid_btn', function (e) {
      const row = $(e.target).closest('.row');
      row.find('#rigid').removeClass('d-none').addClass('d-block');
      row.find('#flatpacked').addClass('d-none');
      e.preventDefault();
   })

   $('.collapse-heading').on('click', function () {
      var targetCollapse = $(this).attr('href');

      $('.collapse').not(targetCollapse).collapse('hide');
   });



   // Function to adjust card heights
   function adjustCardHeights() {
      var maxHeight = 0;
      // Loop through each card and find the maximum height
      $('.component-card-content').each(function () {
         var currentHeight = $(this).height();
         if (currentHeight > maxHeight) {
            maxHeight = currentHeight + 20;
         }
      });
      // Set the height of all card bodies to the maximum height
      $('.component-card-body').height(maxHeight);
   }

   // Call the function initially
   if ($(window).width() >= 768) {
      adjustCardHeights();
   } else {
      // Reset card heights to auto if screen size is larger than md
      $('.component-card-body').height('auto');
   }

   // Call the function whenever the window is resized
   $(window).resize(function () {
      // Check if screen size is md or smaller
      if ($(window).width() >= 768) {
         adjustCardHeights();
      } else {
         // Reset card heights to auto if screen size is larger than md
         $('.component-card-body').height('auto');
      }
   });
});




$(document).ready(function () {
   $("#openSidebar").click(function () {
      $("#sidebar").css("right", "0");
   });

   $("#closeSidebar").click(function () {
      $("#sidebar").css("right", "-310px");
   });

   $("#openSidebar-desktop").click(function () {
      $("#sidebar").css("right", "0");
   });

   // Close sidebar when clicking outside of it
   $(document).on("click", function (event) {
      if (!$(event.target).closest("#sidebar, #openSidebar, #openSidebar-desktop").length) {
         $("#sidebar").css("right", "-310px");
      }
   });
})


// $(document).ready(function () {
//    $('.cart-icon').click(function () {
//       $('#cartSidebar').toggleClass('open');
//    });

//    $('#cart-close-icon').click(function () {
//       $('#cartSidebar').removeClass('open');
//    });
// })

$(document).ready(function () {
   var isCartPopupShown = false;

   $("#cart-icon").click(function () {
      if (isCartPopupShown) {
         $("#cartSidebar").css("bottom", "-1000px");
      } else {
         $("#cartSidebar").css("bottom", "0");
      }
      isCartPopupShown = !isCartPopupShown;
   });

   // $("#cart-icon").click(function () {
   //    $("#cartSidebar").css("bottom", "0");
   // });

   $("#cart-close-icon").click(function () {
      $("#cartSidebar").css("bottom", "-1000px");
      isCartPopupShown = false;
   });

   // Close sidebar when clicking outside of it
   $(document).on("click", function (event) {
      if (!$(event.target).closest("#cartSidebar, #cart-icon").length) {
         $("#cartSidebar").css("bottom", "-1000px");
         isCartPopupShown = false;
      }
   });
})

// $(document).ready(function () {
//    $('#searchIcon').click(function () {
//       $('#searchPopup').toggle();
//    });

//    $(document).click(function (event) {
//       if (!$(event.target).closest('.searchPopup') && event.target.id !== 'searchIcon') {
//          $('#searchPopup').hide();
//       }
//    });

//    $('#close-search').click(function () {
//       $('#searchPopup').hide();
//    });

//    $('#searchIcon-desktop').click(function () {
//       $('#searchPopup').toggle();
//    });
// });


// function adjustTopPosition(isShown) {
//    var show = $(window).width() < 430 ? '55px' : '80px';
//    var hide = '100px';

//    $("#searchIcon, #searchIcon-desktop").click(function () {
//       if (isShown) {
//          $("#searchPopup").css("top", "-" + hide);
//       } else {
//          $("#searchPopup").css("top", show);
//       }
//       isShown = !isShown;
//    });

//    $("#closeSidebar, #close-search").click(function () {
//       $("#searchPopup").css("top", "-" + hide);
//    });
// }

$(document).ready(function () {
   var show = $(window).width() < 430 ? '55px' : '80px';
   var hide = '100px';
   var isSearchPopupShown = false;

   $("#searchIcon, #searchIcon-desktop").click(function () {
      if (isSearchPopupShown) {
         $("#searchPopup").css("top", "-" + hide);
      } else {
         $("#searchPopup").css("top", show);
      }
      isSearchPopupShown = !isSearchPopupShown;
   });

   $("#close-search").click(function () {
      $("#searchPopup").css("top", "-" + hide);
      isSearchPopupShown = false;
   });

   // Close sidebar when clicking outside of it
   $(document).on("click", function (event) {
      if (!$(event.target).closest("#searchPopup, #searchIcon, #searchIcon-desktop").length) {
         $("#searchPopup").css("top", "-100px");
         isSearchPopupShown = false;
      }
   });

   // // Call the function initially
   // adjustTopPosition(isSearchPopupShown);

   // // Call the function whenever the window is resized
   // $(window).resize(function () {
   //    adjustTopPosition(isSearchPopupShown);
   // });
})


function initializeQuantitiesFromLocalStorage() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   products.forEach(product => {
      const $quantityInput = $('#quantity' + product.id);
      // console.log($quantityInput);
      if ($quantityInput.length > 0) {
         $quantityInput.val(product.quantity);
      }
   });
}

$(document).ready(function () {
   initializeQuantitiesFromLocalStorage();
   updateCartItemsList();
   orderKitchenCartItemsList();
   updateCartPage();
   calculateProductsQuantity();
   addProductsToCheckout();
   cartTotalAmountCalculation();
   cart_total_amount();
});

function cartTotalAmountCalculation() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   let totalAmount = 0;
   products.forEach(product => {
      totalAmount += product.quantity * product.price;
   });

   let code = localStorage.getItem('discountCode');

   if (code) {
      $.ajax({
         url: check_code_route,
         type: "POST",
         data: {
            code: code
         },
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function (response) {
            if (response.status === 'success') {
               if (response.result) {
                  var code = response.result.id;
                  var name = response.result.name;
                  var discount = parseFloat(response.result.percent_off);

                  $('#promoCode').val(code);

                  // Save discount code in localStorage
                  localStorage.setItem('discountCode', code);

                  var discountAmount = (totalAmount * discount) / 100;

                  $('#add_discount_details').html(`
                          <div class="row py-2">
                              <div class="col-6">
                                  <h6 class="fw-bold">Discount Percentage</h6>
                              </div>
                              <div class="col-6">
                                  <h6 class="text-end">${discount}%</h6>
                              </div>
                          </div>
                          <div class="row py-2">
                              <div class="col-6">
                                  <h6 class="fw-bold">Discount (${name})</h6>
                              </div>
                              <div class="col-6">
                                  <h6 class="text-end">-£${discountAmount.toFixed(2)}</h6>
                              </div>
                          </div>
                      `);

                  // Update total price after discount
                  var cartTotalAmountWithVAT = totalAmount - discountAmount;
                  $('#cartTotalAmount').text(
                     `£${(totalAmount).toFixed(2)}`);
                  $('#cartTotalAmountWithVAT').text(
                     `£${cartTotalAmountWithVAT.toFixed(2)}`);

               }
            } else {
               localStorage.removeItem('discountCode');
            }
         }
      });
   } else {
      $('#add_discount_details').html('');
      $('#cartTotalAmount').html(`£${(totalAmount).toFixed(2)}`);
      $('#cartTotalAmountWithVAT').html(`£${(totalAmount).toFixed(2)}`);
   }

}

function cart_total_amount() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   let totalAmount = 0;
   products.forEach(product => {
      totalAmount += product.quantity * product.price;
   });

   $('#cartTotalAmount_side').html(`£${(totalAmount).toFixed(2)}`);
   $('#cartTotalAmount').html(`£${(totalAmount).toFixed(2)}`);
   $('#cartTotalAmountWithVAT').html(`£${(totalAmount).toFixed(2)}`);
}

function increaseQuantity(id, productCode, full_title, price, discount_price, discount_percentage, p_category) {
   var $qtde = $('#quantity' + id);
   var value = parseInt($qtde.val()) || 0;
   if (value >= 10) {
      value = 10;
      $qtde.val(value);
   } else {
      value++;
   }
   $qtde.val(value);
   $('#minus' + id).prop("disabled", false);
   addToCart(id, productCode, full_title, price, discount_price, discount_percentage, p_category, value);
}

function increaseQuantityInCartPage(id, productCode, full_title, price, discount_price, discount_percentage, p_category) {
   let products = localStorage.getItem('bko_cart')
   if (!products) {
      products = [];
   } else {
      products = JSON.parse(products)
   }

   const foundProduct = products.find(product => product.id == id);

   let value = foundProduct.quantity ? foundProduct.quantity : 0;
   if (value >= 10) {
      value = 10;
      $qtde.val(value);
   } else {
      value++;
   }

   addToCart(id, productCode, full_title, price, discount_price, discount_percentage, p_category, value);
   cartTotalAmountCalculation();
}

function decreaseQuantity(id, productCode, full_title, price, discount_price, discount_percentage, p_category) {
   var $qtde = $('#quantity' + id);
   var value = parseInt($qtde.val()) || 0;
   if (value > 0) {
      value--;
      $qtde.val(value);
      if (value === 0) {
         $('#minus' + id).prop("disabled", true);
         removeFromCart(id, productCode);
      } else {
         addToCart(id, productCode, full_title, price, discount_price, discount_percentage, p_category, value);
      }
   }
}

function decreaseQuantityInCartPage(id, productCode, full_title, price, discount_price, discount_percentage, p_category) {
   let products = localStorage.getItem('bko_cart')
   if (!products) {
      products = [];
   } else {
      products = JSON.parse(products)
   }

   const foundProduct = products.find(product => product.productCode == productCode);
   let value = foundProduct.quantity ? foundProduct.quantity : 0;

   if (value > 0) {
      value--;
      if (value === 0) {
         removeFromCart(id, productCode);
      } else {
         addToCart(id, productCode, full_title, price, discount_price, discount_percentage, p_category, value);
      }
   }
   cartTotalAmountCalculation();
}

function addToCart(id, productCode, full_title, price, discount_price, discount_percentage, p_category, value) {
   let products = localStorage.getItem('bko_cart')
   if (!products) {
      products = [];
   } else {
      products = JSON.parse(products)
   }

   const foundProductIndex = products.findIndex(product => product.productCode == productCode);

   if (foundProductIndex === -1 && value > 0) {
      products.push({ id: id, productCode: productCode, quantity: value, full_title: full_title, price: price, discount_price: discount_price, discount_percentage: discount_percentage, p_category: p_category });
   } else if (value > 0) {
      products[foundProductIndex].quantity = value;
   }

   localStorage.setItem('bko_cart', JSON.stringify(products));
   updateCartItemsList();
   updateCartPage();
   orderKitchenCartItemsList();
   calculateProductsQuantity();
   cart_total_amount();
}

function removeFromCart(id, productCode) {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   const foundProductIndex = products.findIndex(product => product.productCode == productCode);

   if (foundProductIndex !== -1) {
      products.splice(foundProductIndex, 1);
      localStorage.setItem('bko_cart', JSON.stringify(products));
   }

   // after removing make the quantity fields 0
   var $qtde = $('#quantity' + id);
   var value = parseInt($qtde.val()) || 0;
   if (value > 0) {
      value = 0;
      $qtde.val(value);
   }

   updateCartItemsList();
   updateCartPage();
   orderKitchenCartItemsList();
   calculateProductsQuantity();
   cart_total_amount();
}

function updateCartItemsList() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   const $cartItemsList = $('#cartItemsList');
   $cartItemsList.empty();

   products.forEach(product => {
      $cartItemsList.append(`<h4><i class="ri-btn ri-delete-bin-line text-danger" onclick="removeFromCart(${product.id}, '${product.productCode}')" ></i>&nbsp; ${product.quantity} x ${product.full_title}</h4>`);
   });
}

function orderKitchenCartItemsList() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   const $cartItemsList = $('#orderKitchenCartItemsList');
   $cartItemsList.empty();

   products.forEach(product => {
      $cartItemsList.append(`<div class="col-12"><p class="text-white fw-bold m-0"><i class="ri-btn ri-delete-bin-line" onclick="removeFromCart(${product.id}, '${product.productCode}')" ></i>&nbsp; <small class="fw-normal">${product.quantity} x ${product.full_title}</small></p></div>`);
   });
}

function updateCartPage() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return;
   }

   products = JSON.parse(products);

   const $cartTableBody = $('#productCartTableBody');
   $cartTableBody.empty();

   var cartTableHtml = ``;
   products.forEach(product => {
      cartTableHtml += `<tr>`;
      cartTableHtml += `<td>`;
      cartTableHtml += `<i class='ri-btn ri-subtract-line' onclick="decreaseQuantityInCartPage('${product.id}', '${product.productCode}', '${product.full_title}', ${product.price}, ${product.discount_price}, ${product.discount_percentage}, '${product.p_category}')"></i>`;
      cartTableHtml += `<i class='ri-btn ri-add-line' onclick="increaseQuantityInCartPage('${product.id}', '${product.productCode}', '${product.full_title}', ${product.price}, ${product.discount_price}, ${product.discount_percentage}, '${product.p_category}')"></i>`;
      cartTableHtml += `<i class='ri-btn ri-delete-bin-line' onclick="removeFromCart(${product.id}, '${product.productCode}')"></i>`;
      cartTableHtml += `</td>`;
      cartTableHtml += `<td>${product.full_title}&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" data-productId="${product.id}" class="openCompareModel text-decoration-underline text-danger" style="font-size: 12px;" data-toggle="modal" data-target="#myModal">Compare</a></td>`;
      cartTableHtml += `<td>£${(product.price).toFixed(2)}</td>`;
      cartTableHtml += `<td>${product.quantity}</td>`;
      cartTableHtml += `<td class='text-end'>£${(product.quantity * product.price).toFixed(2)}</td>`;
      cartTableHtml += `</tr>`;

      $cartTableBody.html(cartTableHtml);
   });
}

function createProductCard(product, type, cart_product_id = null, cart_product_code = null) {
   var productCard = `<div class="${type === 'left' ? 'col-lg-12' : 'col-lg-6'} mb-3">`;
   productCard += `<div class="card">`;
   productCard += `<div class="card-body text-center">`;
   productCard += `<div class="container-fluid">`;
   productCard += `<div class="row">`;
   productCard += `<div class="col-lg-6">`;
   productCard += `<figure><img class="product-image px-0" src="${product.image_path ? product_BIU + '/' + product.image_path : product_BIU + '/images/no-image-available.jpg'}" alt="${product.full_title}" style="height: 133px;object-fit: cover;"></figure>`;
   productCard += `</div>`;
   productCard += `<div class="col-lg-6">`;
   productCard += `<div class="text-start">`;
   productCard += `<a href="${APP_URL + '/shop/by-product/' + product.slug}" class="text-start text-decoration-underline fs-5 fw-bold">${product.short_title}</a>`;
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `<div class="col-12">`;
   productCard += `<div class="container-fluid">`;
   productCard += `<div class="row justify-content-center">`;
   if (type === 'left') {
      productCard += `<div class="col-12">`;
      productCard += `<p class="fs-5 fw-bold mt-lg-2">£${product.price}</p>`;
      productCard += `</div>`;
   } else {
      productCard += `<div class="col-6">`;
      productCard += `<button class="btn btn-dark rounded-0" id="replaceProduct" onclick="replaceProduct('${product.id}', '${product.product_code}', '${product.full_title}', ${product.price}, ${product.discounted_price}, ${product.discounted_percentage}, '${product.parent_category.slug}', ${cart_product_id}, '${cart_product_code}')">Replace</button>`;
      productCard += `</div>`;
      productCard += `<div class="col-6">`;
      productCard += `<p class="fs-5 fw-bold mt-lg-2">£${product.price}</p>`;
      productCard += `</div>`;
   }
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `<div class="container-fluid">`;
   if (product.style) {
      productCard += `<div class="row">`;
      productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
      productCard += `<p class="category-text text-start text-uppercase m-0 pt-1"><small>Style</small></p>`;
      productCard += `</div>`;
      productCard += `<div class="col-md-8 col-sm-12 p-0 text-center">`;
      productCard += `<p class="category-value fw-semibold py-1 mb-2"><small>${product.style.name}</small></p>`;
      productCard += `</div>`;
      productCard += `</div>`;
   }
   if (product.colour) {
      productCard += `<div class="row">`;
      productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
      productCard += `<p class="category-text text-start text-uppercase m-0 pt-1"><small>Color</small></p>`;
      productCard += `</div>`;
      productCard += `<div class="col-md-8 col-sm-12 p-0 text-center">`;
      productCard += `<p class="category-value fw-semibold py-1 mb-2"><small>${product.colour.trade_colour ? product.colour.trade_colour : product.colour.name}</small></p>`;
      productCard += `</div>`;
      productCard += `</div>`;
   }
   if (product.assembly) {
      productCard += `<div class="row">`;
      productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
      productCard += `<p class="category-text text-start text-uppercase m-0 pt-1"><small>Assembly</small></p>`;
      productCard += `</div>`;
      productCard += `<div class="col-md-8 col-sm-12 p-0 text-center">`;
      productCard += `<p class="category-value fw-semibold py-1 mb-2"><small>${product.assembly.name}</small></p>`;
      productCard += `</div>`;
      productCard += `</div>`;
   }
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `</div>`;
   productCard += `</div>`;
   return productCard;
}

$(document).ready(function () {
   $(document).on("click", ".openCompareModel", function (e) {
      e.preventDefault();
      var productId = $(this).data('productid');

      console.log(productId)

      $.ajax({
         url: compare_route,
         method: 'POST',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         data: {
            productId: productId,
         },
         success: function (response) {
            if (response.status === 'success') {
               var products = response.products;
               var initial_product = response.product;
               var compareProducts = $('#compareProducts');
               var cart_Product = $('#cart_Product');

               compareProducts.empty();
               cart_Product.empty();

               var productCardHtml = createProductCard(initial_product, 'left');
               cart_Product.append(productCardHtml);

               // Loop through each product and generate the product card
               if (products.length === 0) {
                  compareProducts.append('<p>No products to compare</p>');
               } else {
                  products.forEach(function (product) {
                     var productCardHtml = createProductCard(product, 'right', initial_product.id, initial_product.product_code);
                     compareProducts.append(productCardHtml);
                  });
               }
               $('#myModal').modal('show');
            }
         },
         error: function (xhr, status, error) {
            // Handle the error response
         }
      });
   });

   // Event delegation for hiding modal
   $(document).on("click", ".hideCompareModel", function (e) {
      e.preventDefault();
      $('#myModal').modal('hide');
   });

});

function replaceProduct(id, productCode, full_title, price, discount_price, discount_percentage, p_category, cart_product_id, cart_product_code) {
   console.log(id, productCode, full_title, price, discount_price, discount_percentage, p_category, cart_product_id, cart_product_code);
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      products = [];
   } else {
      products = JSON.parse(products)
   }

   const foundProductIndex = products.findIndex(product => product.id == cart_product_id);
   if (foundProductIndex !== -1) {
      const quantity = products[foundProductIndex].quantity;
      products.splice(foundProductIndex, 1);
      console.log(products)
      if (quantity >= 0) {
         products.push({ id: id, productCode: productCode, quantity: quantity, full_title: full_title, price: price, discount_price: discount_price, discount_percentage: discount_percentage, p_category: p_category });
         localStorage.setItem('bko_cart', JSON.stringify(products));
      }
   }

   updateCartItemsList();
   updateCartPage();
   orderKitchenCartItemsList();
   calculateProductsQuantity();
   cartTotalAmountCalculation();
   cart_total_amount();

   $('#myModal').modal('hide');
}

function calculateProductsQuantity() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return 0;
   }

   products = JSON.parse(products);

   let totalQuantity = 0;
   totalQuantity = products.length; // Add this line to calculate the total quantity of products

   $('#calculateProductsQuantity').html(totalQuantity);
   $('#calculateProductsQuantity2').html(totalQuantity);
   $('#calculateProductsQuantityBottom').html(totalQuantity);
}

function getProductsFromLocalStorage() {
   let products = localStorage.getItem('bko_cart');
   if (!products) {
      return [];
   }
   return JSON.parse(products);
}

function addProductsToCheckout() {
   const products = getProductsFromLocalStorage();
   const itemsForCheckout = document.getElementById('items_for_checkout');

   if (!itemsForCheckout) {
      return;
   }

   itemsForCheckout.innerHTML = '';

   // const inputId = document.createElement('input');
   // inputId.type = 'hidden';
   // inputId.name = `products`;
   // inputId.value = products;
   // itemsForCheckout.appendChild(inputId);

   products.forEach((product, index) => {
      const inputId = document.createElement('input');
      inputId.type = 'hidden';
      inputId.name = `items[${index}][id]`;
      inputId.value = product.id;

      const inputQuantity = document.createElement('input');
      inputQuantity.type = 'hidden';
      inputQuantity.name = `items[${index}][quantity]`;
      inputQuantity.value = product.quantity;

      itemsForCheckout.appendChild(inputId);
      itemsForCheckout.appendChild(inputQuantity);
   });
}

function isValidEmail(email) {
   // Regular expression to validate email address
   const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
   return emailRegex.test(email);
}

$(document).ready(function () {
   // Function to check if all required inputs are filled within nav-checkout1 section
   let next1Clicked = false;
   let next2Clicked = false;
   let next3Clicked = false;
   function validateInputs(num) {
      var isValid = true;

      if (num === 1) {
         // Iterate over each required input within nav-checkout1 section
         $('#nav-checkout1 input[required]').each(function () {
            // If input is empty, add error message and mark it as invalid
            if (!$(this).val()) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            } else if ($(this).attr('type') === 'email' && !isValidEmail($(this).val())) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">Please enter a valid email address.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            }
         });
      } else if (num === 2) {
         // Iterate over each required input within nav-checkout2 section
         $('#nav-checkout2 input[required]').each(function () {
            // If input is empty, add error message and mark it as invalid
            if (!$(this).val()) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            } else if ($(this).attr('type') === 'email' && !isValidEmail($(this).val())) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">Please enter a valid email address.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            }
         });
      } else if (num === 3) {
         // Iterate over each required input within nav-checkout3 section
         $('#nav-checkout3 input[required]').each(function () {
            // If input is empty, add error message and mark it as invalid
            if (!$(this).val()) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            } else if ($(this).attr('type') === 'email' && !isValidEmail($(this).val())) {
               $(this).addClass('is-invalid');
               $(this).siblings('.error-message').remove();
               const errorMessage = '<div class="error-message mt-1"><small class="text-danger">Please enter a valid email address.</small></div>';
               const existingErrorMessage = $(this).siblings('.error-message');
               if (existingErrorMessage.length > 0) {
                  existingErrorMessage.replaceWith(errorMessage);
               } else {
                  $(this).after(errorMessage);
               }
               isValid = false;
            }
         });
      }

      return isValid;
   }

   // Click event handler for Next button
   $('#checkout-next1').click(function () {
      // Validate inputs within nav-checkout1 section
      next1Clicked = true;
      var valid = validateInputs(1);

      // If all inputs are filled, proceed to next step
      if (valid) {
         $('#nav-checkout-tab2').attr('disabled', false).click();
      }
   });
   // Click event handler for Next button
   $('#checkout-next2').click(function () {
      // Validate inputs within nav-checkout1 section
      next2Clicked = true;
      var valid = validateInputs(2);

      // If all inputs are filled, proceed to next step
      if (valid) {
         $('#nav-checkout-tab3').attr('disabled', false).click();
      }
   });
   // Click event handler for Next button
   $('#checkout-next3').click(function () {
      // Validate inputs within nav-checkout1 section
      next3Clicked = true;
      var valid = validateInputs(3);

      // If all inputs are filled, proceed to next step
      if (valid) {
         $('#checkout-form').submit();
      }
   });

   // Change event handler for inputs within nav-checkout1 section
   $('#nav-checkout1 input[required]').keyup(function () {
      if (next1Clicked) {
         // Remove error message and validation class when input value changes
         if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $(this).siblings('.error-message').remove();
         } else {
            $(this).addClass('is-invalid');
            $(this).siblings('.error-message').remove();
            const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
            const existingErrorMessage = $(this).siblings('.error-message');
            if (existingErrorMessage.length > 0) {
               existingErrorMessage.replaceWith(errorMessage);
            } else {
               $(this).after(errorMessage);
            }
         }
      }
   });

   // Change event handler for inputs within nav-checkout2 section
   $('#nav-checkout2 input[required]').keyup(function () {
      if (next2Clicked) {
         // Remove error message and validation class when input value changes
         if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $(this).siblings('.error-message').remove();
         } else {
            $(this).addClass('is-invalid');
            $(this).siblings('.error-message').remove();
            const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
            const existingErrorMessage = $(this).siblings('.error-message');
            if (existingErrorMessage.length > 0) {
               existingErrorMessage.replaceWith(errorMessage);
            } else {
               $(this).after(errorMessage);
            }
         }
      }
   });

   // Change event handler for inputs within nav-checkout3 section
   $('#nav-checkout3 input[required]').keyup(function () {
      if (next3Clicked) {
         // Remove error message and validation class when input value changes
         if ($(this).val()) {
            $(this).removeClass('is-invalid');
            $(this).siblings('.error-message').remove();
         } else {
            $(this).addClass('is-invalid');
            $(this).siblings('.error-message').remove();
            const errorMessage = '<div class="error-message mt-1"><small class="text-danger">This field is required.</small></div>';
            const existingErrorMessage = $(this).siblings('.error-message');
            if (existingErrorMessage.length > 0) {
               existingErrorMessage.replaceWith(errorMessage);
            } else {
               $(this).after(errorMessage);
            }
         }
      }
   });
});

$(document).ready(function () {
   const products = getProductsFromLocalStorage();
   if (products.length === 0) {
      $('#checkout-container').empty();

      $html = ``;
      $html += `<div class="text-start">`;
      $html += `<p class="fs-5">You have no items in your cart, so cannot checkout.</p>`;
      $html += `<a href="/shop" class="btn btn-dark rounded-0">Shop Now</a>`;
      $html += `</div>`;
      $('#checkout-container').html($html);
      $('#checkout-container').removeClass('d-none');
   } else {
      $('#checkout-container').removeClass('d-none');
   }
});


$(document).ready(function () {
   // Function to adjust card heights
   function adjustCardHeights() {
      var maxHeight = 0;
      // Loop through each card and find the maximum height
      $('.about-card-content').each(function () {
         var currentHeight = $(this).height();
         if (currentHeight > maxHeight) {
            maxHeight = currentHeight + 20;
         }
      });
      // Set the height of all card bodies to the maximum height
      $('.about-card-body').height(maxHeight);
   }

   // Call the function initially
   if ($(window).width() >= 500) {
      adjustCardHeights();
      // console.log('adjustCardHeights')
   } else {
      // Reset card heights to auto if screen size is larger than md
      $('.about-card-body').height('auto');
   }

   // Call the function whenever the window is resized
   $(window).resize(function () {
      // Check if screen size is md or smaller
      if ($(window).width() >= 768) {
         adjustCardHeights();
      } else {
         // Reset card heights to auto if screen size is larger than md
         $('.about-card-body').height('auto');
      }
   });
});