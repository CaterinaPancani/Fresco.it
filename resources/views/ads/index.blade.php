<x-layout.layout>
    <div style="min-height: 50vw">

        <div style="text-align: center; ">
            <a href="{{route('dashboard')}}" style="margin:15px" class="bottoneblu btn btn-outline-dark btn-lg background-primary color-detail hind-siliguri-semibold">{{__('ui.createAd')}}</a>
        </div>

        <div class="mt-5">
            <h1 class="text-center" style="text-align: center">
                <h1 style="text-align: center ">{{$category->name ?? ''}}</h1>
                <h2 style="text-align: center ">Prodotti in vendita</h2>
            </h1>
            <div class="container">
                <div class="row text-center">
                    @forelse ($ads as $ad)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-5 d-flex justify-content-center">
                            <livewire:card :ad="$ad"/>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="text-danger fw-bold">
                                <p class="lead">Non ci sono annunci in questa sezione</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
            <div class="mt-3">
                {{ $ads->links('components.pagination')}}
            </div>
        </div>
    </div>
</x-layout.layout>
