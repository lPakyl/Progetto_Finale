<x-layout title="Revisiona annunci" header="">
    @if (session()->has('message'))
       <div class="alert alert-success text-center">
            {{session('message')}}
        </div>
     @endif
    <div class="div container p-5 mb-4">
        <div class="row">
            <div class="col-12 text-light p-5">
                <h1 class=" display-2 text-center text-white">
                    {{-- {{$announcement_to_check ? '{{__("ui.revisor")}}' : '{{__("ui.noRev")}}'}} --}}
                    @if($announcement_to_check) {{__('ui.revisor')}}  @else {{__('ui.noRev')}} @endif
                </h1>
            </div>
        </div>
    </div>
    @if($announcement_to_check)
    <div data-aos="fade-down" class="container">
        <div class="row justify-content-center">
    {{-- @forelse ($announcement_to_check as $announcement) --}}
        <div class="col-12 col-md-6 my-3">
            <div class="card glass">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        @if(!$announcement_to_check->images->isEmpty())
                        <div class="carousel-inner">
                          @foreach($announcement_to_check->images as $image)
                          <div class="carousel-item lui  @if($loop->first) active @endif">
                          <div class="d-flex align-items-center h-100 justify-content-center"><img src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrlwater('logo') : 'https://picsum.photos/200'}}" alt="" class="lei p-3 rounded">
                        </div> 
                          </div>
                          @endforeach
                        </div>
                        <div class="d-inline"></div>
                        @foreach($announcement_to_check->images as $image)
                            <div class="w-50 p-5 pb-0">
                                <h5 class="text-white">Revisione immagini</h5>
                                <p class="text-white">Adult: <span class="{{ $image->adult }}"></span></p>
                                <p class="text-white">Medical: <span class="{{ $image->medical }}"></span></p>
                                <p class="text-white">Spoof: <span class="{{ $image->spoof }}"></span></p>
                                <p class="text-white">Violence: <span class="{{ $image->violence }}"></span></p>
                                <p class="text-white">Racy: <span class="{{ $image->racy }}"></span></p>
                            </div>
                            <div class="w-50 p-5 pt-0">
                                <h5 class="text-white mt-3">Tags</h5>
                                <div class="p2">
                                    @if($image->labels)
                                        @foreach($image->labels as $label)
                                            <p class="d-inline text-white">{{ $label }}, </p>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endforeach
                        @else
                          <div class="carousel-inner">
                            <div class="carousel-item active">
                              <img src="https://picsum.photos/600" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="https://picsum.photos/600" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                              <img src="https://picsum.photos/600" class="d-block w-100" alt="...">
                            </div>
                          </div>
                          @endif
                          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                          </button>
                        </div>
                
                <div class="card-body">
                  <h5 class="card-title">{{$announcement_to_check->title}}</h5>
                  <p class="card-text">{{$announcement_to_check->price}} €</p>
                  <p class="card-text">{{$announcement_to_check->body}}</p>
                  <p class="card-text">{{__('ui.categories'. $announcement_to_check->category->id)}}</p>
                  <p class="card-text">{{__('ui.from')}}<a class="btn" href="{{route('announcement.profile',compact('announcement'))}}">{{$announcement_to_check->user->name ?? 'annuncio da rifiutare'}}</a></p>
                </div>
            </div>
            
        </div>

        
    </div>
    <div class="col-12 col-md-6 my-3 p-5 d-flex">
        <form action="{{route('revisor.accept_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success">{{__('ui.accept')}}</button>
        </form>

        <form action="{{route('revisor.reject_announcement', ['announcement' => $announcement_to_check])}}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-danger mx-5">{{__('ui.reject')}}</button>
        </form>
    </div>
    </div>
    @endif

    @if (App\Models\Announcement::toBeRevisionedCount() != App\Models\Announcement::all()->count() )
        
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <form action="{{ route('revisor.rollbackTransaction') }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btnCategory text-white mt-5 mb-5" type="submit">{{__('ui.undo')}}</button>
                </form>
            </div>
        </div>
    </div>
    @endif


</x-layout>