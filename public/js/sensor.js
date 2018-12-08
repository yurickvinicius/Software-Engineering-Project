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
          ///console.log(data)
          
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
          ///console.log(data)
          
            $('#sensorName').html(data.sensor.name);
            $('#sensorCreated').html(data.sensor.created_at);
            $('#EquipamentName').html(data.equipment.name);
        },
    });

}


function viewUserSensor(codSensor){

    $('#hidCodSensor').val(codSensor)
    $('#userSensor').html('')

    $.ajax({
        url: url + '/home/show/comun/user',
        dataType: "json",
        cache: false, 
        data: {sensor_id:codSensor},       
        success: function (users) {
          ///alert(user.name);
          console.log(users)

          for(var i=0; i < users.length; i++){
            checked = 'unchecked';
            if(users[i].user_id != null)
                checked = 'checked';

            $('#userSensor').append('\
            <form class="form-inline">\
                <div class="checkbox">\
                    <label>\
                    <input '+checked+' value="'+users[i].id+'" type="checkbox"> <span id="userName_'+i+'">'+users[i].name+'</span>\
                    </label>\
                </div>\
            </form>\
            ')
          }

        },
    });

}


function sensorRent(){

    var codSensor = $('#hidCodSensor').val();
    var users = [];

    $("input[type=checkbox]").each(function () {
        if (this.checked == true) 
            users.push(this.value)
    })    

    $.ajax({
        url: url + '/home/rent',
        dataType: "json",
        cache: false,
        data: {users:users, id_sensor:codSensor},
    });

}