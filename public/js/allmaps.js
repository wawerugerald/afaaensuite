$(document).ready(function(){

  var generate_tooltips = function () {
    var major_minerals = this.point.NoneFuelMinerals.split(', ');
    // console.log(major_minerals);
    var text ="";
    for(i = 0; i < major_minerals.length; i++ ){
      text += "<br/>" + major_minerals[i] ;
    }
    var dep = this.point.Dependency;
    var eiti = this.point.Eiti2016;
    //alert(this.point.trans);

    if(this.point.lang=='French'){
      var mintype=" ";
      switch (eiti) {
        case 6:
        case 5:
        case 4:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Suspendu</b></td></tr>';
          break;
        case 3:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Des progrès significatifs</b></td></tr>';
          break;
        case 2:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Progrès satisfaisants</b></td></tr>';
          break;
        case 1:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Encore à évaluer par rapport à la norme de 2016</b></td></tr>';
          break;
        default:
          color = '<tr><td>EITI: </td>' +
          '<td><b>Aucun Statut</b></td></tr>';
          break;

      }

      if (dep == 1) {
        depend = '<tr><td>Dependance: </td>' +
        '<td><b>Faible</b></td></tr>';
      }else if (dep == 2) {
        depend = '<tr><td >Dependance: </td>' +
        '<td> <b>Moyen </b></td></tr>';
      }else if (dep == 0) {
        depend = '<tr><td >Dependance: </td>' +
        '<td> <b>En attente </b></td></tr>';
      }else{
        depend = '<tr><td >Dependance: </td>' +
        '<td> <b>Elevé</b> </td></tr>';
      };

    }else if(this.point.lang=='Portuguese'){
      var mintype=" ";
      switch (eiti) {
        case 6:
        case 5:
        case 4:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Suspenso</b></td></tr>';
          break;
        case 3:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Progresso significativo</b></td></tr>';
          break;
        case 2:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Progresso satisfatório</b></td></tr>';
          break;
        case 1:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Ainda a ser avaliado em relação a 2016 Standard</b></td></tr>';
          break;
        default:
          color = '<tr><td>ITIE: </td>' +
          '<td><b>Sem estatuto</b></td></tr>';
          break;

      }


      if (dep == 1) {
        depend = '<tr><td>Dependência: </td>' +
        '<td><b>Baixa</b></td></tr>';
      }else if (dep == 2) {
        depend = '<tr><td >Dependência: </td>' +
        '<td> <b>Média </b></td></tr>';
      }else if (dep == 0) {
        depend = '<tr><td >Dependência: </td>' +
        '<td> <b> Pendente </b></td></tr>';
      }else{
        depend = '<tr><td >Dependência: </td>' +
        '<td> <b>Alta</b> </td></tr>';
      };
    }else{
      var mintype=" ";
      // switch (eiti) {
      //   // case 6:
      //   // case 5:
      //   // case 4:
      //   //   color = '<tr><td>EITI: </td>' +
      //   //   '<td><b>Suspended</b></td></tr>';
      //   //   break;
      //   // case 3:
      //   //   color = '<tr><td>EITI: </td>' +
      //   //   '<td><b>Meaningful progress</b></td></tr>';
      //   //   break;
      //   // case 2:
      //   //   color = '<tr><td>EITI: </td>' +
      //   //   '<td><b>Satisfactory progress</b></td></tr>';
      //   //   break;
      //   // case 1:
      //   //   color = '<tr><td>EITI: </td>' +
      //   //   '<td><b>Yet to be assessed against 2016 Standard</b></td></tr>';
      //   //   break;
      //   // default:
      //   //   color = '<tr><td>EITI: </td>' +
      //   //   '<td><b>No Status</b></td></tr>';
      //   //   break;
      //
      // }
    }

    return '<div>' + '<span>' + this.point.CommonName  +'</span>' +'<br/>' +
      depend + '<br/> ' + ' ' +'</div>';
  };


  $.getJSON("/site/getdata?t="+(new Date()).getTime(), function(map_data){
    $.ajaxSetup({ cache: false });
    // alert('new lang');
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

      tooltip: {
        formatter: generate_tooltips,
        backgroundColor: '#006600',
        style: {
          color: '#ffffff',
        }
      },
      series : [{
        data : map_data,
        mapData: Highcharts.maps['custom/africa'],
        joinBy: 'iso-a2',
        name: '',
        borderWidth: '2px',
        borderColor: '#717171',
        color: '#ffffff',
        point: {
          events: {
            click: function() {
              var urli= this.options.url;
              if($.url('?l')){
                var l="&l_ajax="+ $.url('?l');
              }
              location.href = urli + l;
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

  $.getJSON("/site/getdependency", function(map_data){
    $( "#dep_hover" )
    .hover(function() {

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

          dataClasses: [
            {
              from: 0,
              to: 0,
              color: '#fff',
              name: 'Pending'
            },
            {
            from: 1,
            to: 1,
            color: '#0fd4cb',
            name: 'Low'
          },{
            from: 2,
            to: 2,
            color: '#D7DD3C',
            name: 'Medium'
          },
          {
            from: 3,
            to: 3,
            color: '#28D4CA',
            name: 'High'
          }]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 3,
            color: '#ffffff',
            name: 'Low'
          }]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/geteiti", function(map_data){
    $( "#eiti_hover" )
    .hover(function() {
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
            color: '#fff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#27AAE1',
            name: 'Pending'
          },{
            from: 2,
            to: 2,
            color: '#6933E9',
            name: 'NYC'
          },
          {
            from: 3,
            to: 3,
            color: '#32ABDF',
            name: 'ICSID'
          },
          {
            from: 4,
            to: 4,
            color: '#2C3C8E',
            name: 'OHADA'
          }]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#ffffff',
          style: {
            color: '#ffffff',
          }
        },

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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 6,
            color: '#ffffff',
            name: 'No Status'
          }, ]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/CEN_SAD", function(map_data){
    $( "#cen_sad" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/COMESA", function(map_data){
    $( "#comesa" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },

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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/EAC", function(map_data){
    $( "#eac" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/ECCAS", function(map_data){
    $( "#eccas" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },

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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/ECOWAS", function(map_data){
    $( "#ecowas" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },
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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/IGAD", function(map_data){
    $( "#igad" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/UMA", function(map_data){
    console.log(map_data[0]);
    $( "#uma" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/SADC", function(map_data){
    $( "#sadc" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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

  $.getJSON("/site/getregion/region/SADC", function(map_data){
    $( "#sadc" )
    .hover(function() {
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
            color: '#ffffff',
            name: 'No Status'
          }, {
            from: 1,
            to: 1,
            color: '#8DC73F',
            name: 'Suspended'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },


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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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
    },
    function() {
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
            to: 1,
            color: '#ffffff',
            name: 'No Status'
          },]
        },
        tooltip: {
          formatter: generate_tooltips,
          backgroundColor: '#3b2316',
          style: {
            color: '#ffffff',
          }
        },

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
                var urli= this.options.url;
                if($.url('?l')){
                  var l="&l_ajax="+ $.url('?l');
                }
                location.href = urli + l;
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


});
