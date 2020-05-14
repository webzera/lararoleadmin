<?php

namespace Webzera\Lararoleadmin\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Webzera\Lararoleadmin\Page;
use Webzera\Lararoleadmin\Menulist;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('checkrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allpages=Page::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.page.index')->with('allpages', $allpages);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'page_title'=> ['required', 'unique:pages'],
            'page_content'=> 'required',

            'menu_name'=> 'required',
            'parent_id' => 'required',
        ]);

        $pages = new Page;
          if ($request->feature_image) {
            $image = $request->file('feature_image');
            $slug = Str::of($request->menu_name)->slug('-');
            $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/pagefeaimage');
            // $destinationPath = '/home/megha/public_html/storage/slider';
            $imagePath = $destinationPath. "/".  $name;
            if(!$image->move($destinationPath, $name))
            {
              echo "file not upload"; die();
            }
            $pages->feature_image = $name;
          }

           $pages->page_title=$request->input('page_title');
           $slug = Str::of($request->page_title)->slug('-');
           $pages->slug=$slug;
           $pages->page_content=$request->input('page_content');
           $pages->page_excerpt=$request->input('page_excerpt');
           $pages->page_type='page';
           $pages->page_status='publish';
           $pages->comment_status='close';
           // $pages->feature_image=$name;
           $pages->save();

           $lastid=$pages->id;
           $menulist = new Menulist;

           $menulist->page_id=$lastid;
           $menulist->menu_name=$request->input('menu_name');
           $menulist->menu_type='Top';
           $menulist->parent_id=$request->input('parent_id');
           $menulist->menu_weight=$request->input('menu_weight');
           if($request->input('parent_id')==0)
           $menulist->menu_level='1';
           else
           $menulist->menu_level='2';
           $menulist->save();

           flash('New Page created with menu list');
           return redirect('/admin/page')->with('success', 'New Page created with menu list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        $menulist = Menulist::where('page_id', $id)->first();
        return view('admin.page.edit')->with([
            'page' => $page,
            'menulist' => $menulist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'page_title'=> 'required',
            'page_content'=> 'required',

            'menu_name'=> 'required',
            'parent_id' => 'required',
        ]);

         $pages = Page::findOrFail($id);
          if ($request->feature_image) {
            $image = $request->file('feature_image');
            $slug = Str::of($request->menu_name)->slug('-');
            $name = uniqid().'-'.$slug.'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/pagefeaimage');
            // $destinationPath = '/home/megha/public_html/storage/slider';
            $imagePath = $destinationPath. "/".  $name;
            if(!$image->move($destinationPath, $name))
            {
              echo "file not upload"; die();
            }
            $pages->feature_image = $name;
          }

           $pages->page_title=$request->input('page_title');
           $slug = Str::of($request->page_title)->slug('-');
           $pages->slug=$slug;
           $pages->page_content=$request->input('page_content');
           $pages->page_excerpt=$request->input('page_excerpt');
           $pages->page_type='page';
           $pages->page_status='publish';
           $pages->comment_status='close';
           // $pages->feature_image=$name;
           $pages->save();

           // $lastid=$pages->id;
           // $menulist = new Menulist;
           $menulist = Menulist::where('page_id', $id)->first();

           // $menulist->page_id=$lastid;
           $menulist->menu_name=$request->input('menu_name');
           $menulist->menu_type='Top';
           $menulist->parent_id=$request->input('parent_id');
           $menulist->menu_weight=$request->input('menu_weight');
           if($request->input('parent_id')==0)
           $menulist->menu_level='1';
           else
           $menulist->menu_level='2';
           $menulist->save();

           flash('New Page created with menu list');
           return redirect('/admin/page')->with('success', 'New Page created with menu list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
