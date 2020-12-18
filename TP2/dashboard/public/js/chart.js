export default class ChartBuild{
    constructor(id,data,name, label) {
        this.id = id;
        this.data = data;
        this.name = name;
        this.label = label;
        this.limits();
        this.xAxis="";
        this.yAxis="";
    }
    /*Determina os limites dos graficos*/
    limits() {
        var keys = Object.keys(this.data);
        var min = this.data[keys[0]]; // ignoring case of empty list for conciseness
        var max = this.data[keys[0]];
        var i;

        for (i = 1; i < keys.length; i++) {
            var value = this.data[keys[i]];
            if (value < min) min = value;
            if (value > max) max = value;
        }
    /*Margem para se ver melhor*/
        this.yMin = parseInt(min) - Math.round(parseInt(min)/4);
        if(this.yMin <= 0)
            this.yMin=0;
        this.yMax = parseInt(max) + Math.round(parseInt(max)/4);


    }
    /*Coloca o texto nos eixos X e Y*/
    labelTextAxis(xAxis, yAxis){
        this.xAxis = xAxis;
        this.yAxis = yAxis;
    }

    execute(){
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#292b2c';

        // Area Chart Example
        var ctx = document.getElementById(this.id);
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: this.label,
                datasets: [{
                    label: this.name,
                    lineTension: 0.3,
                    backgroundColor: "rgba(2,117,216,0.2)",
                    borderColor: "rgba(2,117,216,1)",
                    pointRadius: 5,
                    pointBackgroundColor: "rgba(2,117,216,1)",
                    pointBorderColor: "rgba(255,255,255,0.8)",
                    pointHoverRadius: 5,
                    pointHoverBackgroundColor: "rgba(2,117,216,1)",
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
                }
            }
        });

    }

}

