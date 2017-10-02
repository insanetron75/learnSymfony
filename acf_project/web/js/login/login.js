/**
 * Created by timmy on 12/01/2017.
 */
$(function() {

    //get form
    var form = $('#form');

    //event listener for form
    $('#submit').click(function (e) {
        //stop browser from submitting
        e.preventDefault();

        //serialise the data
        var formData = $('form').serialize();

        //submit the form using AJAX.
        $.ajax({
            type: 'POST',
            url: $(form).attr('action'),
            data: formData,
            success: function (data) {
                console.log("success");
                $('#loginForm').append(data);
                window.location.href = 'home/home.html';
            },
            error: function (data) {
                $('#loginForm').append(data);
                alert("Login Failed");
            }
        });
    });
});
