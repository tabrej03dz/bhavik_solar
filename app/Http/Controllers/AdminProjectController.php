<?php
namespace App\Http\Controllers;
use App\Models\SolarProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class AdminProjectController extends Controller {
    public function index(Request $request) {
        $query = SolarProject::query();
        if ($request->filled('search')) $query->where('title','like','%'.$request->input('search').'%');
        return view('admin.solar.index', ['items'=>$query->orderBy('sort_order')->latest('id')->paginate(15)->withQueryString(), 'type'=>"projects"]);
    }
    public function create() { return view('admin.solar.form',['item'=>new SolarProject(), 'type'=>"projects"]); }
    public function store(Request $request) { $data=$this->validated($request); if ($request->hasFile('image')) $data['image']=$request->file('image')->store('solar/projects','public'); $data['slug']=$this->uniqueSlug($data['title']); SolarProject::create($data); return redirect()->route('admin.projects.index')->with('success','Added successfully'); }
    public function edit(SolarProject $item) { return view('admin.solar.form',compact('item')+['type'=>"projects"]); }
    public function update(Request $request, SolarProject $item) {
        $data=$this->validated($request);
        if ($request->hasFile('image')) { if($item->image) Storage::disk('public')->delete($item->image); $data['image']=$request->file('image')->store('solar/projects','public'); }
        if($request->boolean('remove_image') && !$request->hasFile('image')) { if($item->image) Storage::disk('public')->delete($item->image); $data['image']=null; }
        if ($item->title !== $data['title']) $data['slug']=$this->uniqueSlug($data['title'],$item->id);
        $item->update($data); return redirect()->route('admin.projects.index')->with('success','Updated successfully');
    }
    public function destroy(SolarProject $item) { if($item->image) Storage::disk('public')->delete($item->image); $item->delete(); return back()->with('success','Deleted successfully'); }
    private function validated(Request $request): array { return $request->validate([
        'title'=>'required|string|max:255','short_description'=>'nullable|string|max:500', 'description'=>'nullable|string',
        'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'sort_order'=>'nullable|integer|min:0', 'location'=>'nullable|string|max:255', 'capacity'=>'nullable|string|max:255', 'completed_at'=>'nullable|date',
    ])+['is_active'=>$request->boolean('is_active'),'is_featured'=>$request->boolean('is_featured')]; }
    private function uniqueSlug(string $title, ?int $exceptId=null): string {
        $base=Str::slug($title) ?: 'solar-item'; $slug=$base; $i=2;
        while(SolarProject::where('slug',$slug)->when($exceptId,fn($q)=>$q->where('id','!=',$exceptId))->exists()) $slug=$base.'-'.$i++;
        return $slug;
    }
}
