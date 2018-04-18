$(document).ready(function(){
    $("#calculate").click(function(){
        
        var time = $("#time").val();
        alert(time);

        $.ajax({
            type: "POST",
            url: base_url+"index.php/dashboard/calculateL?time="+time,
            data: "",
            success: function(result){
                var chart = new CanvasJS.Chart("chartContainerL", {
                theme: "theme2",
                zoomEnabled: true,
                animationEnabled: true,
                title: {
					text: "L-stage vs Time and P-stage vs Time",
					fontSize: 30
				},
                axisX: {
					gridColor: "Silver",
					tickColor: "silver",
					
				},
				toolTip: {
					shared: true
				},
				axisY: {
					gridColor: "Silver",	
					tickColor: "silver"
				},
				legend: {
					verticalAlign: "center",
					horizontalAlign: "right"
				},
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
            chart.render();
                
                console.log(result);
            },
            error: function(request,status,errorThrown) {
                var error = JSON.parse(request.responseText);
                console.log(error);
                alert(error[0].message);
            }
         });
        
    });
    
}); 