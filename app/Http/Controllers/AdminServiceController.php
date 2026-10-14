<?php
namespace App\Http\Controllers;
use App\Models\SolarService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
class AdminServiceController extends Controller {
    public function index(Request $request) {
        $query = SolarService::query();
        if ($request->filled('search')) $query->where('title','like','%'.$request->input('search').'%');
        return view('admin.solar.index', ['items'=>$query->orderBy('sort_order')->latest('id')->paginate(15)->withQueryString(), 'type'=>"services"]);
    }
    public function create() { return view('admin.solar.form',['item'=>new SolarService(), 'type'=>"services"]); }
    public function store(Request $request) { $data=$this->validated($request); if ($request->hasFile('image')) $data['image']=$request->file('image')->store('solar/services','public'); $data['slug']=$this->uniqueSlug($data['title']); SolarService::create($data); return redirect()->route('admin.services.index')->with('success','Added successfully'); }
    public function edit(SolarService $item) { return view('admin.solar.form',compact('item')+['type'=>"services"]); }
    public function update(Request $request, SolarService $item) {
        $data=$this->validated($request);
        if ($request->hasFile('image')) { if($item->image) Storage::disk('public')->delete($item->image); $data['image']=$request->file('image')->store('solar/services','public'); }
        if($request->boolean('remove_image') && !$request->hasFile('image')) { if($item->image) Storage::disk('public')->delete($item->image); $data['image']=null; }
        if ($item->title !== $data['title']) $data['slug']=$this->uniqueSlug($data['title'],$item->id);
        $item->update($data); return redirect()->route('admin.services.index')->with('success','Updated successfully');
    }
    public function destroy(SolarService $item) { if($item->image) Storage::disk('public')->delete($item->image); $item->delete(); return back()->with('success','Deleted successfully'); }
    private function validated(Request $request): array { return $request->validate([
        'title'=>'required|string|max:255','short_description'=>'nullable|string|max:500', 'description'=>'nullable|string',
        'image'=>'nullable|image|mimes:jpg,jpeg,png,webp|max:5120',
        'sort_order'=>'nullable|integer|min:0', 
    ])+['is_active'=>$request->boolean('is_active'),'is_featured'=>$request->boolean('is_featured')]; }
    private function uniqueSlug(string $title, ?int $exceptId=null): string {
        $base=Str::slug($title) ?: 'solar-item'; $slug=$base; $i=2;
        while(SolarService::where('slug',$slug)->when($exceptId,fn($q)=>$q->where('id','!=',$exceptId))->exists()) $slug=$base.'-'.$i++;
        return $slug;
    }
}
