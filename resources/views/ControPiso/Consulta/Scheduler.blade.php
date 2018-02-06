<!doctype html>
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8">
  <title>Programacion de Produccion</title>

  <script src='dhtmlxScheduler/dhtmlxscheduler.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_limit.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_collision.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_timeline.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_editors.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_minical.js'></script>
  <script src='dhtmlxScheduler/ext/dhtmlxscheduler_tooltip.js'></script>
  

  <link rel='stylesheet' href='dhtmlxScheduler/dhtmlxscheduler_flat.css'>
  <link rel='stylesheet' href='css/styles.css'>
 
  <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style>



</head>

<body>



<div id="scheduler_here" class="dhx_cal_container" style="width:100%; height:100%;">
    <div class="dhx_cal_navline">
          <div class="dhx_cal_prev_button">&nbsp;</div>
          <div class="dhx_cal_next_button">&nbsp;</div>
          <div class="dhx_cal_today_button"></div>
          <div class="dhx_cal_date"></div>
          <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
          <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
          <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
          <div class="dhx_cal_tab" name="timeline_tab" style="right:280px;"></div>
          <select id="room_filter" onchange='showRooms(this.value)'></select>  
    </div>
  <div class="dhx_cal_header"></div>
  <div class="dhx_cal_data"></div>
</div>
<script>
  
scheduler.locale.labels.timeline_tab = "Timeline";
scheduler.locale.labels.section_custom="Section";
scheduler.config.details_on_create=true;
scheduler.config.details_on_dblclick=true;
scheduler.config.xml_date="%Y-%m-%d %H:%i";

//===============
//Configuration

//===============

var list = scheduler.serverList("sections").slice();



scheduler.createTimelineView({
  name: "timeline",
  x_unit: "minute",
  x_date: "%H:%i",
  x_step: 60,
  x_size: 24,
 // x_start: 16,
  x_length: 48,
  // y_unit:[
  //      {key:503, label:"James Smith"},
  //      {key:2, label:"John Williams"},
  //      {key:3, label:"David Miller"},
  //      {key:4, label:"Linda Brown"}
  //  ],

 y_unit:sections,
  y_property: "type_id",
  render:"bar"
});



scheduler.init('scheduler_here');
scheduler.load("scheduler/data" ,"json");

 
</script>

</body>