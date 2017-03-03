<?php
namespace App\Http\Controllers\Menu;


use App\Library;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Menu;


class MenuCRUDController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)

    {

        $menus = Menu::orderBy('menu', 'ASC')->get();
        return view('menu.menuCRUD.index', compact('menus'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()

    {

        return view('menu.menuCRUD.create');

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
            'menu' => 'required'
        ]);


        Menu::create($request->all());

        return redirect()->route('menuCRUD.index')
            ->with('success', 'Menu created successfully');

    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {

        $menu = Menu::find($id);

        return view('menu.menuCRUD.show', compact('menu'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)

    {

        $menu = Menu::find($id);

        return view('menu.menuCRUD.edit', compact('menu'));

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

            'menu' => 'required'

        ]);
        $active = Library::checkBoxValidator($request->get('active'));
        $request->merge(array('active' =>$active));

        Menu::find($id)->update($request->all());

        return redirect()->route('menuCRUD.index')
            ->with('success', 'Menu updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        Menu::find($id)->delete();

        return redirect()->route('menuCRUD.index')
            ->with('success', 'Menu deleted successfully');
    }
}

?>