var url = 'http://'+$(location).attr('host');

//// Char home
window.onload = function () {
        
    var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        theme: "light2", // "light1", "light2", "dark1", "dark2"
        title:{
            text: "Week"
        },        
        data: [{        
            type: "column",  
            showInLegend: true, 
            legendMarkerColor: "grey",
            legendText: "MMbbl = one million barrels",
            dataPoints: [      
                { y: 300878, label: "Sunday" },
                { y: 266455,  label: "Monday" },
                { y: 169709,  label: "Tuesday" },
                { y: 158400,  label: "Wednesday" },
                { y: 142503,  label: "Thursday" },
                { y: 101500, label: "Friday" },
                { y: 97800,  label: "Saturday" },   
            ]
        }]
    });
    chart.render();    
}

function datasHome(){
    var totalReads = 0;
    var auxTotalReads = 0;

    setInterval(function() {

        if((auxTotalReads != totalReads) && (auxTotalReads != 0)){
            $('#divDataReads').removeClass('small-box bg-red');
            $('#divDataReads').addClass('small-box bg-green');
            $('#onOffReads').html('<b>Read Online</b>');
        }else{
            $('#divDataReads').removeClass('small-box bg-green');
            $('#divDataReads').addClass('small-box bg-red');
            $('#onOffReads').html('Read Ofline');
        }

        $.ajax({
            url: url + '/home/read/sensors/average',
            dataType: "json",
            cache: false,
            success: function (datas) {
                ///alert(user.name);
                ///console.log(datas)
    
                var aux=0;
                var media=0;
                for(var i =0; i<datas.length; i++){
                    totalReads = datas[i]['total'] + aux;
                    aux = totalReads;                
                }
                
                ///media = Math.round(total/i);
                $('#dataReads').html(totalReads);
    
            },
        });

        auxTotalReads = totalReads;

    }, 4000)    

}

$(document).ready(function(){

    datasHome();
    
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
                    $('#sQtdSensorsSel').html('<span class="green_one"> '+tam+' selected</span>')
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
