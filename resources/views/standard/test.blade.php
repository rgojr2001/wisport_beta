<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">Laravel 5</div>
    </div>
    <?php
        $race_test = \App\Models\Race::where('id',201601)->get()->first();
        #var_dump($race_test);
        #echo $race_test->results();
        foreach($race_test->results as $result)
        {
            echo $result;
        }

        /*foreach($schedule->races as $event)
        {
            echo $event->name.' - ';
            echo $event->date.'<br/><br/>';
        }*/
    ?>

</div>
</body>
</html>