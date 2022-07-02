<?php
namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Post;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    //

    public function index()
    {
         //$posts = Post::paginate(3);
         $posts = Post::latest()->paginate(3);
        //$hello = 'hello from darija coding';
        return  view('home')->with([

           // 'hello' => $hello,
            //'name' => $name
             'posts' => $posts
        ]);
    }
   public function show($slug)
   {
      $post = Post::where('slug',$slug)->first();
      return view('show')->with([
       
        'post' => $post
      
    ]);

   }
   public function create()
   {
       return view('create');
   }
   //public function store(Request $request)
   public function store(PostRequest $request)
   {
     //  $this->validate($request,[
         //  'title' =>'required|min:3|max:100',
           //'body' =>'required|min:3|max:1000',
       //]);
       if ($request->has('image')){
        $file = $request->image;
        $image_name = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads'), $image_name);

       }
       Post::create([
           'title' =>  $request->title,
           'body' =>  $request->body,
           'slug' => Str::slug($request->title),
          'image' => $image_name
       ]);
       return Redirect()->route('home')->with([
            'sucess'=>'article ajouter avec success'
       ]);

      // echo'article ajouter';
       //dd($request->title);
     //$post = new Post();
     //$post->title = $request->title;
     //$post->slug = Str::slug($request->title);
     //$post->body = $request->body;
     //$post->image = "https://via.placeholder.com/640x480.png/000055?text=new post";
     //$post->save();
   }
     
   public function edit($slug)
   {
    $post = Post::where('slug',$slug)->first();
      return view('edit')->with([
       
        'post' => $post
      
    ]);


   }
public function update(PostRequest $request,$slug)
{
$post = Post::where('slug',$slug)->first();
if ($request->has('image')){
  $file = $request->image;
  $image_name = time() . '_' . $file->getClientOriginalName();
  $file->move(public_path('uploads'), $image_name);
  unlink(public_path('uploads/') . $post->image);//supprimmer photo recent 
  $post->image =$image_name;
 }
$post->update([
  'title' =>  $request->title,
  'body' =>  $request->body,
  'slug' => Str::slug($request->title),
  'image' => $post->image
]);
return redirect()->route('home')->with([
  'sucess'=>'article modefié'
]);
}
public function delete($slug)
{
$post = Post::where('slug',$slug)->first();
unlink(public_path('uploads/') . $post->image);
$post->delete();
return redirect()->route('home')->with([
'sucess' =>'article supprimer'
]);

}
}
