<?php namespace laravel5\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use laravel5\Http\Controllers\Controller;
use laravel5\Http\Requests\CreateUserRequest;
use laravel5\Http\Requests\EditUserRequest;
use laravel5\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

   protected $request;

    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request=$request;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$users=User::name($request->get('name'))->type($request->get('type'))->paginate(15);
        return view('admin.users.index',compact('users'));
        dd($users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{

        //$this->validate($request,$rules);
        User::create($request->all());
        //return redirect()->route('admin.user.index');
        //return \Redirect::route('admin.users.index');
        return Redirect::route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
        $user=User::findOrFail($id);
		return view('admin.users.edit',compact('user'));
	}

    /**
     * Update the specified resource in storage.
     *
     * @param EditUserRequest $request
     * @param  int $id
     * @return Response
     */
	public function update(EditUserRequest $request,$id)
	{

        $user=User::find($id);
        $user->fill($request->all());
       $user->save();
        return Redirect::back();
	}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param Request|Request $request
     * @return Response
     */
	public function destroy($id, \Illuminate\Http\Request $request)
	{
        $user=User::find($id);
        $user->delete();
        $message=$user->full_name. 'fue eliminado de nuestros registros';
        if($request->ajax())
        {
            return response()->json([
                'id'         => $user->id,
                'message'    => $message
            ]);
        }


        Session::flash('message',$message);
        return Redirect::route('admin.users.index');
	}



}
