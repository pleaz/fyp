
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name = "description" content="customer_profile"/>
    <title>Customer page</title>
    <link rel="stylesheet" href="/css/customer_profile.css" type="text/css"/>
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

        <div class="type">
            <div class="pic">
                <img src="/uploads/avatars/{{$user->avatar}}" alt="customer photo" />

                <div class="info">
                    <ul>
                        <li>Name: {{$user->name}}</li>
                        <li>Surname: {{$user->surname}}</li>
                        <li>My favourites:
                        @if($user->favorites)
                            <ul>
                                @foreach($user->favorites as $favorite)
                                    <li><a href="/user/{{$favorite->id}}">{{$favorite->name}}</a></li>
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
                <h1>CUSTOMER</h1>
                <p>{{$user->description}}</p>
            </div>
        </div>

    </main>

    @include('footer')

</div>
</body>
</html>
