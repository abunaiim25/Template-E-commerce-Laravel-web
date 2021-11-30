<div class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All Category</span>
    </div>

    @php
           $categories = App\Models\Category::where('status',1)->latest()->get();
       @endphp
    <ul>
    
        @foreach ($categories as $row)
        <li><a href="{{url('category/product-show/'.$row->id)}}">{{$row->category_name}}</a></li>
        @endforeach
       
      
    </ul>
</div>
