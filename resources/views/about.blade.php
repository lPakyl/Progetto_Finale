<x-layout title="About Us" header="">

    <div class="container-fluid about">
        <div class="row vh-100 justify-content-around">
            <div data-aos="fade-right"
            data-aos-duration="1000"

            data-aos-easing="ease-in-sine" class="col-5 d-flex justify-content-center align-items-center h-100">
                <img class="w-75" src="/media/Senzanome.png" alt="">
            </div>
            <div data-aos="fade-down" class="col-2 d-flex justify-content-center align-items-center h-100">
                <img class="w-75" src="/media/Senzanome1.png" alt="">
            </div>
            <div class="col-5 d-flex justify-content-center  align-items-center h-100">
                <img data-aos="fade-left"
                data-aos-duration="1000"

                data-aos-easing="ease-in-sine"  class="w-75" src="/media/logo.png" alt="">
            </div>

        </div>
    </div>

    <div class="container-fluid  min-vh-100 about ">
        <div class="row">
            <h1 
             class="text-gradient display-1 py-5 ps-5 mb-5">AMP-Devs <span><img src="/media/Xlogo.png" alt="" class="logo2 pb-2"></span> Lampo.it</h1>
            
            
                <div class="col-12 col-md-6 d-flex align-items-center p-5 mb-5">
                    <p class="text-white pt-5 px-5 mt-5 display-6">
    
                        {{__('ui.about1')}}
                       
                    </p></div>
                    <div class="col-12 col-md-6 d-flex justify-content-center p-5 mb-5">
                        <img class="w-75" src="/media/teams.png" alt="">
                    </div>

            

            
                <div class="col-12 col-md-6 d-flex justify-content-center p-5 sparisci mb-5">
                    <img class="w-75" src="/media/work.png" alt="">
                </div>
                <div class="col-12 col-md-6 d-flex align-items p-5  mb-5">
                    <p class="text-white pt-5 px-5 mt-5 display-6 ">
    
                        {{__('ui.about2')}}

                       
                    </p></div>
                    <div class="col-12 col-md-6 d-flex justify-content-center p-5 appari d-none mb-5">
                        <img class="w-100" src="/media/work.png" alt="">
                    </div>
                

                
                    <div class="col-12 col-md-6 d-flex align-items p-5 mb-5">
                        <p class="text-white pt-5  px-5 mt-5 display-6 ">
        
                            {{__('ui.about3')}}

                           
                        </p></div>
                        <div class="col-12 col-md-6 d-flex justify-content-center p-5 mb-5">
                            <img class="w-75" src="/media/workspace.png" alt="">
                        </div>
                    
        
                     
        </div>
    </div>


</x-layout>