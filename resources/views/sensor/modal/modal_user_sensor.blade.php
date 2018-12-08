<div class="modal fade" id="userSensorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comum Users (Rent the sensor)</h4>
            </div>
            <div class="modal-body">
                
                <div id="userSensor">
                    <!---
                    <form class="form-inline">
                        <div class="checkbox">
                            <label>
                            <input type="checkbox"> <span id="userName"></span>
                            </label>
                        </div>
                    </form>
                    !--->
                </div>

            </div>

            <input id="hidCodSensor" type="hidden">

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button onclick="sensorRent()" type="button" class="btn btn-primary" data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>