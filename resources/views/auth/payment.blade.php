@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-xs-12 text-center">
            <h2>Payment Options</h2>
        </div>
    </div>
    <div class="row">

        <div class="col-xs-offset-2  col-xs-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">Check</div>
                <div class="panel-body text-justify">
                    <div class="col-xs-offset-1 col-xs-10" style="margin-bottom: 10px;">
                        On the memo line of your check, please enter your WiSport ID. It should be visible to the right of your name
                        in the navigation bar at the top of the site.
                    </div>

                    <div class="col-xs-offset-1 col-xs-10" style="margin-bottom: 10px;">
                        Make your check out to WiSport Cycling for $35 per non-junior member (junior membership is free).
                    </div>

                    <div class="col-xs-offset-1 col-xs-10">
                        Mail your check to: <br/>
                        WiSport Cycling c/o Ryan Blennert
                        1138 N. 17th St.
                        Manitowoc, WI 54220
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">PayPal</div>
                <div class="panel-body">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top" class="form-horizontal" role="form">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="2NQKTQFKW6FJE">
                        <div class="form-group">
                            <div class="col-xs-offset-5 col-xs-2 text-center">
                                <input type="hidden" name="currency_code" value="USD">
                                <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_SM.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                                <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xs-4 text-center">
            <div class="panel panel-default">
                <div class="panel-heading">Juniors</div>
                <div class="panel-body">
                    Congratulations! You're done!
                </div>
            </div>
        </div>
    </div>
@endsection