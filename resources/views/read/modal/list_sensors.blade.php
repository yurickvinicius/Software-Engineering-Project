            <!------------------- MODAL ------------------->

            <div class="modal fade" id="listSensorsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Select the sensors</h4>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12" style="margin-bottom:2%">
                            <div class="col-md-6" id="resultListSensors1">
                                <h3>Please, select a equipament!</h3>
                            </div>
                            <div class="col-md-6" id="resultListSensors2"></div>
                        </div>
                    </div>
                    
                    <div style="padding-bottom:1%">
                        <div style="margin-left: 75%">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        <button onclick="clearAllCheckbox()" type="button" class="btn btn-primary">Clear</button>
                        <button onclick="checkAllCheckbox()" type="button" class="btn btn-primary">Select All</button>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <!------------------------------------->