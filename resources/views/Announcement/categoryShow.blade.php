<x-layout title="{{$category->name}}" header="{{__('ui.categoryShow')}}  {{$category->name}}">

    <div class="container py-2">
        <div class="row justify-content-center carda">
            
                @forelse ($category->announcements->where('is_accepted', true)->sortByDesc('created_at') as $announcement)
                    <div data-aos="fade-down" data-aos-delay="{{100*$loop->index}}" class="col-10 col-md-3 my-5 ">
                        <div class="card glass">
                            <img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrl(300,200) : 'https://picsum.photos/300/200'}}" class="card-img-top" alt="...">
                            
                            <div class="card-body">
                              <h5 class="card-title">{{$announcement->title}}</h5>
                              <p class="card-title fw-bold">{{$announcement->category->name}}</p>
                              <p class="card-text">{{$announcement->price}} €</p>
                              <a href="{{route('announcement.show',compact('announcement'))}}" class="mb-1 btn btn-primary d-block">{{__('ui.indexDetails')}}</a>
                              <p class="card-footer">{{__('ui.indexDate')}}{{$announcement->created_at->format('d/m/Y')}} {{__('ui.from')}}<a class="btn"  href="{{route('announcement.profile',compact('announcement'))}}">{{$announcement->user->name ?? ''}}</a> </p>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="col-12 d-flex flex-column my-5 align-items-center">
                            <h2 class="text-center text-white display-3 fw-bold">{{__('ui.noAnnouncementWelcome')}}</h2>
                            <a href="{{route('announcement.create')}}" class="btn btnCategory text-white my-5">{{__('ui.publishWelcome')}}</a>
                        </div>
                    @endforelse

            
        </div>
    </div>

</x-layout>