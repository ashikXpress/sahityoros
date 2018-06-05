<div class="col-md-3 col-sm-3 order-item-1">
    <div class="adds-side-bar">
        @foreach($leftAdds as $leftAdds)
            @if($leftAdds->adds_links==null)
                <div class="single-adds">
                    <img src="{{asset($leftAdds->adds_image)}}" alt="not found">
                </div>
            @else
                <div class="single-adds">
                    <a href="{{$leftAdds->adds_links}}" target="_blank"><img src="{{asset($leftAdds->adds_image)}}" alt="not found"></a>
                </div>

            @endif

        @endforeach

    </div>
</div>
