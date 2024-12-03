$(document).ready(function() {
    // Use AJAX to fetch data from the PHP script
    $.ajax({
      url: '/backend/Tables/invoices.php', // Replace with the actual path to your PHP script
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Populate the table with fetched data
        var tableBody = $('#data-table-body');
        $.each(data, function(index, item) {
          var row = $('<tr>').appendTo(tableBody);
          var formattedAmount = new Intl.NumberFormat('en-US', { style: 'currency', currency: item.Currency }).format(item.Amount);
          $('<td>').html('<div class="form-check"><input class="form-check-input" type="checkbox" id="check' + item.InvoiceNumber + '" value="option"></div>').appendTo(row);
          $('<td>').html('<a href="invoice-details.php?Inv=' + item.InvoiceNumber + '">' + item.InvoiceNumber + '</a>').appendTo(row);
          $('<td>').text(item.Entity).appendTo(row);
          $('<td>').text(item.CustomerNumber).appendTo(row);
          $('<td>').text(item.CustomerName).appendTo(row);
          $('<td>').text(formatDateToDDMMYYYY(item.InvoiceDate)).appendTo(row);
          $('<td>').text(formatDateToDDMMYYYY(item.NetDueDate)).appendTo(row);
          $('<td>').text(formattedAmount).appendTo(row);
          $('<td>').text(item.ApproverName).appendTo(row);
          $('<td>').html(generateStatusBadge(item.Status)).appendTo(row);
          $('<td>').html(generateDropdownButton()).appendTo(row);
        });
      },
      error: function(xhr, status, error) {
        console.error('Error fetching data:', status, error);
      }
    });
  });
  
  function formatDateToDDMMYYYY(inputDate) {
      var date = new Date(inputDate);
      var day = String(date.getDate()).padStart(2, '0');  
      var month = String(date.getMonth() + 1).padStart(2, '0'); 
      var year = date.getFullYear();
      return day + '/' + month + '/' + year;
  }
  
  
  function generateStatusBadge(status) {
      var badgeClass;
      switch (status) {
          case "Paid": badgeClass = "badge text-bg-primary"; break;
          case "Promised": badgeClass = "badge bg-primary-subtle text-primary"; break;
          case "Pending": badgeClass = "badge bg-warning-subtle text-warning"; break;
          case "Rejected": badgeClass = "badge text-bg-danger"; break;
          case "Sent": badgeClass = "badge text-bg-success"; break;
          case "Query": badgeClass = "badge bg-warning-subtle text-warning"; break;
          case "Write off": badgeClass = "badge bg-danger-subtle text-danger"; break;
          case "Success": badgeClass = "badge bg-success-subtle text-success"; break;
          case "Approved": badgeClass = "badge bg-primary-subtle text-primary"; break;
          // Add any other statuses you might have here in a similar manner
          default: badgeClass = ""; break;
      }
      return '<span class="' + badgeClass + ' p-2">' + status + '</span>';
  }
  
  
  
  // Function to generate the dropdown button HTML
  function generateDropdownButton() {
    var dropdownContainer = $('<div>').addClass('dropdown');
    var dropdownButton = $('<button>').addClass('btn btn-soft-secondary btn-sm dropdown')
      .attr({
        'type': 'button',
        'data-bs-toggle': 'dropdown',
        'aria-expanded': 'false'
      }).appendTo(dropdownContainer);
  
    $('<i>').addClass('las la-ellipsis-h align-middle fs-18').appendTo(dropdownButton);
  
    var dropdownMenu = $('<ul>').addClass('dropdown-menu dropdown-menu-end').appendTo(dropdownContainer);
  
    var viewOption = $('<li>').appendTo(dropdownMenu);
    $('<button>').addClass('dropdown-item').attr('href', 'javascript:void(0);')
      .html('<i class="las la-eye align-middle me-2 text-muted"></i>View').appendTo(viewOption);
  
    var editOption = $('<li>').appendTo(dropdownMenu);
    $('<button>').addClass('dropdown-item').attr('href', 'javascript:void(0);')
      .html('<i class="las la-pen align-middle me-2 text-muted"></i>Edit').appendTo(editOption);
  
    var downloadOption = $('<li>').appendTo(dropdownMenu);
    $('<a>').addClass('dropdown-item').attr('href', 'javascript:void(0);')
      .html('<i class="las la-file-download align-middle me-2 text-muted"></i>Download').appendTo(downloadOption);
  
    $('<li>').addClass('dropdown-divider').appendTo(dropdownMenu);
  
    var deleteOption = $('<li>').appendTo(dropdownMenu);
    $('<a>').addClass('dropdown-item remove-item-btn').attr('href', '#')
      .html('<i class="las la-trash-alt align-middle me-2 text-muted"></i>Delete').appendTo(deleteOption);
  
    return dropdownContainer;
  }

  $(document).ready(function() {

    // Fetching data from your endpoint
    $.getJSON('/backend/Stats/InvoiceStats.php', function(data) {

        // Helper function to format the sum value
        function formatSum(value) {
          if (value >= 1000000) {
              return { 
                  formatted: (value / 1000000).toFixed(2) + "m" , 
                  raw: value 
              };
          } else if (value >= 1000) {
              return { 
                  formatted: (value / 1000) + "k", 
                  raw: value 
              };
          } else {
              return { 
                  formatted: value.toString(),
                  raw: value 
              };
          }
      }


        // Function to update the card values
        function updateCardValues(sumID, countID, sumValue, countValue) {
            const sumData = formatSum(sumValue);
            $(`#${sumID}`).attr('data-target', sumData.raw);
            $(`#${sumID}`).closest('h4').html(`$<span id="${sumID}" class="counter-value" data-target="${sumData.raw}">${sumData.formatted}</span>`);
            $(`#${countID}`).text(countValue);
        }

        function animateCount() {
          var counterElems = document.querySelectorAll(".counter-value");
          console.log("Animate Count called")
  
          function formatNumber(value) {
              return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
          }
  
          counterElems.forEach(function(elem) {
              var target = +elem.getAttribute("data-target");
              var current = elem.innerText;
              
              var difference = target - current;
              var increment = Math.max(Math.floor(difference / 100), 1); // Adjust this division for faster/slower animation
  
              function updateValue() {
                  if (current < target) {
                      current += increment;
                      if (current > target) current = target; // Ensure we don't exceed the target value
                      elem.innerText = formatNumber(current);
                      console.log(current);
                      setTimeout(updateValue, 10);
                  }
              }
  
              updateValue();
          });
      }
      



        // Update the cards using the function
        updateCardValues('PaidSum', 'PaidCount', data.PaidSum, data.PaidCount);
        updateCardValues('SentSum', 'SentCount', data.SentSum, data.SentCount);
        updateCardValues('UnpaidSum', 'UnpaidCount', data.UnpaidSum, data.UnpaidCount);
        updateCardValues('RejectedSum', 'RejectedCount', data.RejectedSum, data.RejectedCount);

        // Trigger the counting animation (assuming it's bound to a custom 'animateCount' event)
        animateCount();


    });

});

  