$(document).ready(function(){
    $("#calculate").click(function(){
        
        var time = $("#time").val();
        alert(time);

        $.ajax({
            type: "POST",
            url: base_url+"index.php/dashboard/calculateLPA?time="+time,
            data: "",
            success: function(result){
                
                $chartProp = prepareChart('L',"silver","silver","theme2",true);
                var chartL = new CanvasJS.Chart("chartContainerL", {
                $chartProp,
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "L",
                        markerType: "circle",
                        color: "#F08080",
                        dataPoints: result.L
                    }
                ]
            });
            
            $chartProp = prepareChart('P',"silver","silver","theme2",true);
            var chartP = new CanvasJS.Chart("chartContainerP", {
                $chartProp,
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "L",
                        markerType: "circle",
                        color: "#F08080",
                        dataPoints: result.P
                    }
                ]
            });
                
            $chartProp = prepareChart('A',"silver","silver","theme2",true);
            var chartA = new CanvasJS.Chart("chartContainerA", {
                $chartProp,
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "L",
                        markerType: "circle",
                        color: "#F08080",
                        dataPoints: result.A
                    }
                ]
            });
            
            $chartProp = prepareChart('LPA',"silver","silver","theme2",true);
            var chart = new CanvasJS.Chart("chartContainer", {
                $chartProp,
                data: [
                    {
                        type: "line",
                        showInLegend: true,
                        lineThickness: 2,
                        name: "L",
                        markerType: "circle",
                        color: "#F08080",
                        dataPoints: result.L
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "P",
                        color: "#20B2AA",
                        lineThickness: 2,
                        dataPoints: result.P
                    },
                    {
                        type: "line",
                        showInLegend: true,
                        name: "A",
                        color: "#337ab7",
                        lineThickness: 2,
                        dataPoints: result.A
                    }
                ]
            });
            
            chartL.render();
                
            chartP.render();
                
            chartA.render();
                
            chart.render();
                
            },
            error: function(request,status,errorThrown) {
                var error = JSON.parse(request.responseText);
                console.log(error);
                alert(error[0].message);
            }
         });
        
    });
    
}); 

function prepareChart(title, gridColor, tickColor, theme = "theme2", isAnimation = true){
    
    var chartProperties = [];
    chartProperties.theme = theme;
    chartProperties.zoomEnabled = true;
    chartProperties.animationEnabled = isAnimation;
    chartProperties.title = {text: title,fontSize: 25};
    chartProperties.axisX = {gridColor: gridColor,tickColor: tickColor};
    chartProperties.axisY = {gridColor: gridColor,tickColor: tickColor};
    chartProperties.legend = {verticalAlign: "center",horizontalAlign: "right"};
    return chartProperties;
}