@extends('layouts.app')

@section('content')
    <section class="jumbotron row">
        <article class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2">
            <h2 class="text-center">Begin your link shortening journey</h2>
            <form method="POST" action="{{ route('linqz') }}">
                @csrf
                <div class="input-group mb-3">
                        <input type="text" name="long_url" class="form-control" placeholder="Enter a URL to shorten" aria-label="URL Shorten" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <button type="submit" class="btn btn-outline-success" type="button">Linq It</button>
                    </div>
                </div>
            </form>
            @if(session('success'))
                <div class="input-group">
                    <input id="linqz-link-url" name="linqz-link-url" type="text" value="{{session('url')}}" class="form-control my-2" readonly>
                    <div class="input-group-append my-2">
                        <button id="btn-copy-url" class="btn btn-outline-success">Copy URL</button>
                    </div>
                </div>
                <script type="application/javascript">
                    $(document).ready(function(){
                        $('#btn-copy-url').on('click', function(){
                            $('#linqz-link-url').select();
                            document.execCommand('copy');
                        });
                    });
                </script>
            @endif
            <h1 class="text-center">Ln-Qz</h1>
            <p class="text-center">"Unleash your inner linqz - TODAY"</p>
        </article>
    </section>
    <section class="row">
        <article class="col-12 col-md-8 col-lg-4 offset-md-2 offset-lg-0 my-1">
            <div class="card">
                <div class="card-header bg-info text-light">
                    <h3>Services</h3>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">Lengthy link shortening goodness</li>
                        <li class="list-group-item">Search for Linqz</li>
                        <li class="list-group-item">Linq Management(with an account)</li>
                        <li class="list-group-item">Custom Linqz(with an account)</li>
                        <li class="list-group-item">So many Linqz - Endless Linqz</li>
                    </ul>
                </div>
            </div>
        </article>
        <article class="col-12 col-md-8 col-lg-4 offset-md-2 offset-lg-0 my-1">
            <div class="card">
                <div class="card-header bg-success text-light">
                    <h3>About</h3>
                </div>
                <div class="card-body">
                    <p>
                        Linqz - short for <em>"links"</em>&nbsp;<small>(its not actually shorter, we counted)</small> is a very basic web application to aid in creating shortened links to provide to others.
                        This eliminates lengthy query string ridden URLs. Similar to Bitly, this app can create shorter links that are worth sharing.
                    </p>
                    <p>
                        <a href="/register">Create an account</a> to keep track of your Linqz in one place, or simply go to <a href="/linqz">Linqz</a> to view
                        all publicly known Linqz.
                    </p>
                </div>
            </div>
        </article>
        <article class="col-12 col-md-8 col-lg-4 offset-md-2 offset-lg-0 my-1">
            <div class="card">
                <div class="card-header bg-primary text-light">
                    <h3>Advantages</h3>
                </div>
                <div class="card-body">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Speed
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    Creating shorter links is quick. Lightinging fast actually - we pride our application in being snappy, quick, and agile. Start linqing today!
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Simplicity
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    We wanted this application to not only be quick, but simple. Do we really need to go on? I mean.. there's only two main pages: <a href="/">This one</a> and the <a href="/linqz">Linqz</a> one.
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Open Source
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                    Built on Open Source software. Built to <b>BE</b> Open Source software. Start doing your part by Linqing today! Lets build a better Linq'd tomorrow for our kids!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
@endsection