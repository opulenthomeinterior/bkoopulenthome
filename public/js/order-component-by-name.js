$(document).ready(function () {
    // Function to get the selected type IDs
    function getSelectedTypes() {
        var typeIds = [];
        $("input[name='types[]']:checked").each(function () {
            typeIds.push($(this).val());
        });
        return typeIds;
    }


    // Function to get the selected assembly IDs
    function getSelectedAssemblies() {
        var assemblyIds = [];
        $("input[name='assemblies[]']:checked").each(function () {
            assemblyIds.push($(this).val());
        });
        return assemblyIds;
    }

    // Function to get the selected style IDs
    function getSelectedStyles() {
        var styleIds = [];
        $("input[name='styles[]']:checked").each(function () {
            styleIds.push($(this).val());
        });
        return styleIds;
    }

    // Function to get the selected color IDs
    function getSelectedColors() {
        var colorIds = [];
        $("input[name='colours[]']:checked").each(function () {
            colorIds.push($(this).val());
        });
        return colorIds;
    }

    // Function to get the selected color IDs
    function getSelectedHeights() {
        var heights = [];
        $("input[name='heights[]']:checked").each(function () {
            heights.push($(this).val());
        });
        return heights;
    }

    function createProductModal(product, index) {
        var productModal = `<div class="modal fade" id="productModal${index}" tabindex="-1" aria-labelledby="productModalLabel${index}" aria-hidden="true">`;
        productModal += `<div class="modal-dialog modal-lg modal-dialog-centered">`;
        productModal += `<div class="modal-content" style="border-radius: 0; border-top: 3px solid #2b969d; border-bottom: 3px solid #2b969d">`;
        productModal += `<div class="modal-header border-bottom border-light">`;
        productModal += `<h1 class="fs-5 fw-bold text-dark border-bottom border-dark">`;
        productModal += product.title;
        productModal += `</h1>`;
        productModal += `<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>`;
        productModal += `</div>`;
        productModal += `<div class="modal-body">`;
        productModal += `<div class="container-fluid">`;
        productModal += `<div class="row">`;
        productModal += `<div class="col-lg-8 col-md-8 col-8 border-bottom border-warning bg-light">`;
        productModal += `<img src="${product.image_path ? product_BIU + '/' + product.image_path : ASSET_URL + 'images/no-image-available.jpg'}" class="img-fluid product-image" style="height: 300px;" />`;
        productModal += `</div>`;
        productModal += `<div class="col-lg-4 col-md-4 col-4 text-start text-dark">`;
        // productModal += `<h1 class="fs-5 fw-bold">${product.full_title}</h1>`;
        // productModal += `<hr>`;
        productModal += `<div>`;
        productModal += `<h6 class="fs-6 fw-bolder text-dark">Styling</h6>`;
        productModal += `<ul style="list-style: none; padding: 0">`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dark">Style:</small> ${product.style ? product.style.name : ''}</p></li>`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dark">Assembly:</small> ${product.assembly ? product.assembly.name : ''}</p></li>`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dark">Colour:</small> ${product.colour ? (product.colour.trade_colour ? product.colour.trade_colour : product.colour.name) : ''}</p></li>`;
        productModal += `</ul>`;
        productModal += `<h6 class="fs-6 fw-bolder text-dark">Dimensions</h6>`;
        productModal += `</div>`;
        productModal += `<ul style="list-style: none; padding: 0">`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dar">HEIGHT:</small> ${product.height ? parseInt(product.height) + 'mm' : ''}</p></li>`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dark">WIDTH:</small> ${product.width ? parseInt(product.width) + 'mm' : ''}</p></li>`;
        productModal += `<li><p class="mb-0"><small class="fw-bold text-uppercase text-dark">DEPTH:</small> ${product.depth ? parseInt(product.depth) + 'mm' : ''}</p></li>`;
        productModal += `</ul>`;
        productModal += `<h6 class="fs-6 fw-bolder text-dark">Range Specification</h6>`;
        productModal += `<p class="mb-0"><small>${product.category && product.category.description ? product.category.description : (product.category && product.category.parentCategory && product.category.parentCategory.description ? product.category.parentCategory.description : '')}</small></p>`;
        productModal += `</div>`;
        productModal += `</div>`;
        productModal += `</div>`;
        productModal += `</div>`;
        productModal += `<div class="modal-footer"></div>`;
        productModal += `</div>`;
        productModal += `</div>`;
        productModal += `</div>`;
        return productModal;
    }


    function createProductCard(product, index) {
        var productCard = `<div class="col-lg-4 col-6 mb-3">`;
        productCard += `<div class="card btn btn-outline-warning border-1 bg-light p-0" style="border-radius: 0;">`;
        productCard += `
            <div class="card-header px-0 py-0">
                <div class="p-0 product-short-title-container w-100">
                    <a href="{{ route('orderbyproduct', $product->slug) }}" class="product-short-title fw-bold text-decoration-underline fs-4">`;
        productCard += product.short_title;
        productCard += `</a>
                </div>
            </div>
        `;
        productCard += `<div class="card-body text-center">`;
        // productCard += `<a class="modal-icon z-3" href="#" data-bs-toggle="modal" data-bs-target="#productModal${index}">`;
        // productCard += `<i class="ri-add-circle-line text-black fs-4"></i></a>`;
        productCard += createProductModal(product, index);
        productCard += `<div class="container-fluid">`;
        productCard += `<div class="row">`;
        productCard += `<div class="col-lg-12">`;
        productCard += `<figure class="my-0" style="margin-bottom: 0px !important;"><img class="product-image px-0" style="margin-bottom: 0px !important;min-height:175px;max-height:175px;object-fit:contain" src="${product.image_path ? product_BIU + '/' + product.image_path : ASSET_URL + 'images/no-image-available.jpg'}" alt="Card image cap" data-bs-toggle="modal" data-bs-target="#productModal${index}"></figure>`;
        productCard += `<div class="text-start">`;
        productCard += `<a href="${APP_URL + '/shop/by-product/' + product.slug}" class="text-start text-decoration-underline fs-5 fw-bold">${product.short_title}</a>`;
        productCard += `<p class="mt-2"><small class="fw-bold text-start text-dark">${product.product_code}</small></p>`;
        productCard += `<p class="py-lg-3 py-2"><small class="fw-bold text-start text-dark">${product.dimensions}</small></p>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `<div class="col-12">`;
        productCard += `<div class="container-fluid">`;
        productCard += `<div class="row justify-content-center">`;
        productCard += `<div class="col-6 d-flex justify-content-center product-counter">`;
        productCard += `<input id="minus${product.id}" class="minus border bg-dark text-light p-0" type="button" value="-" onclick="decreaseQuantity('${product.id}', '${product.product_code}', '${product.full_title}', ${product.price}, ${product.discounted_price}, ${product.discounted_percentage ?? 0}, '${product.parent_category.slug}')" />`;
        productCard += `<input id="quantity${product.id}" class="quantity border border-black text-center" type="text" value="0" name="quantity" disabled />`;
        productCard += `<input id="plus${product.id}" ${product.price == 0 ? 'disabled' : ''} class="plus border bg-dark text-light p-0" type="button" value="+" onclick="increaseQuantity('${product.id}', '${product.product_code}', '${product.full_title}', ${product.price}, ${product.discounted_price}, ${product.discounted_percentage ?? 0}, '${product.parent_category.slug}')" />`;
        productCard += `</div>`;
        productCard += `<div class="col-6">`;
        productCard += `<p class="fs-5 fw-bold mt-lg-2 text-dark">${product.price == 0 ? 'Out of Stock' : '£' + product.price}</p>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `<div class="container-fluid">`;
        if (product.style) {
            productCard += `<div class="row">`;
            productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
            productCard += `<p class="category-text text-start text-uppercase m-0 pt-1 text-dark"><small>Style</small></p>`;
            productCard += `</div>`;
            productCard += `<div class="col-md-8 col-sm-12 p-0 text-center text-dark">`;
            productCard += `<p class="category-value fw-semibold py-1 mb-2 text-dark"><small>${product.style.name}</small></p>`;
            productCard += `</div>`;
            productCard += `</div>`;
        }
        if (product.colour) {
            productCard += `<div class="row">`;
            productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
            productCard += `<p class="category-text text-start text-uppercase m-0 pt-1 text-dark"><small>Colour</small></p>`;
            productCard += `</div>`;
            productCard += `<div class="col-md-8 col-sm-12 p-0 text-center text-dark">`;
            productCard += `<p class="category-value fw-semibold py-1 mb-2 text-dark"><small>${product.colour.trade_colour ? product.colour.trade_colour : product.colour.name}</small></p>`;
            productCard += `</div>`;
            productCard += `</div>`;
        }
        if (product.assembly) {
            productCard += `<div class="row">`;
            productCard += `<div class="col-4 p-0 d-md-flex d-none">`;
            productCard += `<p class="category-text text-start text-uppercase m-0 pt-1 text-dark"><small>Assembly</small></p>`;
            productCard += `</div>`;
            productCard += `<div class="col-md-8 col-sm-12 p-0 text-center text-dark">`;
            productCard += `<p class="category-value fw-semibold py-1 mb-2 text-dark"><small>${product.assembly.name}</small></p>`;
            productCard += `</div>`;
            productCard += `</div>`;
        }
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `</div>`;
        productCard += `<div class="card-footer p-0">
                            <a href="/shop/by-product/${product.slug}" class="product-short-title text-decoration-underline">
                                <small>View more</small>
                            </a>
                        </div>`;
        productCard += `</div>`;
        productCard += `</div>`;
        return productCard;
    }


    // Function to handle input change and log selected IDs
    function handleInputChange() {
        var selectedTypes = getSelectedTypes();
        var selectedAssemblies = getSelectedAssemblies();
        var selectedStyles = getSelectedStyles();
        var selectedColors = getSelectedColors();
        var selectedHeights = getSelectedHeights();
        var slug = $("#slug").val();
        // Do something with the selected IDs
        // console.log("Selected Types:", selectedTypes);
        // console.log("Selected Assemblies:", selectedAssemblies);
        // console.log("Selected Styles:", selectedStyles);
        // console.log("Selected Colors:", selectedColors);
        // console.log("Slug:", slug);

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Add the CSRF token to the AJAX request data
        $.ajax({
            url: order_component_filter,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                types: selectedTypes,
                assemblies: selectedAssemblies,
                styles: selectedStyles,
                colors: selectedColors,
                heights: selectedHeights,
            },
            success: function (response) {
                // Handle success response
                console.log("AJAX response:", response);
                var productsContainer = $('#products_container');
                var productListHTML = '';

                if (response.products.length > 0) {
                    response.products.forEach(function (product, index) {
                        productListHTML += createProductCard(product, index);
                    });
                } else {
                    productListHTML += `<div class="col-12">`;
                    productListHTML += `    <div class="alert alert-warning" role="alert">`;
                    productListHTML += `        No products found.`;
                    productListHTML += `    </div>`;
                    productListHTML += `</div>`;
                }

                // update products
                productsContainer.html(productListHTML);

                // update pagination
                updatePagination(response.currentPage, response.pages);

                // update count
                $('#number-of-products').text(response.count);
                initializeQuantitiesFromLocalStorage();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error("AJAX error:", error);
            }
        });
    }

    // Bind change event to all input checkboxes
    $("input[type='checkbox']").change(handleInputChange);

    // // Function to update pagination HTML
    // function updatePagination(currentPage, pages) {
    //     var paginationContainer = $('#custom-pagination-container');
    //     var paginationHTML = ``;
    //     paginationHTML = `<nav aria-label="...">`;
    //     paginationHTML += `<ul class="pagination">`;

    //     // Add page links
    //     for (var i = 1; i <= pages; i++) {
    //         paginationHTML += `<li class="page-item ${currentPage == i ? 'active' : ''}"><a class="page-link" href="javascript:void(0)" data-page="${i}">${i}</a></li>`;
    //     }

    //     paginationHTML += `</ul></nav>`;
    //     paginationContainer.html(paginationHTML);
    // }

    // Function to update pagination HTML
    function updatePagination(currentPage, pages) {
        var paginationContainer = $('#custom-pagination-container');
        var paginationHTML = '';
        paginationHTML = '<nav aria-label="...">';
        paginationHTML += '<ul class="pagination">';

        currentPage = parseInt(currentPage);
        // Back arrow
        if (currentPage > 1) {
            paginationHTML += `<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="${currentPage - 1}">Back</a></li>`;
        }

        // Calculate the range of pages to display
        var start = Math.max(1, currentPage - 4);
        var end = Math.min(pages, currentPage + 5);
        if (end - start < 9) {
            start = Math.max(1, end - 9);
            end = Math.min(pages, start + 9);
        }

        // Ensure the range displays only 5 pages
        for (var i = start; i <= end && i <= pages && i < start + 10; i++) {
            paginationHTML += `<li class="page-item ${currentPage == i ? 'active' : ''}"><a class="page-link" href="javascript:void(0)" data-page="${i}">${i}</a></li>`;
        }

        // Next arrow
        if (currentPage < pages) {
            paginationHTML += `<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page="${currentPage + 1}">Next</a></li>`;
        }

        paginationHTML += '</ul></nav>';
        paginationContainer.html(paginationHTML);
    }


    $('#custom-pagination-container').on('click', '.pagination .page-link', function (e) {
        e.preventDefault();
        var page = $(this).data('page');
        var selectedTypes = getSelectedTypes();
        var selectedAssemblies = getSelectedAssemblies();
        var selectedStyles = getSelectedStyles();
        var selectedColors = getSelectedColors();
        var selectedHeights = getSelectedColors();
        var slug = $("#slug").val();

        // Get the CSRF token from the meta tag
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Add the CSRF token to the AJAX request data
        $.ajax({
            url: order_component_filter,
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: {
                types: selectedTypes,
                assemblies: selectedAssemblies,
                styles: selectedStyles,
                colors: selectedColors,
                heights: selectedHeights,
                page: page,
            },
            success: function (response) {
                // Handle success response
                console.log("AJAX response:", response);
                var productsContainer = $('#products_container');
                var productListHTML = '';

                if (response.products.length > 0) {
                    response.products.forEach(function (product, index) {
                        productListHTML += createProductCard(product, index);
                    });
                } else {
                    productListHTML += `<div class="col-12">`;
                    productListHTML += `    <div class="alert alert-warning" role="alert">`;
                    productListHTML += `        No products found.`;
                    productListHTML += `    </div>`;
                    productListHTML += `</div>`;
                }

                // update products
                productsContainer.html(productListHTML);

                // update pagination
                updatePagination(response.currentPage, response.pages);

                // update count
                $('#number-of-products').text(response.count);
                initializeQuantitiesFromLocalStorage();
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error("AJAX error:", error);
            }
        });

    });
});