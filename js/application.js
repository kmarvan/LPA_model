$(document).ready(function () {
    $("#stimulate").click(function () {

        var startTime = $("#startTime").val();
        var endTime = $("#endTime").val();
        var LT = $("#LT").is(':checked');
        var PT = $("#PT").is(':checked');
        var AT = $("#AT").is(':checked');
        var dataL = "";
        var dataP = "";
        var dataA = "";
        var dataLPA = [];
        
        $.ajax({
            type: "POST",
            url: base_url + "index.php/dashboard/calculateLPA",
            data: {startTime:startTime,endTime:endTime,LT:LT,PT:PT,AT:AT},
            success: function (result) {
                clearGraph();
                console.log(result);
                if(LT == true){
                   dataLPA.push({area: false,values: result.L,key: "L(t)",color: "#f39c12",strokeWidth: 4,classed: "dashed"});
                }
                
                if(PT == true){
                    dataLPA.push({area: false,values: result.P,key: "P(t)",color: "#039be5",strokeWidth: 4,classed: "dashed"});
                }
                
                if(AT == true){
                    dataLPA.push({area: false,values: result.A,key: "A(t)",color: "#dce775 ",strokeWidth: 4,classed: "dashed"});
                }
                
                /*[{area: false,values: result.L,key: "LPA",color: "#00acc1",strokeWidth: 4,classed: 'dashed'},
                              {area: false,values: result.P,key: "LPA",color: "#039be5",strokeWidth: 4,classed: 'dashed'},
                              {area: false,values: result.A,key: "LPA",color: "#dce775 ",strokeWidth: 4,classed: 'dashed'}
                             ];*/
                
                addGraph('chartContainer','Number of beetles','Time',dataLPA);
                
                
            },
            error: function (request, status, errorThrown) {
                var error = JSON.parse(request.responseText);
                console.log(error);
                alert(error[0].message);
                
            }
        });

    });
    
    $("#more").click(function () {
        var startTime = parseFloat($("#startTime").val());
        var endTime = parseFloat($("#endTime").val());
        var calStartTime = endTime;
        var calEndTime = (endTime - startTime) + endTime;
        $("#startTime").val(calStartTime);
        $("#endTime").val(calEndTime);
        $("#stimulate").trigger('click');
    });
});

function addGraph(id,xAxisLabel, yAxisLabel, graphData)
{
    nv.addGraph(function () {
        chart = nv.models.lineChart()
            .options({
                duration: 300,
                useInteractiveGuideline: true,
                showLegend: true,       //Show the legend, allowing users to turn on/off line series.
                showYAxis:true,        //Show the y-axis
                showXAxis:true/*,
                forceY: [0],
                forceX: [0],*/
            });

        chart.xAxis
            .axisLabel("Time")
            .tickFormat(d3.format('1f'))
            .staggerLabels(true);

        chart.yAxis
            .axisLabel('Number of beetles')
            .tickFormat(function (d) {
                if (d == null) {
                    return 'N/A';
                }
                return d3.format('1f')(d);
            });

        data = graphData;

        d3.select('#'+id).append('svg')
            .datum(data)
            .call(chart)/*.style({ 'height': "300px" })*/;

        nv.utils.windowResize(chart.update);

        return chart;
    });
}

function clearGraph(){
    d3.selectAll(".nvd3-svg").remove();
}