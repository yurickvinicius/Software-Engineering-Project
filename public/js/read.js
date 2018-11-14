var url = 'http://'+$(location).attr('host');

$(document).ready(function(){

    $('#selEquipament').change(function(){
        var cod = $(this).val();
        $('#resultListSensors1').html("");
        $('#resultListSensors2').html("");
        $('#sQtdSensorsSel').html('');

        if(cod != 0){
            $.ajax({
                url: url + '/home/read/list/sensors',
                dataType: "json",
                cache: false,
                data: {id:cod},
                success: function (sensors) {
                    ///alert(user.name);
                    ///console.log(sensors)

                    var tam = sensors.length;
                    for(var i=0; i < tam; i++){
                        $('#resultListSensors1').append('\
                            <div class="checkbox">\
                                <label>\
                                    <input onclick="qtdCheckBoxChecked()" checked type="checkbox" name="sensors['+i+']" \
                                    value="'+sensors[i].id+'">\
                                    '+sensors[i].name.substring(40, 0)+'\
                                </label>\
                            </div>\
                        ')

                        i++;

                        $('#resultListSensors2').append('\
                        <div class="checkbox">\
                            <label>\
                                <input onclick="qtdCheckBoxChecked()" checked type="checkbox" name="sensors['+i+']" \
                                value="'+sensors[i].id+'">\
                                '+sensors[i].name.substring(40, 0)+'\
                            </label>\
                        </div>\
                        ')
                    }

                    $('#sQtdSensorsSel').html('<span class="green_one"> '+tam+' selected</span>')


                },
            });
        }

    })

})

function qtdCheckBoxChecked(){

    var cont = 0
    $("input:checked").each(function () {
        cont++;
    })

    var tam = 0
    $("input[type=checkbox]").each(function () {
        tam++;
    })

    $('#sQtdSensorsSel').html('<span class="green_one"> '+cont+' selected of the '+tam+' sensors.</span>')
}

function clearAllCheckbox(){
    $("input[type=checkbox]").each(function () {
        $(this).attr('checked', false);
    })
    qtdCheckBoxChecked()
}

function checkAllCheckbox(){
    $("input[type=checkbox]").each(function () {
        $(this).attr('checked', true);
    })
    qtdCheckBoxChecked()
}
