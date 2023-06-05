<x-layout title="Il tuo profilo: {{Auth::user()->name}}" header="{{__('ui.userProfile')}} {{Auth::user()->name}}">
    @if (session()->has('message'))
       <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
     @endif
    
    <div class="container py-5">
        <div class="row justify-content-center">
                <h2 class="text-white text-center">{{__('ui.userAnnounce')}}</h2>
                @forelse (Auth::user()->announcements->where('is_accepted', true) as $announcement)
                <div data-aos="fade-down" data-aos-delay="{{100*$loop->index}}" class="col-10 col-md-3 my-5">
                    <div class="card glass">
                        <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,200) : 'https://picsum.photos/300/200'}}" class="card-img-top" alt="...">
                        
                        <div class="card-body">
                          <h5 class="card-title">{{$announcement->title}}</h5>
                          <p class="card-text">{{$announcement->price}} €</p>
                          <a href="{{route('announcement.show',compact('announcement'))}}" class="btn btn-primary d-block">{{__('ui.indexDetails')}}</a>
                          <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-1 btn btn-primary btnCategory d-block">{{__('ui.indexCategory')}} {{$announcement->category->name}}</a>
                          <p class="card-footer">{{__('ui.indexDate')}}{{$announcement->created_at->format('d/m/Y')}}</p>
                          
                                        
                                        <form action="{{ROUTE('announcement.destroy',compact('announcement'))}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn">{{__('ui.canc')}}</button>
                                        </form>
                                    
                        </div>
                    </div>
                </div>
                @empty
                    <div  class="col-12 my-5 d-flex flex-column align-items-center">
                        <h2 class="text-center text-white display-3 fw-bold">{{__('ui.usernoAnnounce')}}</h2>
                    </div>
                @endforelse
                    <div  class="col-12 my-5 d-flex flex-column align-items-center">               
                        <a href="{{route('announcement.create')}}" class="btn btnCategory text-white my-5">{{__('ui.indexPublish')}}</a>
                    </div> 
                    <h2 class="text-white text-center">{{__('ui.userWaitOrReject')}}</h2>
                    @forelse (Auth::user()->announcements->where('is_accepted',!1) as $announcement)
                    <div data-aos="fade-down" data-aos-delay="{{100*$loop->index}}" class="col-10 col-md-3 my-5">
                        <div class="card glass">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,200) : 'https://picsum.photos/300/200'}}" class="card-img-top" alt="...">
                            
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                              <p class="card-text">{{$announcement->price}} €</p>
                              <a href="{{route('categoryShow',['category'=>$announcement->category])}}" class="my-1 btn btn-primary btnCategory d-block">{{__('ui.indexCategory')}} {{__('ui.categories'. $announcement->category->id)}}</a>
                              <p class="card-footer">@if (is_numeric($announcement->is_accepted)){{__('ui.userReject')}} @else {{__('ui.userWait')}} @endif </p>
                              <form action="{{ROUTE('announcement.destroy',compact('announcement'))}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn">{{__('ui.canc')}}</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 my-5 d-flex flex-column align-items-center">
                            <h2 class="text-center text-white display-3 fw-bold">{{__('ui.usernoWaitOrReject')}}</h2>
                        </div>
                    @endforelse    
                    
        </div>
    </div>
</x-layout>