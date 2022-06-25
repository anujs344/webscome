<?php

namespace App\Http\Controllers\Api;

use App\Models\Blog;
use App\Models\Category;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only(['create','store','update','edit','destroy']);
        $this->middleware('team_member')->only(['index','show']);
//        $this->middleware('admin');
    }

    public function index()
    {
        $blogs= Blog::all();
        $blogs= Blog::orderBy('id','desc')->paginate(6);

        return view('admin.blogs.index')->with('blogs',$blogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories= Category::all();
        return view('admin.blogs.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'cover_image'=>'image|nullable|max:1999',//2mb
        ]);

        //Handle cover_image
        if($request->hasFile('cover_image'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path= $request->file('cover_image')->move('blog_images',$FileNameToStore);
        }else{
            $FileNameToStore="noimage.jpg";
        }


        //create category
        $blog =new Blog();
        $blog->title= $request->input('title');
        $blog->category_id=$request->input('category');
        $blog->content= $request->input('content');
        $blog->user_id = auth()->user()->id;
        $blog->cover_image= $FileNameToStore;


        $blog->save();

        return redirect('/blogs')->with('success','Blog created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blogs= Blog::join('categories','blogs.category_id','=','categories.id')->get(['blogs.*','categories.title AS cat_title','categories.id AS cat_id']);

        foreach ($blogs as $blog_s) {
            if ($blog_s->id==$id) {
                $blog=$blog_s;
            }
        }
        return response()->json($blog, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog= Blog::find($id);
        return response()->json($blog, 200);
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
        $this->validate($request,[
            'title'=>'required',
            'content'=>'required',
            'cover_image'=>'image|nullable|max:1999',//2mb
        ]);

        //Handle cover_image
        if($request->hasFile('cover_image'))
        {
            //Get filename with ext
            $FileNameWidExt=$request->file('cover_image')->getClientOriginalName();
            //Get just filename
            $filename=pathinfo($FileNameWidExt, PATHINFO_FILENAME);
            //Get just extension
            $extension=$request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $FileNameToStore= $filename.'_'.time().'.'. $extension;
            //Upload image
            $path=$request->file('cover_image')->move('blog_images',$FileNameToStore);
        }


        //create category
        $blog =Blog::find($id);
        $blog->title= $request->input('title');
        $blog->content= $request->input('content');

        if($request->hasFile('cover_image'))
        {
            $blog->cover_image= $FileNameToStore;
        }
        $blog->save();
        return response()->json(['success' => 'Blog Updated'], 200, $headers);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog =Blog::find($id);

        if($blog->cover_image !='noimage.jpg')
        {
            $path = public_path()."/blog_images/".$blog->cover_image;
            unlink($path);
        }
        $blog->delete();
        return response()->json(['success' => 'Blog Removed'], 200, $headers);
    }
}
