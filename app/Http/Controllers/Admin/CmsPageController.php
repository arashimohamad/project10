<?php

namespace App\Http\Controllers\Admin;

use App\Models\CmsPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CmsPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Session::put('page','cms-pages');

        $CmsPages = CmsPage::get();                       // Option 1 will call data on blade {{$page->title}}
        //$CmsPages = CmsPage::get()->toArray();          // Option 2 will call data on blade {{$page['title']}}
        
        return view('admin.pages.cms_pages', compact('CmsPages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CmsPage $cmsPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id=null)            // id = null sbb data tiada lagi
    {   //Add dan Edit buat kat sini
        Session::put('page','cms-pages');

        if ($id =="") {
            $title = "Add CMS Page";
            $cmspage = new CmsPage;                             //add process
            $message = "CMS Page added successfully";

        } else {
            $title = "Edit CMS Page";
            $cmspage = CmsPage::find($id);                     //edit process
            $message = "CMS Page updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();
            
            //CMS Pages Validation
            $rules = [
                'title'         =>  'required',
                'url'           =>  'required',
                'description'   =>  'required',
            ];

            $customMessages = [
                'title.required'        =>  'Page Title is required',
                'url.required'          =>  'Page URL is required',
                'description.required'  =>  'Page Description is required',
            ];

            $this->validate($request, $rules, $customMessages);

            //add process
            $cmspage->title            = $data['title'];
            $cmspage->url              = $data['url'];
            $cmspage->description      = $data['description'];
            $cmspage->meta_title       = $data['metatitle'];
            $cmspage->meta_description = $data['metadesc'];
            $cmspage->meta_keywords    = $data['metakey'];
            $cmspage->status           = 1;
            $cmspage->save();

            return redirect('admin/cms-pages')->with('success_message', $message);

        }

        return view('admin.pages.add_edit_cmspage', compact('title', 'cmspage'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CmsPage $cmsPage)              //update status
    {        
        //echo "AAAA"; die;
        if ($request->ajax()) {
            $data = $request->all();
            //dd($data);
            //echo "<pre>"; print_r($data); die;

            if ($data['status']=="Active") {
                $status = 0;    // Initial value is 1 (active) that set direct to database b4 and displayed as an active.  after user click to inactive, this toggle button will change to 0 value
            } else {
                $status = 1;    
            }
            
            CmsPage::where('id', $data['page_id'])->update([
                'status' => $status,
            ]);

            return response()->json(['status'=>$status, 'page_id'=>$data['page_id']]);

        } 
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cmspage = CmsPage::findOrFail($id)->delete();
        return redirect()->back()->with('success_message', 'CMS Page deleted successfully');   
    }
}


/*
    Laravel 10 Tutorial #16 - Laravel 10 CRUD Operations - Manage CMS _ Dynamic Pages (I) - Create Table
    1. create model + migration - [php artisan make:model CmsPage -m]
    2. create table name for cms_page
    3. migrate cms_page- [php artisan migrate]
    4. create CmsPageTableSeeder - [php artisan make:seeder CmsPageTableSeeder]
    5. insert all data into CmsPageTableSeeder.php
    6. open DabatabseSeeder.php and type [$this->call(CmsPageTableSeeder::class);]
    7. run php artisan db:seed

    Laravel 10 Tutorial #17 - Laravel CRUD - Manage CMS Dynamic Pages (II) - Create Resource Controller
    1. create controller and tag with model - [php artisan make:controller Admin/CmsPageController --resource --model=CmsPage]
    2. perform CRUD process
    3. we used 1 blade file to run both create + edit data activities

    Laravel 10 Tutorial #20 - CRUD Operations - CMS _ Dynamic Pages (V) - Add CMS Page Functionality
    1. go to config>database.php [change 'strict' => true, to false]
    2. go to config>app.php ['timezone' => 'UTC' to 'timezone' => 'Asia/Kuala_Lumpur']

    Laravel 10 Tutorial #23 - Make Admin Panel in Laravel 10 - Integrate SweetAlert2 jQuery Alert
    1. you can open this link to see the sweetalert code [https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js]
    2. Copy, paste and save it sweetalert js to the local folder [public\admin\plugins\sweetalert2ver11.7.5]
    3. attach script sweetalert2 to the layout

*/