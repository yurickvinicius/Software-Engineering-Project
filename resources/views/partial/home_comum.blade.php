<div class="row">
    <div class="col-md-12">

        <h4 align="center">My Sensors Rented</h4>

        <table class="table table-condensed"> 
            <thead> 
                <tr> 
                    <th>#</th> 
                    <th>Name</th> 
                    <th>Equipament</th> 
                    <th>Status</th> 
                </tr> 
            </thead> 
            <tbody> 
                <?php $cont=1 ?>
                @foreach ($userSensors as $userSensor)                                    
                    <tr> 
                        <th scope="row">{{ $cont++ }}</th> 
                        <td>{{ $userSensor->sensor->name }}</td> 
                        <td>{{ $userSensor->sensor->equipament->name }}</td> 
                        <td class="danger"><b style="color:brown">OFF</b></td> 
                    </tr>
                @endforeach  
            </tbody> 
        </table> 
    </div>
    
</div>