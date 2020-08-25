@extends('maintemplate')
@section('portfolio-index')
    <a href="{{ route('portfolio.create') }}">
        <i class="fa fa-plus" style="font-size:48px;color:red;float:right"></i>
    </a>
    <h1 style="text-align: center">Portfolios</h1>


    @if(Session::has('message'))
        <div class="alert alert-success">
            <button type="button" class="btn close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('message') }}
        </div>
    @endif

    @foreach($portfolios as $portfolio)
        <div id="portfolios-div">
            <div class="row">
                <div class="col-md-4">
                    <p>Title: {{ $portfolio->title }}</p>
                    <p>Category: {{ $portfolio-> category }}</p>
                    <p>Tag: {{ $portfolio->tag }}</p>
                    <p>Date: {{ $portfolio->date }}</p>
                </div>
                {{--                json_decode($portfolio->image--}}
                <div class="col-md-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            @foreach(json_decode($portfolio->image) as $key=>$image)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"
                                    class="{{$key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach(json_decode($portfolio->image) as $key=>$image)
                                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                    <img src="../assets/img/portfolioimages/{{$image}}" class="d-block w-100"
                                         alt="...">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                           data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                           data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    {{--                    <a href="{{ route('portfolio.edit',[$portfolio->id]) }}">--}}
                    <a href="{{ route('portfolio.edit',[$portfolio->id]) }}">
                        <button class="btn btn-outline-success">
                            Edit
                        </button>
                    </a>
                </div>
                <div class="col-md-2">
                {{--                    <a href="" id="portfolio-delete">--}}
                {{--                        <form action="{{ route('portfolio.destroy',[$portfolio->id]) }}" method="post">--}}
                {{--                            {{method_field('DELETE')}}--}}
                {{--                            <button type="button" class="btn btn-outline-danger" data-toggle="modal"--}}
                {{--                                    data-target="exampleModal">--}}
                {{--                                Delete--}}
                {{--                            </button>--}}
                {{--                        </form>--}}
                {{--                    </a>--}}
                <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#portfolioDeleteModal{{$portfolio->id}}">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="portfolioDeleteModal{{$portfolio->id}}" tabindex="-1"
                         aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <form action="{{ route('portfolio.destroy',[$portfolio->id]) }}" method="post">@csrf
                                {{ method_field('DELETE') }}
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete a portfolio</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are yor Sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                        <button class="btn btn-outline-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection
