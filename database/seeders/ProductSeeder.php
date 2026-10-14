<?php
namespace Database\Seeders;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder {
 public function run(): void {
  $items=[
   ['Solar PV Panels','Solar Panels'],['Monocrystalline Solar Panels','Solar Panels'],['Bifacial Solar Modules','Solar Panels'],
   ['On-Grid Solar Inverter','Solar Inverters'],['Off-Grid Solar Inverter','Solar Inverters'],['Hybrid Solar Inverter','Solar Inverters'],
   ['Residential Rooftop Solar System','Rooftop Solar'],['Commercial Rooftop Solar System','Rooftop Solar'],
   ['Solar Water Pump','Solar Pumps'],['Solar Street Light','Solar Lighting'],['Solar Home Lighting System','Solar Lighting'],
   ['Solar Battery Storage','Energy Storage'],['Ground Mounted Solar System','Solar EPC']
  ];
  foreach($items as $i=>$item) Product::updateOrCreate(['name'=>$item[0]],['slug'=>Str::slug($item[0]),'category'=>$item[1],'short_description'=>$item[0].' for clean and efficient solar energy solutions.','description'=>$item[0].' from Bhavik Solar. Contact us for specifications and quotation.','stock'=>0,'is_active'=>true,'is_featured'=>false,'sort_order'=>$i+1]);
 }
}
