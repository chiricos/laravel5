<?php namespace laravel5\Http\Controllers\Admin;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use laravel5\Http\Requests;
use laravel5\Http\Controllers\Controller;
use laravel5\Http\Requests\CreateUserRequest;
use laravel5\User;

class UsersController extends Controller {

   /* protected $request;

    public function __construct(Request $request)
    {
        $this->request=$request;
    }
*/
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users=User::paginate(15);
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
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\EditUserRequest $request,$id)
	{

        $user=User::find($id);
        $user->fill($request->all());
       $user->save();
        return Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

        Session::flash('message','el registro fue eliminado');
        return Redirect::route('admin.users.index');
	}

}
