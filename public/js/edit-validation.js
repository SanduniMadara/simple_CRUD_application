
    $(document).ready(function () {
        $('#submit-button').click(function () {
            var name = $('#name').val().trim();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var NIC = $('#NIC').val();

            // Perform client-side validation here

            // Example validation (you can customize this)
                  // Validate name (required)
      if (name.trim() === '') {
        $('#name-error-msg').text('Please enter a valid name.');
        hasErrors = true;
    } else {
        $('#name-error-msg').text(''); // Clear the error message if validation passes
    }

   
        // Validate phone number format
        if (phone.length !== 10 || phone.charAt(0) !== "0") {
            $("#phone-error-msg").text(
                "Please enter a valid phone number starting with 0 and having 10 digits."
            );
            hasErrors = true;
        } else {
            $("#phone-error-msg").text(""); // Clear the error message if validation passes
        }

        // Validate email format
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
        if (!emailPattern.test(email)) {
            $("#email-error-msg").text("Please enter a valid email address.");
            hasErrors = true;
        } else {
            $("#email-error-msg").text(""); // Clear the error message if validation passes
        }

          // Validate NIC (should be 10 or 12 digits)
    if (NIC.length !== 10 && NIC.length !== 12) {
        $('#NIC-error-msg').text('NIC should be either 10 or 12 digits long.');
        hasErrors = true;
    } else {
        $('#NIC-error-msg').text(''); // Clear the error message if validation passes
    }

            // Add more validation rules as needed

            if (!hasErrors) {
                // If there are no validation errors, submit the form using AJAX
                $.ajax({
                    type: "POST",
                    url: "{{ route('updateUser', ['id' => $user->id]) }}",
                    data: {
                        name: name,
                        email: email,
                        phone: phone,
                        NIC: NIC,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        // Handle the success response here
                        console.log(data);
                        // You can redirect or display a success message as needed
                    },
                    error: function (xhr, textStatus, errorThrown) {
                        // Handle the error response here
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    });
