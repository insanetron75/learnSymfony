/**
 * Created by Timmy on 06/02/2017.
 */
$(document).ready(function () {

    var userID = 1;
    //create homepage report
    $.ajax({
        type: 'POST',
        url: 'php/home.php',
        data: {user: userID},
        success: function (data) {
            data = JSON.parse(data)
            $('#number').text(data.number);
            $('#rank').text(data.rank);
            $('#firstName').text(data.firstName);
            $('#lastName').text(data.lastName);
            $('#battalion').text(data.battalion);
            $('#company').text(data.company);
            $('#detachment').text(data.detachment);
        }
    });

});