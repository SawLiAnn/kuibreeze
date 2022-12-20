<?php
    
namespace App\Http\Controllers;
    
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:project-list', ['only' => ['index']]);
         $this->middleware('permission:project-create', ['only' => ['create','store']]);
         $this->middleware('permission:project-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:project-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Project::orderBy('id','ASC')->paginate(5);
        $user =User::all();
        return view('projects.index',['projects'=>$project, 'users'=>$user])
            ->with('i', (request()->input('page', 1) - 1) * 5);
        // return view('projects.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $project = new Project;
        // $project = Project::all();
        return view('projects.create', compact(['users', 'project']));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'project_type' => 'required',
            'project_name' => 'required',
            'student'      => 'required',
            'supervisor'   => 'required|different:examiner1|different:examiner2',
            'examiner1'    => 'required|different:examiner2',
            'examiner2'    => 'required',
        ]);

        Project::create($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project created successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    // public function show(Project $project)
    // {
    //     return view('projects.show',compact('project'));
    // }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $users = User::all();
        return view('projects.edit',compact(['users', 'project']));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        if(Auth::user()->hasRole('FYP Coordinator')){
        request()->validate([
            'project_type' => 'required',
            'project_name' => 'required',
            'student'      => 'required',
            'supervisor'   => 'required|different:examiner1|different:examiner2',
            'examiner1'    => 'required|different:examiner2',
            'examiner2'    => 'required',
        ]);
        }elseif(Auth::user()->hasRole('Lecturer') && Auth::id()==$project->supervisor){
        request()->validate([
            'start_date'   => 'required|date',
            'end_date'     => 'required|date|after_or_equal:start_date',
            'duration'     => 'required',
            'project_progress'    => 'required',
            'project_status'      => 'required',
        ]);
        }  
        $project->update($request->all());
    
        return redirect()->route('projects.index')
                        ->with('success','Project updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::find($id)->delete();
        return redirect()->route('projects.index')
                        ->with('success','Project deleted successfully');
    }
}