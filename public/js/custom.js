$(document).ready(function () {
    var Toast = Swal.mixin({
        toast: true,
        position: "center",
        showConfirmButton: false,
        timer: 3000,
    });

    // Custom validation method to check if the password meets the requirements
    $.validator.addMethod(
        "containsUppercaseLowercaseSymbol",
        function (value, element) {
            // Use regular expressions to check for uppercase, lowercase, and symbols
            var hasUppercase = /[A-Z]/.test(value);
            var hasLowercase = /[a-z]/.test(value);
            var hasNumber = /\d/.test(value);
            var hasSymbol = /[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/.test(value);

            // Password is valid if it meets all three requirements
            return hasUppercase && hasLowercase && hasNumber && hasSymbol;
        },
        "The password must contain at least one uppercase letter, one lowercase letter, one number, and one symbol."
    );

    // Signup Form validation
    $("#signupform").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
            },
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                containsUppercaseLowercaseSymbol: true, // Use the custom validation methods
                minlength: 8, // Change this to your desired minimum password length
            },
            password_confirmation: {
                required: true,
                equalTo: "#password-input", // Ensure password matches confirmation
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });

    // Login Form validation
    $("#loginform").validate({
        rules: {
            email: {
                required: true,
            },
            password: {
                required: true,
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });

    // Pass update Form validation
    $("#pass-update").validate({
        rules: {
            old_password: {
                required: true,
                minlength: 8,
            },
            password: {
                required: true,
                containsUppercaseLowercaseSymbol: true,
                minlength: 8,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password-input",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            element.closest(".form-group").append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass("is-invalid");
        },
    });

    //  Table
    var table = $("#table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });

    table.buttons().container().appendTo("#table_wrapper .col-md-6:eq(0)");

    // Add class to buttons after they are appended
    $("#table_wrapper button").addClass(
        "datatables-buttons-theme-color btn-sm"
    );

    //  Users table
    var table = $("#user_table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });

    table.buttons().container().appendTo("#user_table_wrapper .col-md-6:eq(0)");

    // Add class to buttons after they are appended
    $("#user_table_wrapper button").addClass(
        "datatables-buttons-theme-color btn-sm"
    );

    // SuperAdmin table
    var table = $("#superadmin_table").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["copy", "csv", "excel", "pdf", "print"],
    });

    table
        .buttons()
        .container()
        .appendTo("#superadmin_table_wrapper .col-md-6:eq(0)");

    // Add class to buttons after they are appended
    $("#superadmin_table_wrapper button").addClass(
        "datatables-buttons-theme-color btn-sm"
    );
});

$(document).ready(function () {
    $('.status-toggle').change(function () {
        var designId = $(this).data('design-id');
        var status = $(this).prop('checked') ? 'approved' : 'pending';

        $.ajax({
            url: '/admin/forums/design-service-forums/' + designId + '/update-status',
            type: 'PUT',
            data: { status: status },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                Swal.fire({
                    title: "Success!",
                    text: "Status changed successfully",
                    icon: "success",
                    button: "OK",
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });

    });

    $('.printing-status-toggle').change(function () {
        var printId = $(this).data('print-id');
        var status = $(this).prop('checked') ? 'approved' : 'pending';

        $.ajax({
            url: '/admin/forums/printing-forums/' + printId + '/update-status',
            type: 'PUT',
            data: { status: status },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                Swal.fire({
                    title: "Success!",
                    text: "Status changed successfully",
                    icon: "success",
                    button: "OK",
                });
            },
            error: function (xhr) {
                console.error(xhr.responseText);
            }
        });

    });
});

function display_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(input)
                .closest(".row")
                .find(".preview-image-wrapper")
                .addClass("d-block")
                .removeClass("d-none");
            $(input)
                .closest(".row")
                .find("#image_preview")
                .attr("src", e.target.result)
                .addClass("d-block")
                .removeClass("d-none");
            $(input)
                .closest(".row")
                .find("#remove_image")
                .addClass("d-block")
                .removeClass("d-none");
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// Handle the remove button click
function removeImage(element, id = "", image = "") {
    if (image) {
        var csrfToken = $('meta[name="csrf-token"]').attr("content");

        Swal.fire({
            title: `Are you sure you want to delete the image?`,
            text: "If you delete this, it will be deleted from the database.",
            customClass: {
                cancelButton: "btn btn-danger",
            },
            showCancelButton: true,
            cancelButtonText: "No",
            cancelButtonColor: "#ce4242",
            confirmButtonColor: "#004A99",
            confirmButtonText: `Yes`,
            // closeOnConfirm: false,
        }).then((result) => {
            if (!result.isConfirmed) return;

            // Send an AJAX request to remove image_path from the database
            $.ajax({
                url: removeImageUrl,
                type: "POST", // Adjust the method as needed (POST, GET, etc.)
                data: {
                    id: id,
                    _token: csrfToken,
                },
                success: function (response) {
                    // Handle success response if needed
                    // console.log("Image removed successfully");
                    $(element).attr("onclick", "removeImage(this)");
                },
                error: function (xhr, status, error) {
                    // Handle error response if needed
                    // console.error("Error removing image:", error);
                },
            });

            hide_image_preview(element);
        });
    } else {
        hide_image_preview(element);
    }
}

function hide_image_preview(element) {
    $(element)
        .closest(".row")
        .find(".preview-image-wrapper")
        .addClass("d-none")
        .removeClass("d-block");
    $(element)
        .closest(".row")
        .find("#image_preview")
        .attr("src", "#")
        .addClass("d-none")
        .removeClass("d-block");
    $(element).addClass("d-none").removeClass("d-block");
    // Clear the file input to allow selecting the same image again
    $(element).closest(".row").find("#image_path").val("");
}

$(document).ready(function () {
    // Custom validation method for checking if a number is positive
    $.validator.addMethod(
        "positiveNumber",
        function (value) {
            return value > 0;
        },
        "Please enter a positive number."
    );

    // Adding validation to the form
    $("#productForm").validate({
        rules: {
            product_code: {
                required: true,
            },
            short_title: {
                required: true,
            },
            full_title: {
                required: true,
            },
            price: {
                required: true,
                positiveNumber: true,
            },
            discounted_percentage: {
                number: true,
                range: [0, 100], // Ensure the discount is between 0 and 100
            },
            product_description: {
                required: true,
            },
            category_id: {
                required: true,
            },
            height: {
                number: true,
            },
            width: {
                number: true,
            },
            depth: {
                number: true,
            },
            length: {
                number: true,
            },
            weight: {
                number: true,
            },
        },
        messages: {
            discounted_percentage: {
                range: "Please enter a valid discount percentage (0-100)",
            },
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            element.closest(".form-group").append(error);
        },
        submitHandler: function (form) {
            // You can perform additional actions before submitting the form if needed
            form.submit();
        },
    });

    // Function to calculate discounted price based on price and discount percentage
    function calculateDiscountedPrice() {
        var price = parseFloat($("#price").val()) || 0;
        var discountPercentage = parseFloat($("#discounted_percentage").val()) || 0;

        // Calculate discounted price
        var discountedPrice = price - price * (discountPercentage / 100);

        // Update the discounted price field
        $("#discounted_price").val(discountedPrice.toFixed(2));
    }

    // Event listener for the 'price' input
    $("#price").on("input", function () {
        calculateDiscountedPrice();
    });

    // Event listener for the 'discount' input
    $("#discounted_percentage").on("input", function () {
        calculateDiscountedPrice();
    });
});

// $(document).ready(function () {
//     $('#importForm').on('submit', function () {
//         // Show spinner and disable buttons
//         $(this).find("#importBtn").prop('disabled', true);
//         $(this).find('input[type="file"]').addClass('d-none');
//         $(this).find('#loadingText').html('<p class=\'py-3\'>Please don\'t refresh the page. Importing is in progress...</p>')
//         $(this).find('.spinner-border').addClass('d-block').removeClass('d-none');
//     });
// });
var ajaxRequest;

$(document).ready(function () {
    $('#importForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        var form = $(this)[0];
        var formData = new FormData(form);

        // Show spinner and disable buttons
        $('#importBtn').prop('disabled', true);
        $('#file').prop('disabled', true);
        $('#loadingText').html('<p class=\'py-3\'>Please don\'t refresh the page. Importing is in progress...</p>');
        $('.spinner-border').addClass('d-block').removeClass('d-none');

        // Make AJAX request
        ajaxRequest = $.ajax({
            url: form.action,
            method: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                // Handle success response
                console.log(response);
            },
            error: function (xhr, status, error) {
                // Handle error response
                console.error(xhr.responseText);
            },
            complete: function () {
                // Enable buttons and hide spinner
                $('#importBtn').prop('disabled', false);
                $('#file').prop('disabled', false);
                // $('#file').val('');
                $('#loadingText').empty();
                $('.spinner-border').removeClass('d-block').addClass('d-none');
            }
        });
    });

    // Show confirmation dialog when attempting to close the window or tab
    window.addEventListener('beforeunload', function (e) {
        if (ajaxRequest && ajaxRequest.readyState !== 4) {
            var confirmationMessage = 'You have an active import in progress. Are you sure you want to leave?';
            e.returnValue = confirmationMessage;
            return confirmationMessage;
        }
    });
});
