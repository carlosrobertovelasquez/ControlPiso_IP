<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
 
    
 
    <script src="dhtmlxGantt/codebase/dhtmlxgantt.js"></script>
    <link href="dhtmlxGantt/codebase/dhtmlxgantt.css" rel="stylesheet">


   <style type="text/css">
    
</style>
</head>
<body>


<div class="box-body">
 <div class="col-xs-2">
                    <select   id="id_clave" name="id_clave" class="form-control select2" style="width:25%;">
                                       <option value="0">SELECIONES CENTRO COSTO:</option>
                                 
                                      
                    </select>
                </div>   
</div>            

<div id="gantt_here" style='width:1400px; height:600px;'></div>

<script type="text/javascript">
gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";
gantt.config.sort = true;
gantt.config.work_time = true;
    gantt.setWorkTime({hours : [0, 24]});//global working hours. 8:00-12:00, 13:00-17:00

    gantt.config.scale_unit = "day";
    gantt.config.date_scale = "%l, %F %d";
    gantt.config.min_column_width = 20;
    gantt.config.duration_unit = "hour";
    gantt.config.scale_height = 20*3;

    gantt.templates.task_cell_class = function(task, date){
        var css = [];

        if(date.getHours() == 7){
            css.push("day_start");
        }
        if(date.getHours() == 16){
            css.push("day_end");
        }
        if(!gantt.isWorkTime(date, 'day')){
            css.push("week_end");
        }else if(!gantt.isWorkTime(date, 'hour')){
            css.push("no_work_hour");
        }

        return css.join(" ");
    };



    var weekScaleTemplate = function(date){
        var dateToStr = gantt.date.date_to_str("%d %M");
        var weekNum = gantt.date.date_to_str("(week %W)");
        var endDate = gantt.date.add(gantt.date.add(date, 1, "week"), -1, "day");
        return dateToStr(date) + " - " + dateToStr(endDate) + " " + weekNum(date);
    };

    gantt.config.subscales = [
        {unit:"week", step:1, template:weekScaleTemplate},
        {unit:"hour", step:1, date:"%G"}

    ];


    function showAll(){
        gantt.ignore_time = null;
        gantt.render();
    }
    function hideWeekEnds(){
        gantt.ignore_time = function(date){
            return !gantt.isWorkTime(date, "day");
        };
        gantt.render();
    }
    function hideNotWorkingTime(){
        gantt.ignore_time = function(date){
            return !gantt.isWorkTime(date);
        };
        gantt.render();
    }    












    gantt.init("gantt_here");
    gantt.load("gantt/data");

</script>
</body>