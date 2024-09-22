
$(document).ready(function() {
    var invoiceNumber = $('.main-content').attr('data-InvoiceId');
    $.ajax({
        url: 'backend/InvoiceData/InvoiceCollectionNotes.php?invoiceid=' + invoiceNumber, // Replace with the URL to your PHP script
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            data.sort(function(a, b) {
                return new Date(b.Date) - new Date(a.Date);
            });
            var listContent = '';

            $.each(data, function(index, note) {
                listContent += '<li class="list-group-item" data-id="' + note.NoteIdIndex + '">';
                listContent += '  <div class="d-flex align-items-start">';
                listContent += '    <div class="flex-shrink-0 me-3">';
                listContent += '      <div>';
                listContent += '        <img class="image avatar-xs rounded-circle" alt="" src="assets/images/users/avatar-4.jpg">'; // Replace with user's avatar if available
                listContent += '      </div>';
                listContent += '    </div>';
                listContent += '    <div class="flex-grow-1 overflow-hidden">';
                listContent += '      <h5 class="contact-name fs-13 mb-1">';
                listContent += '        <a href="#" class="link text-reset">' + note.UserName + '</a>';
                listContent += '        <a href="#" class="link text-reset">' + formatDateToDDMMYYYY(note.Date) + '</a>';
                listContent += '      </h5>';
                listContent += '      <p class="contact-born text-muted mb-0">' + note.Note + '</p>';
                listContent += '    </div>';
                listContent += '    <div class="flex-shrink-0 ms-2">';
                listContent += '      <div class="fs-11 text-muted">' + formatDateDifference(note.Date) + '</div>';
                listContent += '    </div>';
                listContent += '  </div>';
                listContent += '</li>';
            });
          
            $('#CollectionsList').append(listContent);
        },
        error: function() {
            console.error('Failed to fetch data.');
        }
    });
});



$(document).ready(function() {
    var invoiceNumber = $('.main-content').attr('data-InvoiceId');
  
    
    $('#CollSubmit').click(function(e) {
        
        e.preventDefault(); // Prevent the default form submission
        
        console.log("Called");

        var collsNote = $('#CollNote').val(); // Get the value from the input field
        console.log("Note:" + collsNote);

        // Check if the input is not empty
        if (collsNote) {
            $.ajax({
                url: '/backend/Actions/AddCollsNote.php',
                type: 'GET',
                data: {
                    InvoiceNumber: invoiceNumber, // Replace with how you're getting the invoice number
                    Note: collsNote
                },
                success: function(response) {
                    // Handle success
                    console.log(response);
                    alert('Data submitted successfully!');
                },
                error: function(error) {
                    // Handle error
                    console.error(error);
                    alert('Error submitting data.');
                }
            });
        } else {
            alert('Please enter a note.');
        }
        location.reload(true);
    });
});



function formatDateToDDMMYYYY(dateString) {
    var date = new Date(dateString);
    return new Intl.DateTimeFormat('en-GB').format(date);
}


function formatDateDifference(dateString) {
    var today = new Date();
    var noteDate = new Date(dateString);
    var differenceInTime = today - noteDate;
    var differenceInDays = differenceInTime / (1000 * 3600 * 24);

    if (differenceInDays < 1) {
        return "Today";
    } else if (differenceInDays < 2) {
        return "1 day";
    } else if (differenceInDays < 7) {
        return Math.floor(differenceInDays) + " days";
    } else if (differenceInDays < 14) {
        return "1 week";
    } else if (differenceInDays < 30) {
        return Math.floor(differenceInDays / 7) + " weeks";
    } else if (differenceInDays < 60) {
        return "1 month";
    } else if (differenceInDays < 365) {
        return Math.floor(differenceInDays / 30) + " months";
    } else if (differenceInDays < 730) {
        return "1 year";
    } else {
        return Math.floor(differenceInDays / 365) + " years";
    }
}
