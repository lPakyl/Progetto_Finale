<x-layout title="LAMPO.it" header="">

    @if (session()->has('message'))
         <div class="alert alert-success text-center">
              {{session('message')}}
         </div>
    @endif

    <div class="container-fluid pt-2 pb-5 seitu pb-5 ">
        <div class="row justify-content-center">
            <div class="col-12 d-flex justify-content-center h-100 bg-transparent">
                <div data-aos="fade-right" class="d-flex align-items-center justify-content-center flex-column text-white titol">
                    <i class="fa-solid text-accentC fa-10x my-5"></i>
                    <h1 class="display-1 glow1 ">LAMPO<span class="text-accentC">.it</span></h1>
                    <h2 class="pb-2">{{__('ui.subtitle')}} <span> <img src="/media/logo.png" class="logo2 pb-2" alt=""></span></h2>
                    <a href="{{route('announcement.create')}}" class="btn btnCategory text-white">{{__('ui.createWelcome')}}</a>
                </div>
            </div>
            {{-- <div data-aos="fade-left" class="col-12 col-md-6 d-flex align-items-center justify-content-center"></div> --}}
        </div>
  </div>

  {{-- Sezione icone con categorie --}}

  <div class="container py-5 categories">
    <div class="row justify-content-evenly h-100 py-5">
        <h2 class="text-center text-white display-3 my-5 py-5">{{__('ui.categoryHome')}}</h2>
        @foreach($categories as $category)

        <div class="col-md-3 col-4 d-flex flex-column justify-content-center align-items-center category mx-1 px-0  py-4">
            
            <a class="w-100 h-100 text-center " href="{{route('categoryShow',compact('category'))}}">
                <div id="category{{$category->id}}" class="category{{$category->id}}"class="p-5"><i id="i{{$category->id}}" class=" text-gradient  "></i></div></a>
            <h5 class="py-5 glow2  ">{{__('ui.categories'. $category->id)}}</h5>
            
        </div>
        @endforeach
    </div>
  </div>
</div>

{{-- inizio carosello --}}

<section class="totalglass">
<div class="container  pt-5">
    <div class="row justify-content-center">
        <div class="col-12 minh "> 

            @if($announcements)
                <h2 class="text-center text-white display-3">{{__('ui.last')}}</h2>
            @endif
            <div class="swiper mySwiper pt-2 h-100">
                <div class="swiper-wrapper h-100 ">
                    @forelse ($announcements as $announcement)
                    <a href="{{route('announcement.show',compact('announcement'))}}">
                        <div class="swiper-slide lui glass2">
                            <img  src="{{!$announcement->images()->get()->isEmpty() ? $announcement->images()->first()->getUrlwater('logo') : 'https://picsum.photos/600/400'}}" alt="" class=" lei">
                            <div class="d-flex flex-column text-center">
                                <h5 class="text-white display-4">{{$announcement->title}}</h5>
                                <p class="text-white">{{$announcement->price}} €</p> </a>
                            </div>
                        </div>
                        
                @empty
                     </div>
                    
                @endforelse
                </div>
                
            </div>
        </div>

    </div>

</div>
</section>   

</x-layout>
