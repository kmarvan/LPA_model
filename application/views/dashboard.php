<div class="container">
    <div class="row is-flex">
        <div class="col-md-3">
            <div class="form-horizontal">

                <h4><strong>Parameters</strong></h4>

                <div class="form-group">
                    <label class="control-label col-sm-2">b</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="b" value="11.68">
                    </div>    
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2"><i>c</i><sub>ea</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="cea" value="0.01097">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>c</i><sub>el</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="cel" value="0.009264">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>&mu;</i><sub>l</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="mul" value="0.5129">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>c</i><sub>pa</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="cpa" value="0.01779">
                    </div>
                </div>


                <h4><strong>Initial values</strong></h5>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>&mu;</i><sub>a</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="mua" value="0.1108">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>L</i><sub>0</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="l" value="38">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>P</i><sub>0</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="p" value="1.666667">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2"><i>A</i><sub>0</sub></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="a" value="42.66667">
                    </div>
                </div>


                <h4><strong>Time</strong></h4>

                <div class="form-group">
                    <label class="control-label col-sm-2">Start</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="startTime" value="0">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2">End</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="endTime" value="40">
                    </div>
                </div>
                
            </div>
        </div>
        <div id="chartContainer" class="col-md-9 border" >
            <div ></div>
        </div>
    </div>
    <hr/>
    <div class="row">
        
        <div class="col-md-6 col-md-offset-3 ">
            <div class="form-inline lpaselect">
                <h4><strong>Life stage to be plotted</strong></h4>
                <label for="LT">L(t)</label>
                <input type="checkbox" id="LT" name="LT" value="L"> 
                
                <label for="PT">P(t)</label>
                <input type="checkbox" id="PT" name="PT" value="P">
                &nbsp;&nbsp;
                <label for="AT">A(t)</label>
                <input type="checkbox" id="AT" name="AT" value="A">
                &nbsp;&nbsp;
            </div>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary" id="stimulate" type="button">Stimulate</button>&nbsp;&nbsp;
            <button class="btn btn-success" id="more" type="button">More</button>&nbsp;&nbsp;
            <button class="btn btn-warning" id="clear" onClick="clearGraph();return false;" type="button">Clear</button>&nbsp;&nbsp;
        </div>
    </div>
</div>