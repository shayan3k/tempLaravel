function randValue() {
    return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
}

// data for chart comes from variables in the initializing page                
var yearlyPageviews = yearlyPageViewsChartData;
var yearlyVisitors = yearlyVisitorsChartData;
// alert(yearlyPageviews)
var plot = $.plot($("#yearly-chart"), [{
            data: yearlyPageviews,
            label: "کل بازدیدها"
        }, {
            data: yearlyVisitors,
            label: "بازدید کنندگان یکتا"
        }
    ], {
        series: {
            lines: {
                show: true,
                lineWidth: 2,
                fill: true,
                fillColor: {
                    colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.01
                        }
                    ]
                }
            },
            points: {
                show: true
            },
            shadowSize: 2
        },
        grid: {
            hoverable: true,
            clickable: true,
            tickColor: "#eee",
            borderWidth: 0
        },
        colors: ["#d12610", "#37b7f3", "#52e136"],
        xaxis: {
            mode: "categories",
            tickLength: 0,
        },
        yaxis: {
            ticks: 11,
            tickDecimals: 0
        }
    });


function showTooltip(x, y, contents) {
    $('<div id="tooltip">' + contents + '</div>').css({
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 15,
            border: '1px solid #333',
            padding: '4px',
            color: '#fff',
            'border-radius': '3px',
            'background-color': '#333',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
}

var previousPoint = null;
$("#yearly-chart").bind("plothover", function (event, pos, item) {
    $("#x").text(pos.x.toFixed(2));
    $("#y").text(pos.y.toFixed(2));

    if (item) {
        if (previousPoint != item.dataIndex) {
            previousPoint = item.dataIndex;

            $("#tooltip").remove();
            // var x = item.datapoint[0].toFixed(2),
            var x = item.series.data[item.dataIndex][0],
                y = item.datapoint[1];
                //y = item.datapoint[1].toFixed(2); .toFixed determines the decimals of y in tooltip

            showTooltip(item.pageX, item.pageY, item.series.label + " در ماه " + x + " = " + y + " نفر ");
        }
    } else {
        $("#tooltip").remove();
        previousPoint = null;
    }
});
