@if(Auth::user()->hasRole('FYP Coordinator')|| Auth::id()==$project->supervisor)

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Type:</strong>

            <select name="project_type" class="form-control" required @if(Auth::id()==$project->supervisor) disabled
                @endif>
                @if(old('project_type')==null && $project->project_type==null)
                <option value="" selected disabled>Choose Option</option>
                <option value="1">Development Project</option>
                <option value="2">Research Project</option>
                @else
                <option value="1" @if(old('project_type')==$project->project_type || $project->project_type == 1)
                    selected @endif>Development Project</option>
                <option value="2" @if(old('project_type')==$project->project_type || $project->project_type == 2)
                    selected @endif>Research Project</option>
                @endif
            </select>

            @if(Auth::id()==$project->supervisor)
            <select name="project_type" class="form-control" required hidden>
                @if(old('project_type')==null && $project->project_type==null)
                <option value="" selected disabled>Choose Option</option>
                <option value="1">Development Project</option>
                <option value="2">Research Project</option>
                @else
                <option value="1" @if(old('project_type')==$project->project_type || $project->project_type == 1)
                    selected @endif>Development Project</option>
                <option value="2" @if(old('project_type')==$project->project_type || $project->project_type == 2)
                    selected @endif>Research Project</option>
                @endif
            </select>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Name:</strong>
            <input type="text" name="project_name" class="form-control" placeholder="Name" required
                @if(Auth::id()==$project->supervisor)
            readonly
            @endif
            value="{{old('project_name', $project->project_name)}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Student:</strong>
            <select name="student" class="form-control" required @if(Auth::id()==$project->supervisor) disabled @endif>
                @if(old('student')==null && $project->student==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Student'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('student')==$user->id || $user->id==$project->student) selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

            @if(Auth::id()==$project->supervisor)
            <select name="student" class="form-control" required hidden>
                @if(old('student')==null && $project->student==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Student'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('student')==$user->id || $user->id==$project->student) selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Supervisor:</strong>
            <select name="supervisor" class="form-control" required @if(Auth::id()==$project->supervisor) disabled
                @endif>
                @if(old('supervisor')==null && $project->supervisor==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('supervisor')==$user->id || $user->id==$project->supervisor)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

            @if(Auth::id()==$project->supervisor)
            <select name="supervisor" class="form-control" required hidden>
                @if(old('supervisor')==null && $project->supervisor==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('supervisor')==$user->id || $user->id==$project->supervisor)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Examiner 1:</strong>
            <select name="examiner1" class="form-control" required @if(Auth::id()==$project->supervisor) disabled
                @endif>
                @if(old('examiner1')==null && $project->examiner1==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner1')==$user->id || $user->id==$project->examiner1)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

            @if(Auth::id()==$project->supervisor)
            <select name="examiner1" class="form-control" required hidden>
                @if(old('examiner1')==null && $project->examiner1==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner1')==$user->id || $user->id==$project->examiner1)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Examiner 2:</strong>
            <select name="examiner2" class="form-control" required @if(Auth::id()==$project->supervisor) disabled
                @endif>
                @if(old('examiner2')==null && $project->examiner2==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner2')==$user->id || $user->id==$project->examiner2)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>

            @if(Auth::id()==$project->supervisor)
            <select name="examiner2" class="form-control" required hidden>
                @if(old('examiner2')==null && $project->examiner2==null)
                <option value="" selected="true" disabled="disabled">Choose Option</option>
                @foreach($users as $user)
                @if($user->hasRole('Lecturer'))
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endif
                @endforeach
                @else
                @foreach($users as $user)
                <option value="{{ $user->id }}" @if(old('examiner2')==$user->id || $user->id==$project->examiner2)
                    selected
                    @endif>{{ $user->name }}
                </option>
                @endforeach
                @endif
            </select>
            @endif

        </div>
    </div>
    @endif


    @if(Auth::id()==$project->supervisor)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Start Date:</strong><br>
            <input type="date" name="start_date" value="{{old('start_date', $project->start_date)}}" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>End Date:</strong><br>
            <input type="date" name="end_date" value="{{old('end_date', $project->end_date)}}" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Duration:</strong>
            <input type="number" name="duration" class="form-control" placeholder="Duration"
                value="{{old('duration', $project->duration)}}" required>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Progress:</strong>
            <select name="project_progress" class="form-control" required>
                @if(old('project_progress')==null && $project->project_progress==null)
                <option value="" selected disabled>Choose Option</option>
                <option value="1" @if($project->project_progress == 1) selected @endif>Milestone 1</option>
                <option value="2" @if($project->project_progress == 2) selected @endif>Milestone 2</option>
                <option value="3" @if($project->project_progress == 3) selected @endif>Final Report</option>
                @else
                <option value="1" @if(old('project_progress')==$project->project_progress || $project->project_progress
                    == 1)
                    selected @endif>Milestone 1</option>
                <option value="2" @if(old('project_progress')==$project->project_progress || $project->project_progress
                    == 1)
                    selected @endif>Milestone 2</option>
                <option value="3" @if(old('project_progress')==$project->project_progress || $project->project_progress
                    == 1)
                    selected @endif>Final Report</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Project Status:</strong>
            <select name="project_status" class="form-control" required>
                @if(old('project_status')==null && $project->project_status==null)
                <option value="" selected disabled>Choose Option</option>
                <option value="1" @if($project->project_status == 1) selected @endif>On Track</option>
                <option value="2" @if($project->project_status == 2) selected @endif>Delayed</option>
                <option value="3" @if($project->project_status == 3) selected @endif>Extended</option>
                <option value="4" @if($project->project_status == 4) selected @endif>Completed</option>
                @else
                <option value="1" @if(old('project_status')==$project->project_status || $project->project_status == 1)
                    selected @endif>On Track</option>
                <option value="2" @if(old('project_status')==$project->project_status || $project->project_status == 2)
                    selected @endif>Delayed</option>
                <option value="3" @if(old('project_status')==$project->project_status || $project->project_status == 3)
                    selected @endif>
                <option value="3" @if($project->project_status == 3) selected @endif>Extended</option>
                </option>
                <option value="4" @if(old('project_status')==$project->project_status || $project->project_status == 4)
                    selected @endif>Completed</option>
                @endif
            </select>
        </div>
    </div>

    @endif
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <x-button type="submit" variant="primary" size="base">Submit</x-button>
    </div>
    <div style="display:inline-block">&nbsp</div> <!-- There is a white-space here -->
</div>