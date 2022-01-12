$( document ).ready(function() {

    const commonChart = Highcharts.chart('charts', {
                chart: {
                    zoomType: 'x'
                },
                title: {
                    text: 'Курс USD к RUB'
                },
                subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Кликните и перетащите область графика, чтобы увеличить' : 'Сожмите диаграмму, чтобы увеличить'
                },
                xAxis: {
                    type: 'datetime'
                },
                yAxis: {
                    title: {
                        text: 'Курс '
                    }
                },
                legend: {
                    enabled: false
                },
                plotOptions: {
                    area: {
                        fillColor: {
                            linearGradient: {
                                x1: 0,
                                y1: 0,
                                x2: 0,
                                y2: 1
                            },
                            stops: [
                                [0, Highcharts.getOptions().colors[0]],
                                [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                            ]
                        },
                        marker: {
                            radius: 2
                        },
                        lineWidth: 1,
                        states: {
                            hover: {
                                lineWidth: 1
                            }
                        },
                        threshold: null
                    }
                },
                series: [{
                    type: 'area',
                    name: 'USD к RUB',
                    data: [[1607714092000,73.71],[1607800492000,73.12],[1608059692000,72.93],[1608146092000,73.45],[1608232492000,73.42],[1608318892000,72.98],[1608405292000,73.32]]
                }]
            });


    //Datepicker init
    let modalDp = new AirDatepicker('.datepicker-here', {
        minDate:[new Date('07.01.1992')],
        maxDate:[new Date()],
        range:true,
        multipleDatesSeparator: ' - ',
        onSelect: function() {
            $('#updateCharts').find('input[name="date-range"]').siblings('.error').removeClass('active');
        }
    })

    //form updateCharts on submit
    $(document).on('submit','#updateCharts',function(event){
        event.preventDefault();
        //Отправка
        let data = new FormData(),
            form = $(this),
            rangeInput = form.find('input[name="date-range"]'),
            rangeArr = rangeInput.val().split(' - ');


        if (rangeArr[0] === undefined || rangeArr[1] === undefined) {
            rangeInput.siblings('.error').addClass('active');
            return;
        }

        data.append('header', 'getJson');
        data.append('date_req1', rangeArr[0]);
        data.append('date_req2', rangeArr[1]);

        $.ajax({
            type: 'POST',
            url: 'getjson.php',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function (r) {
                
                commonChart.update({
                    series: [{
                        type: 'area',
                        name: 'USD to RUB',
                        data: JSON.parse(r)
                    }]
                })


            },
            error: function (r) {
                console.log(r);
            }
        });
    });
});