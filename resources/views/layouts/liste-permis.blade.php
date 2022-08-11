<div class="container-fluid m-3">
    <div class="row row-cols-3 row-cols-md-4 row-cols-sm-12 d-flex justify-content-around gy-4 ">
        @foreach ($permis as $permi)
            <div class="card col m-b-2" style="width: 18rem;">
                <img src="{{$permi->urlPoster}}" class="card-img-top" width="200" height="200" alt="{{$permi->Num}}">
                <div class="card-body">
                <h5 class="card-title">{{$permi->Num}}</h5>
                <p class="card-text">{{$permi->Description}}</p>
                <a href="{{route('events.show',[$permi])}}" class="btn btn-primary">Détails</a>
                </div>
            </div>

        @endforeach
    </div>
</div>


{!!$permis->links()!!}
