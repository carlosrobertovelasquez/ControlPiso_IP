<!DOCTYPE html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
 
    
 
    <script src="dhtmlxGantt/codebase/dhtmlxgantt.js"></script>
    <link href="dhtmlxGantt/codebase/dhtmlxgantt.css" rel="stylesheet">


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
<div id="gantt_here" style='width:100%; height:100%;'></div>
<script type="text/javascript">
    gantt.config.xml_date = "%Y-%m-%d %H:%i:%s"
    gantt.init("gantt_here");
    gantt.load("gantt/data");

</script>
</body>