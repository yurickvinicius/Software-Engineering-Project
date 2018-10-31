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

function viewEquip(cod){

    $.ajax({
        url: url + '/home/showEquipment',
        dataType: "json",
        cache: false,
        data: {id:cod},
        success: function (data) {
          ///alert(data.name);
          console.log(data)
          
            $('#equipName').html(data.name);
            $('#equipLocal').html(data.local);
        },
    });

}

function viewSensor(cod){

    $.ajax({
        url: url + '/home/showSensor',
        dataType: "json",
        cache: false,
        data: {id:cod},
        success: function (data) {
          ///alert(data.name);
          console.log(data)
          
            $('#equipName').html(data.name);
            $('#equipLocal').html(data.local);
        },
    });

}