
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name = "description" content="artist_profile"/>
    <title>Artist page</title>
    <link rel="stylesheet" href="/css/artist_profile.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,600&amp;subset=latin-ext" rel="stylesheet"/>
    <link rel="stylesheet" href="/css/nav_bar.css" />
    <link rel="stylesheet" href="/css/footer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/js/foundation.min.js'></script>
    <script src="/js/script.js"></script>
</head>

<body>

<div id="container">

    @include('nav_bar')

    <main>
        <div class="stars">
            <h5>Artist rating {{$avg_rating}}</h5>

            @if(!Auth()->user()->artist()->exists())
            <div style="margin-left: 18px;" class="rating" id="product1">
                <label for="rating">Star rating for content</label>
                <form style="display: inline; margin-left: 0;" action="/user/{{$user->id}}/rating/1" method="post">
                    @csrf
                <button type="submit" class="star @if(@$rating>0) selected @endif " data-star="1">
                    <span aria-hidden="true">&#9733;</span>
                    <span class="screen-reader">1 Star</span>
                </button>
                </form>
                <form style="display: inline; margin-left: 0;" action="/user/{{$user->id}}/rating/2" method="post">
                    @csrf
                <button type="submit" class="star @if(@$rating>1) selected @endif " data-star="2">
                    <span aria-hidden="true">&#9733;</span>
                    <span class="screen-reader">2 Stars</span>
                </button>
                </form>
                <form style="display: inline; margin-left: 0;" action="/user/{{$user->id}}/rating/3" method="post">
                    @csrf
                <button type="submit" class="star @if(@$rating>2) selected @endif " data-star="3">
                    <span aria-hidden="true">&#9733;</span>
                    <span class="screen-reader">3 Stars</span>
                </button>
                </form>
                <form style="display: inline; margin-left: 0;" action="/user/{{$user->id}}/rating/4" method="post">
                    @csrf
                <button type="submit" class="star @if(@$rating>3) selected @endif " data-star="4">
                    <span aria-hidden="true">&#9733;</span>
                    <span class="screen-reader">4 Stars</span>
                </button>
                </form>
                <form style="display: inline; margin-left: 0;" action="/user/{{$user->id}}/rating/5" method="post">
                    @csrf
                <button type="submit" class="star @if(@$rating>4) selected @endif " data-star="5">
                    <span aria-hidden="true">&#9733;</span>
                    <span class="screen-reader">5 Stars</span>
                </button>
                </form>
            </div>
            @endif

        </div>
        <div class="type">
            <div class="pic">
                <img src="/uploads/avatars/{{$user->avatar}}" alt="artist photo" />
                @if(Auth()->user()->id != $user->id)
                <form action="@if(Auth()->user()->favorites->contains($user->id)){{{ '/user/'.$user->id.'/unlike' }}}@else{{{ '/user/'.$user->id.'/like' }}}@endif" method="post">
                    @csrf
                <button class="button button-like @if(Auth()->user()->favorites->contains($user->id)) liked @endif">
                    <i class="fa fa-heart"></i>
                    <span>Like</span>
                </button>
                </form>
                @endif

                <div class="info">
                    <ul>
                        <li>Name: {{$user->name}}</li>
                        <li>City: {{$user->artist->city->city}}</li>
                        <li>Styles:
                            @if($user->styles)
                                @foreach($user->styles as $style)
                                    {{$style->style}}
                                @endforeach
                            @endif
                        </li>
                        <li>My favourites
                            @if($user->favorites)
                                <ul>
                                    @foreach($user->favorites as $favorite)
                                        <li><a href="/user/{{$favorite->user->id}}">{{$favorite->user->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                        <li>Favourited by
                            @if($user->artist->favored)
                                <ul>
                                    @foreach($user->artist->favored as $favorited)
                                        <li><a href="/user/{{$favorited->id}}">{{$favorited->name}}</a></li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>

                <div class="about">
                <div class="circle">
                    <div class="inner-circle"></div>
                    <span class="icon"> <i class="fa fa-book" aria-hidden="true"> </i> </span>
                </div>
                <h1>ARTIST</h1>
                <p>{{$user->description}}</p>
            </div>
        </div>
        <section class="gallery-links">
            <div class="wrapper">
                <h2>Gallery</h2>

                <div class="gallery-container">
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                    <a href="#">
                        <div></div>
                        <h3>This is a title</h3>
                        <p>This is a paragraph</p>
                    </a>
                </div>

                <div class="gallery-upload">
                   <form action="../../includes/gallery-upload.inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="filetitle" placeholder="image title">
                        <input type="text" name="filedesc" placeholder="image description">
                        <input type="file" name="file">
                        <button type="submit" name="sumbit">UPLOAD</button>
                   </form>
                </div>

            </div>
        </section>
    </main>

    @include('footer')

</div>
</body>
</html>

