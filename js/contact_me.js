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
                dataType: "json",
                data: {
                    user: user,
                    password: password
                },
                cache: false,
                success: function(data) {
                    console.log('data', data);
                    localStorage.setItem('userId', data['id_usuario']);
                    localStorage.setItem('user', data['nombre_usuario']);
                    
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#success').html("<div class='alert alert-success'>");
                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-success')
                        .append("<strong>Sesion Iniciada. </strong>");
                    $('#success > .alert-success')
                        .append('</div>');
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
                    $('#regsuccess > .alert-danger').append("<strong>Usuario ya existe");
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


$(function() {

    $("#nuevaNoticiaForm input,#nuevaNoticiaForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var titulo = $("input#titulo").val();
            var noticia = $("textarea#noticia").val();
            $.ajax({
                url: "././nuevanoticia.php",
                type: "POST",
                data: {
                    id_usuario: localStorage.getItem('userId'),
                    titulo: titulo,
                    noticia: noticia
                },
                cache: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#nuevasuccess').html("<div class='alert alert-success'>");
                    $('#nuevasuccess > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#nuevasuccess > .alert-success')
                        .append("<strong>Noticia Creada. </strong>");
                    $('#nuevasuccess > .alert-success')
                        .append('</div>');
                    //clear all fields
                    $('#nuevaNoticiaForm').trigger("reset");
                    setTimeout(function() {
                        $('#nuevaNoticiaFormClose').click();
                        location.reload();
                    }, 1000);
                },
                error: function() {
                    console.log(':(');
                    // Fail message
                    $('#nuevasuccess').html("<div class='alert alert-danger'>");
                    $('#nuevasuccess > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#nuevasuccess > .alert-danger').append("<strong>La noticia no pudo ser creada");
                    $('#nuevasuccess > .alert-danger').append('</div>');
                    //clear all fields
                    $('#nuevaNoticiaForm').trigger("reset");
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

    $("#nuevoArtistaForm input").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {
            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            
            // get values from FORM
            var nombre_artista = $("input#nombre_artista").val();
            var foto = $("input#foto")[0].files[0];
            $.ajax({
                url: "././nuevoartista.php",
                type: "POST",
                data: {
                    nombre_artista: nombre_artista,
                    foto: foto
                },
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                    $('#nuevoArtistaSuccess').html("<div class='alert alert-success'>");
                    $('#nuevoArtistaSuccess > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#nuevoArtistaSuccess > .alert-success')
                        .append("<strong>Artista Agregado. </strong>");
                    $('#nuevoArtistaSuccess > .alert-success')
                        .append('</div>');
                    //clear all fields
                    $('#nuevoArtistaForm').trigger("reset");
                    setTimeout(function() {
                        $('#nuevoArtistaFormClose').click();
                        location.reload();
                    }, 1000);
                },
                error: function() {
                    console.log(':(');
                    // Fail message
                    $('#nuevoArtistaSuccess').html("<div class='alert alert-danger'>");
                    $('#nuevoArtistaSuccess > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#nuevoArtistaSuccess > .alert-danger').append("<strong>Artista no creado");
                    $('#nuevoArtistaSuccess > .alert-danger').append('</div>');
                    //clear all fields
                    $('#nuevoArtistaForm').trigger("reset");
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
