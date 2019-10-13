$(document).ready(function() {

    /* Make some random data for Flot Line Chart*/

    var data1 = [
        [1, 60],
        [2, 30],
        [3, 50],
        [4, 100],
        [5, 10],
        [6, 90],
        [7, 85]
    ];
    var data2 = [
        [1, 70],
        [2, 60],
        [3, 90],
        [4, 120],
        [5, 100],
        [6, 40],
        [7, 65]
    ];
    /* Create an Array push the data + Draw the bars*/

    var barData = new Array();

    barData.push({
        data: data1,
        label: 'Incoming Messages',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 1,
            lineWidth: 0,
            fillColor: '#8BC34A'
        }
    });

    barData.push({
        data: data2,
        label: 'Replies',
        bars: {
            show: true,
            barWidth: 0.08,
            order: 2,
            lineWidth: 0,
            fillColor: '#00BCD4'
        }
    });

    /* Let's create the chart */
    if ($('#bar-chart')[0]) {
        $.plot($("#bar-chart"), barData, {
            grid: {
                borderWidth: 1,
                borderColor: '#eee',
                show: true,
                hoverable: true,
                clickable: true
            },

            yaxis: {
                tickColor: '#eee',
                tickDecimals: 0,
                font: {
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f",
                },
                shadowSize: 0
            },

            xaxis: {
                tickColor: '#fff',
                tickDecimals: 0,
                font: {
                    lineHeight: 13,
                    style: "normal",
                    color: "#9f9f9f"
                },
                shadowSize: 0,
            },

            legend: {
                container: '.flc-bar',
                backgroundOpacity: 0.5,
                noColumns: 0,
                backgroundColor: "white",
                lineWidth: 0
            }
        });
    }

    /* Tooltips for Flot Charts */

    if ($(".flot-chart")[0]) {
        $(".flot-chart").bind("plothover", function(event, pos, item) {
            if (item) {
                var x = item.datapoint[0].toFixed(2),
                    y = item.datapoint[1].toFixed(2);
                $(".flot-tooltip").html(item.series.label + " of " + x + " = " + y).css({ top: item.pageY + 5, left: item.pageX + 5 }).show();
            } else {
                $(".flot-tooltip").hide();
            }
        });

        $("<div class='flot-tooltip' class='chart-tooltip'></div>").appendTo("body");
    }
});