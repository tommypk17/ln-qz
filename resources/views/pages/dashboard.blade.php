@extends('layouts.app')

@section('content')
@php
    use App\User;
@endphp
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h1>Your Linqz</h1>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <ul class="list-group list-group-flush">
{{--                            <li class="list-group-item">--}}
{{--                                <div class="input-group mb-3">--}}
{{--                                    <input id="search-linqz" type="text" class="form-control" placeholder="Enter a URL to Search" aria-label="" aria-describedby="basic-addon1">--}}
{{--                                </div>--}}
{{--                            </li>--}}
                            @if(count($linqz) <= 0)
                                <h3 class="text-center py-3">No Linqz available!</h3>
                            @else
                                <table id="linqz-table" class="table table-light">
                                    <thead>
                                    <tr>
                                        <th scope="col"></th>
                                        <th scope="col">Linq</th>
                                        <th scope="col">Title</th>
                                    </tr>
                                    </thead>
                                    <tbody id="linqz-table-body">
                                    <?php $index = 1?>
                                    @foreach($linqz as $linq)
                                        <tr>
                                            <th scope="row">{{$index}}</th>
                                            <td><a href="http://ln-qz.co/{{$linq->slug}}">http://ln-qz.co/{{$linq->slug}}</a></td>
                                            <td>{{$linq->title}}</td>
                                        </tr>
                                        <?php $index++?>
                                    @endforeach
                                    </tbody>
                                    @endif
                                </table>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
