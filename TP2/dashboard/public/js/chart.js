/**
 * Chart Class
 * @author- Fábio and Fernando
 * */
class ChartBuild{
    /**
     * @param- graph-> 0:line chart; 1: pie chart; 2:bar chart
     * @param- id-> id of the graph
     * @param- data-> data for the graph
     * @param- name-> name for the graph
     * @param- label-> label for the graph
     * */
    constructor(graph, id,data,name, label) {
        this.graph = graph;
        this.id = id;
        this.data = data;
        this.name = name;
        this.label = label;
        this.limits();
        this.xAxis="";
        this.yAxis="";
        if(this.graph==1){
            this.colorsPie();
        }
    }
    /*Generate the limits of the graph*/
    limits() {
        var keys = Object.keys(this.data);
        var min = parseInt(this.data[keys[0]]); // ignoring case of empty list for conciseness
        var max = parseInt(this.data[keys[0]]);
        var i;
        for (i = 1; i < keys.length; i++) {
            var value = parseInt(this.data[keys[i]]);
            if (value < min) min = value;
            if (value > max) max = value;
        }
        this.yMin =min - Math.round(min/4);
        if(this.yMin <= 0)
            this.yMin=0;
        this.yMax = max + Math.round(max/4);

    }
    /*Put the text in the axis */
    labelTextAxis(xAxis, yAxis){
        this.xAxis = xAxis;
        this.yAxis = yAxis;

    }
    /*Create an array of colors*/
    colorsPie() {
        this.colorArray=["#CA6A63", "#A4C2C5", "#CE808E", "#C8D3A8", "#200E62", "#469343", "#6C1EE1", "#5de35e", "#ec9576", "#fa173a", "#6c7160", "#bc0d79", "#8fbab4", "#1d61d6", "#656234", "#2d04df", "#d16881", "#f9b799", "#595875", "#35644e"];
    }

    execute(){
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';
        // Area Chart Example


        var ctx = document.getElementById(this.id);

        if(this.graph==0){
         this.myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: this.label,
                datasets: [{
                    label: this.name,
                    lineTension: 0.3,
                    backgroundColor: "rgba(69,123,157,0.2)",
                    borderColor: "rgba(69,123,157,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(230,57,70,0.7)",
                    pointHitRadius: 50,
                    pointBorderWidth: 2,
                    data: this.data ,
                }],
            },
            options: {
                animation: {
                    easing: 'linear',
                    duration: 1500
                },
                scales: {
                    xAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: this.xAxis
                        },
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: true
                        },
                        ticks: {
                            maxTicksLimit: 15
                        }
                    }],
                    yAxes: [{
                        scaleLabel: {
                            display: true,
                            labelString: this.yAxis
                        },
                        ticks: {
                            min: this.yMin,
                            max: this.yMax,
                            maxTicksLimit: 5
                        },
                        gridLines: {
                            color: "rgba(0, 0, 0, .125)",
                        }
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    enabled: true,
                    callbacks: {
                        label: function(tooltipItem, data) {
                            var label = data.datasets[tooltipItem.datasetIndex].label;
                            var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                            return label + ' : ' + val + '€';
                        }
                    }
                }
            }
        });
    }
        else if(this.graph==1){
            this.myChart  = new Chart(ctx, {
                type: 'pie',
                data: {
                  labels: this.label,
                  datasets: [{
                    data: this.data,
                    backgroundColor: this.colorArray,
                  }],
                },
              });
        }
        else if(this.graph==2){
            this.myChart  = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: this.label,
                    datasets: [{
                        label: this.name,
                        backgroundColor: "rgba(69,123,157,0.8)",
                        borderColor: "rgba(69,123,157,0.8)",
                        data: this.data,
                    }],
                },
                options: {
                    scaleShowValues: true,
                    scales: {
                        xAxes: [{
                            ticks: {
                                autoSkip: false,
                            },
                            scaleLabel: {
                                display: true,
                                labelString: this.xAxis
                            },
                            gridLines: {
                                display: false
                            },

                        }],
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: this.yAxis
                            },
                            ticks: {
                                min: this.yMin,
                                max: this.yMax,
                                maxTicksLimit: 5
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        enabled: true,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var label = data.datasets[tooltipItem.datasetIndex].label;
                                var val = data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                                return label + ' : ' + val + '€';
                            }
                        }
                    }
                }
            });
        }
        this.myChart.clear()
    }




}

