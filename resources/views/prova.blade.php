<x-layout.layout>

<div>
    <div class="text-center">
        <br>
        <br>
    <h1 class="fw-semi color-primary">{{__('ui.createAd')}}</h1>
    </div>

    <div id="multi-step-form-container">
        <!-- Progress Bar -->
             <ul class="form-stepper form-stepper-horizontal text-center mx-auto pl-0">
            <!-- Step 1 -->
             <li class="form-stepper-active text-center form-stepper-list " step="1">
                <a class="mx-2">
             <span class="form-stepper-circle border border-success border-2 ms-5 p-4">
                         <span class="fw-bold">1</span>
                     </span>
                 </a>
             </li>
            <!-- Step 2 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="2">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted border border-success border-2 p-4">
                        <span class="fw-bold">2</span>
                    </span>
                </a>
            </li>
            <!-- Step 3 -->
            <li class="form-stepper-unfinished text-center form-stepper-list" step="3">
                <a class="mx-2">
                    <span class="form-stepper-circle text-muted border border-success border-2 p-4 me-5">
                        <span class="fw-bold">3</span>
                    </span>

                </a>
            </li>
        </ul>
        <div>
            <x-layout.banner-message/>
        <form wire:submit.prevent="store">
        <form id="userAccountSetupForm" name="userAccountSetupForm" enctype="multipart/form-data" method="POST">
            @csrf
            <!-- Step 1 Content -->
            <div class="background-detail borderTondo mx-5 p-5 border border-3 border-black">
            <section id="step-1" class="form-step">
           <h2 class="font-normal text-center">{{__('ui.createYourAdAndDontForgetPrice')}} </h2>

                <!-- Step 1 input, Category, title, price and description  -->
                <div class="mt-3">
                     <div class="mt-3">
                      <label class="form-label fw-bold">{{__('ui.category')}}</label>
                        <select wire:model.change='category_id' class="borderPers border-2 form-select @error('category_id') is-invalid @enderror" aria-placeholder="">
                            <option value=""></option>
                            @foreach (App\Models\Categories::all() as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                        @error('category_id')
                            <span class="text-danger fw-bold">{{$message}}</span>
                        @enderror
                    </div>


                <div class="mt-3 ">
                  <label class="form-label fw-bold">{{__('ui.title')}}</label>
                    <input wire:model.change='title' type="text" class="borderPers border-2 form-control @error('title') is-invalid @enderror">
                    @error('title')
                    <span class="text-danger fw-bold">{{$message}}</span>
                @enderror
            </div>


                <div class="mt-3">
                  <label class="form-label fw-bold">{{__('ui.price')}}</label>
                  <input wire:model.change='price' type="number" class="color-primary fw-bolder borderPers border-2 form-control @error('price') is-invalid @enderror">
                  @error('price')
                  <span class="text-danger fw-bold">{{$message}}</span>
              @enderror
                </div>

                <div class="mt-3">
                    <label class="form-label fw-bold">{{__('ui.description')}}</label>
                    <input wire:model.change='description' type="text" class="borderPers border-2 form-control @error('description') is-invalid @enderror">
                    @error('description')
                      <span class="text-danger fw-bold">{{$message}}</span>
                  @enderror
                   </div>


                 <!-- Button avanti per step 2  -->
                <div class="mt-3 text-center">
                    <button class="button btn-navigate-form-step button submit-btn" type="button" step_number="2">{{__('ui.goNext')}}</button>
                </div>

            </section>

            <!-- Step 2 Content termini, condizioni di uso e privacy -->
            <section id="step-2" class="form-step d-none text-center">
                <h2 class="font-normal">{{__('ui.AcceptTheTermsConditionsOfUseAndPrivacyToContinue')}}</h2>

                <!-- Step 2 input -->
                    <div class="mt-3">
                    <button class="button btn-navigate-form-step btn btn-danger" type="button" step_number="1">{{__('ui.dontAccept')}}</button>
                    <button class=" button btn-navigate-form-step button submit-btn" type="button" step_number="3">{{__('ui.Accept')}}</button>
                </div>
          </section>

            <!-- Step 3 Content -->
            <section id="step-3" class="form-step d-none text-center">
                <h2 class="font-normal">{{__('ui.ReviewYourAdOrCreate')}} </h2>


                <!-- Button Indietro, Crea e Ricontrolla -->
                <div class="mt-3">
                    <button class="button btn-navigate-form-step btn btn-danger" type="button" step_number="2">{{__('ui.GoBack')}}</button>

                    <button class="button submit-btn" type="submit">{{__('ui.GoToCreate')}}</button>

                    <button class="buttonCheck btn-navigate-form-step" type="button" step_number="1">{{__('ui.ReCheck')}}</button>
                </div>
            </section>
        </form>
    </div>
  </div>
</div>
</div>

</x-layout.layout>
