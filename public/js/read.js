var url = 'http://'+$(location).attr('host');

$(document).ready(function(){

/* ########################### */
///setInterval(function() {
    $('#showAverage').html('')
    $.ajax({
        url: url + '/home/read/sensors/average',
        dataType: "json",
        cache: false,
        success: function (datas) {
            ///alert(user.name);
            ///console.log(datas)

            var aux=0;
            var total=0;
            var media=0;
            for(var i =0; i<datas.length; i++){
                ///alert(datas[i]['sensor_id'])

                /*
                $('#showAverage').append('\
                    <div class="col-md-3">\
                        <span>ID:<b>'+datas[i]['sensor_id']+'</b></span><br>\
                        <span>Total:<b>'+datas[i]['total']+'</b></span>\
                    </div>\
                ')
                */

                total = datas[i]['total'] + aux;
                aux = total;                
            }
            
            media = Math.round(total/i);

            $('#showAverage').append('\
            Total Sensor: '+i+'<br>\
            Total de Leitura: '+total+'<br>\
            Media: '+media+'\
            ')

        },
    });
///}, 5000)

/*setInterval(function() {
    alert('vinicius')
    }, 4000)
*/
    
/* ############################## */
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
        }else{
            $('#resultListSensors1').html("<h3>Please, select a equipament!</h3>")            
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

function clearAllCheckbox() {

    $("input[type=checkbox]").each(function () {
        if (this.checked) 
            this.checked = false;
    });
    qtdCheckBoxChecked()
}

function checkAllCheckbox(){
    $("input[type=checkbox]").each(function () {
        if (this.checked == false) 
        this.checked = true;
    })
    qtdCheckBoxChecked()
}
