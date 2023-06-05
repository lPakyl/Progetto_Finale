<x-layout title="Registrati" header="{{__('ui.register')}}">

    <div data-aos="fade-down" class="container p-5 my-2">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 my-5 d-flex justify-content-center">
            <form class="p-5 text-white text-center glass" action="{{route('register')}}" method="POST">
                <h2 class="display-3 mb-5">{{__('ui.signIn')}}</h2>

                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger">
                         <p>{{__('ui.registerWrong')}}</p>
                    </div>
                @endif
                <div class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('ui.name')}}</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" class="form-control" id="email">
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Conferma Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                </div>
                <button type="submit" class="btn btnCategory">{{__('ui.signIn')}}</button>
               <p class="mt-3">{{__('ui.alreadyre')}}</p> 
               <a class="btn btnCategory mt-1" href="{{route('login')}}">Login</a>
              </form>
            </div>
        </div>
    </div>

</x-layout>