@extends('layouts.master')

@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <div class="container" style="margin-top: 20px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Renew Your Membership</div>
                    <?php if(isset($errors)&& count($errors)>0){
                            echo '<h4 style="color:red; margin-left: 15px;">'.$errors.'</h4>';
                    }

                    ?>
                    <div class="panel-body">
                        {!! Form::model( $wisportRacer, ['action'    => ['WisportRacersController@renew'],
                                                    'method'    => 'POST',
                                                    'class'    => 'form-horizontal',
                                                    'role'     => 'form'
                        ]) !!}
                            {{ csrf_field() }}
                            <input name="wisport_id" id="wisport_id" value="{{$wisportRacer->wisport_racer_id}}" type="hidden">
                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">First Name</label>

                                <div class="col-md-6">
                                    <input id="first->name" type="text" class="form-control" name="first_name" value="{{ $wisportRacer->first_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="last_name" class="col-md-4 control-label">Last Name</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $wisportRacer->last_name }}" disabled>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                                <div class="col-md-6">
                                    <input id="dob" type="text" class="form-control" name="dob" value="{{ $wisportRacer->dob }}" disabled>
                                </div>
                            </div>


                            <div class="form-group">
                                <label for="gender" class="col-md-4 control-label">Gender</label>

                                <div class="col-md-6">
                                    {{ Form::select('gender', ['M' => 'Male', 'F' => 'Female'], $wisportRacer->gender, ['class' => 'form-control', 'name' => 'gender', 'id' => 'gender', 'disabled']) }}

                                </div>
                            </div>


                            <div class="form-group">
                                <label for="team_id" class="col-md-4 control-label">Team</label>

                                <div class="col-md-6">
                                    <select id="team_id"  class="form-control" name="team_id">
                                        <?php
                                            $teams = \App\App\Models\Team::OrderBy('teamName')->get();
                                            echo '<option value="1">Unattached</option>';
                                        foreach($teams as $team)
                                            {
                                                echo '<option value="'.$team['id'].'" '.(($team['id']==$wisportRacer->team_id) ? "selected" : "").'>'.$team['teamName'].'</option>';
                                            }


                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div  class="col-md-4 control-label"></div>
                                {{ Form::label('waiver','By Joining WiSport Citizen Cycling I hereby waive and dismiss all claims for damage
                                    and personal injury I may incur before, during, and/or after any events. I hereby release WiSport
                                    members, events, their staff and representatives, all sponsors, medical personnel, race officials,
                                    and volunteers from any liability',array('id'=>'waiver','class'=>'col-md-7')) }}
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Renew
                                    </button>
                                </div>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection