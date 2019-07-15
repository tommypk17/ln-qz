@extends('layouts.app')
@php
use App\User;
@endphp

@section('content')
    <section class="row">
        <article class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <div class="card">
                <div class="card-header">
                    <h1>Publicly Available Linqz</h1>
                    <p>Below is a list of all Linqz registered with us.</p>
                </div>
                <ul class="list-group list-group-flush">
{{--                    <li class="list-group-item">--}}
{{--                        <div class="input-group mb-3">--}}
{{--                            <input id="search-linqz" type="text" class="form-control" placeholder="Enter a URL to Search" aria-label="" aria-describedby="basic-addon1">--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    @if(count($linqz) <= 0)
                        <h3 class="text-center py-3">No Linqz available!</h3>
                    @else
                        <table id="linqz-table" class="table table-light">
                            <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Linq</th>
                                <th scope="col">Title</th>
                                <th scope="col">Created By</th>
                            </tr>
                            </thead>
                            <tbody id="linqz-table-body">
                            <?php $index = 1?>
                            @foreach($linqz as $linq)
                                <tr>
                                    <th scope="row">{{$index}}</th>
                                    <td><a href="http://ln-qz.co/{{$linq->slug}}">http://ln-qz.co/{{$linq->slug}}</a></td>
                                    <td>{{$linq->title}}</td>
                                    <td>@if($linq->user_id != null) @php echo User::Where('id', $linq->user_id)->first()->name @endphp @else Anonymous @endif</td>
                                </tr>
                                <?php $index++?>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </ul>
            </div>
        </article>
    </section>
@endsection
