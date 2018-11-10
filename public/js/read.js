var url = 'http://'+$(location).attr('host');

$(document).ready(function(){
  
    $('#selEquipament').change(function(){
        var cod = $(this).val(); 
        $('#resultListSensors').html("");               

        if(cod != 0){
            $.ajax({
                url: url + '/home/read/list/sensors',
                dataType: "json",
                cache: false,
                data: {id:cod},
                success: function (sensors) {
                    ///alert(user.name);
                    ///console.log(sensors)
                                        
                    for(var i=0; i < sensors.length; i++){
                        $('#resultListSensors1').append('\
                            <div class="checkbox">\
                                <label>\
                                    <input type="checkbox" name="sensors['+i+']" \
                                    value="'+sensors[i].id+'">\
                                    '+sensors[i].name.substring(40, 0)+'\
                                </label>\
                            </div>\
                        ')

                        i++;

                        $('#resultListSensors2').append('\
                        <div class="checkbox">\
                            <label>\
                                <input type="checkbox" name="sensors['+i+']" \
                                value="'+sensors[i].id+'">\
                                '+sensors[i].name.substring(40, 0)+'\
                            </label>\
                        </div>\
                    ')
                    }
                },
            });
        }
        
    })

})