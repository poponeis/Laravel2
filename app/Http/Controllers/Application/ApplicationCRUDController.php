<?php
namespace App\Http\Controllers\Application;


use App\Library;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Application;
use App\Menu;


class ApplicationCRUDController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)

    {

        $applications = Application::orderBy('application', 'ASC')->get();
        return view('application.applicationCRUD.index', compact('applications'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {
        $menus = Menu::where('active', 1)->orderBy('menu')->pluck('menu', 'id');
        return view('application.applicationCRUD.create',compact('menus',$menus));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)

    {

        $this->validate($request, [
            'application' => 'required',
            'menu_id' => 'required'
        ]);
        $menu  = Menu::find($request->get('menu_id'));
        $menu->applications()->save(Application::create($request->all()));

        return redirect()->route('applicationCRUD.index')
            ->with('success', 'Application created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $application = Application::find($id);
        $menus = Menu::where('active', 1)->orderBy('menu')->pluck('menu', 'id');
        return view('application.applicationCRUD.show', compact('application','menus'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {

        $application = Application::find($id);
        $menus = Menu::where('active', 1)->orderBy('menu')->pluck('menu', 'id');

        return view('application.applicationCRUD.edit', compact('application','menus'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)

    {

        $this->validate($request, [

            'application' => 'required'

        ]);
        $active = Library::checkBoxValidator($request->get('active'));
        $request->merge(array('active' =>$active));
        $menu = Menu::find($request->get('menu_id'));
        Application::find($id)->menu()->associate($menu)->update($request->all());

        return redirect()->route('applicationCRUD.index')
            ->with('success', 'Application updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Application::find($id)->delete();

        return redirect()->route('applicationCRUD.index')
            ->with('success', 'Application deleted successfully');
    }
}

?>