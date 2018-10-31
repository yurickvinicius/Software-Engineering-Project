var url = 'http://'+$(location).attr('host');

$(document).ready(function(){
    ///alert('hihihi')
})

function viewUser(cod){

    $.ajax({
        url: url + '/home/showUser',
        dataType: "json",
        cache: false,
        data: {id:cod},
        success: function (user) {
          ///alert(user.name);
          ///console.log(user)
          
            $('#userName').html(user.name);
            $('#userLogin').html(user.login);
            $('#userEmail').html(user.email);
            $('#userCreated').html(user.created_at);
            if(user.type == 1)
                user.type = 'Administrator'
            else
                user.type = 'Comum'

            $('#userType').html(user.type);
        },
    });

}