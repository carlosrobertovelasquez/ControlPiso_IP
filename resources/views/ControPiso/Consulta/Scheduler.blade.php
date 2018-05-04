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
 
  



</head>

<body>



<div id="scheduler_here" class="dhx_cal_container" style="width:96%; height:96%;">
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
  x_size: 25,
  x_start: 00,
  x_length: 12,
   y_unit:[
        {key:1, label:"501"},
        {key:2, label:"557"},
        {key:3, label:"555"},
        {key:4, label:"558"}
    ],

 //y_unit:sections,
  y_property: "type_id",
  render:"bar",
  //days:7,
 // event_dy: 48,
  //  section_autoheight: false,
   // round_position: true,
});



scheduler.init('scheduler_here');
scheduler.load("scheduler/data" ,"json");

 
</script>

</body>