$(function() {

    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var user = $("input#user").val();
            var password = $("input#password").val();
            var firstName = user; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = user.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././login.php",
                type: "POST",
                data: {
                    user: user,
                    password: password
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Sesion Iniciada. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');
                    localStorage.setItem('user', user);
                    //clear all fields
                    $('#contactForm').trigger("reset");
                    setTimeout(function() {
                        $('#contactFormClose').click();
                    }, 1000);
                    $('#iniciarSesion').addClass("hide");
                    $('#cerrarSesion').removeClass("hide");
                    
                    $('#registrarse').addClass("hide");
                },
                error: function() {
                    console.log(':(');
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Usuario no registrado");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

$(function() {

    $("#registerForm input,#registerForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var user = $("input#reguser").val();
            var password = $("input#regpassword").val();
            var firstName = user; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = user.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: "././register.php",
                type: "POST",
                data: {
                    user: user,
                    password: password
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#regsuccess').html("<div class='alert alert-success'>");
                    $('#regsuccess > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#regsuccess > .alert-success')
                        .append("<strong>Usuario Creado. </strong>");
                    $('#regsuccess > .alert-success')
                        .append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                    setTimeout(function() {
                        $('#regFormClose').click();
                        location.reload();
                    }, 1000);
                },
                error: function() {
                    console.log(':(');
                    // Fail message
                    $('#regsuccess').html("<div class='alert alert-danger'>");
                    $('#regsuccess > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#regsuccess > .alert-danger').append("<strong>No se pudo crear el usuario");
                    $('#regsuccess > .alert-danger').append('</div>');
                    //clear all fields
                    $('#registerForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
