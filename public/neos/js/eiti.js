$(document).ready(function(){
    $.getJSON("/mining-atlas/index.php?r=site/geteiti", function(map_data){
        $('#africa').highcharts('Map', {
            title : {
                text : ''
            },
             legend: {
                enabled: false
            },
            credits:{
                 enabled: false
            },
            colorAxis: {

                        dataClasses: [{
                            from: 0,
                            to: 0,
                            color: '#4ecef5',
                            name: 'No Status'
                        }, {
                            from: 1,
                            to: 1,
                            color: '#27aae2',
                            name: 'Suspended'
                        },{
                            from: 2,
                            to: 2,
                            color: '#1c74bb',
                            name: 'Candidate'
                        },
                        {
                            from: 3,
                            to: 3,
                            color: '#293990',
                            name: 'Compliant'
                        }]
            },
            tooltip: {
                formatter: function () {
                    var major_minerals = this.point.NoneFuelMinerals.split(', '); 
                   // console.log(major_minerals);
                    var text ="";
                    for(i = 0; i < major_minerals.length; i++ ){
                        text += "<br/>" + major_minerals[i] ;
                    }
                    console.log('Mining Legislation Status: ' + '</br>' +text);
                    return '<div>' + 
                        'MAJOR MINERALS ' + '</br>' +text + '</div>'; 
                },
                backgroundColor: '#3b2316',
                style: {
                    color: '#ffffff',
                }
            },
            /*
            tooltip: {
                formatter: function () {
                    return '<b>EITI Status: ' + this.point.EitiStatus + '</b><br>' +
                        'Dependency: ' + this.point.Dependency + '<br>' +
                        'Mining Legislation Status: ' + this.point.legist;
                }
            },
            */

            series : [{
                data : map_data,
                mapData: Highcharts.maps['custom/africa'],
                joinBy: 'iso-a2',
                name: 'Anual Car Production',
                borderWidth: '2px',
                borderColor: '#736e6b',
                point: {
                    events: {
                        click: function() {
                            location.href = this.options.url;
                        }
                    }
                },
                states: {
                    hover: {
                        color: '#BADA55'
                    }
                }
            }]
        });
    });
});