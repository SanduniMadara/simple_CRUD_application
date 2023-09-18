$(document).ready(function () {
    $(document).off("click", "#SUBMIT");
    $(document).on("click", "#SUBMIT", function (e) {
        e.preventDefault();

        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var NIC = $("#NIC").val();

        var hasErrors = false; // Flag to track validation errors

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

     
        
        // Only proceed if there are no validation errors
        if (!hasErrors) {
            var formData = new FormData();
            formData.append("name", name); //appending 4m data to it
            formData.append("email", email);
            formData.append("phone", phone);
            formData.append("NIC", NIC);

            $.ajax({
                type: "POST",
                url: "/addUserDetails",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: formData,
                contentType: false,
                processData: false,
                success: function (data, status, xhr) {
                    var statusCode = xhr.status;
                    if (statusCode === 200) {
                        // Handle success (data saved)
                        Swal.fire(
                            "Success",
                            "User data saved successfully!",
                            "success"
                        );
                    } else if (statusCode === 422) {
                        // Handle validation errors on the server side
                    } else {
                        // Handle other errors
                    }

                },
                error: function () {
                    // Handle AJAX error
                },

            });
        
        }
    });
});