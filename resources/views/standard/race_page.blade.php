@extends('layouts.master')
@section('header')
    <h2 style="border-bottom: 2px solid #000;">Greenwood Dairy Days Road Race</h2>
@stop
@section('content')
    <div class="container">
        <h5>When: Saturday, June 25th, 2016 -- 10:00 am </h5>

        <h5>Where: <a href="https://www.google.com/?ion=1&espv=2#q=greenwood%20wi%20park&rflfq=1&rlha=0&rllag=44673852,-90729713,15582&tbm=lcl&tbs=lf:1,lf_ui:1&oll=44.75403183797438,-90.59226719999998&ospn=0.5178434676930976,1.1810302734375&oz=10&fll=44.764514536019746,-90.58677403593748&fspn=0.2588747742291275,0.59051513671875&fz=11&qop=1&rlfi=hd:;si:" target="_blank">Greenwood, WI</a></h5>
        <h5>Race Flyer: <a href='http://wisportcycling.org/public/flyers/greenwood_2016.pdf" target="_blank"="target=&quot;_blank&quot;'>Click Here</a></h5>
        <h5>Course Map: <a href="http://www.mapmyride.com/us/neillsville-wi/greenwood-dairy-days-38-race-route-19532726" target="_blank">Click Here to Download</a></h5>
        <br>
        <br>
        <iframe id="mapmyfitness_route" src="//snippets.mapmycdn.com/routes/view/embedded/19532726?width=600&height=400&elevation=true&info=true&line_color=E60f0bdb&rgbhex=DB0B0E&distance_markers=0&unit_type=imperial&map_mode=ROADMAP&last_updated=2011-12-28T16:02:25-06:00&show_marker_every=3" height="570px" width="100%" frameborder="0"></iframe>

        <div class="col-xs-3" id="race_pics_container" style="padding-top: 30px;">
        </div>
    </div>
    <?php
    $results = #\App\Models\EventResult::where('race_id',201601)
            #     ->where('wisport_id',NULL)->get();
            DB::select( DB::raw("SELECT * FROM processed_overall where wisport_id IS NULL"));
    #var_dump($results);
            $rider_id_count = 'nwr0001';
        foreach($results as $rider)
        {
            echo $rider_id_count.'<br/>';
            $update = DB::select( DB::raw("UPDATE processed_overall set  wisport_id ='$rider_id_count' where proc_id = '$rider->proc_id'"));
            $rider_id_count++;
        }

    ?>
@stop