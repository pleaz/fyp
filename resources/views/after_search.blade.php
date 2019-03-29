<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name = "description" content="search outcome"/>
    <title>Search outcome</title>
    <link rel="stylesheet" href="/css/after_search.css"/>
    <link rel="stylesheet" href="/css/nav_bar.css" />
    <link rel="stylesheet" href="/css/footer.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>

<div id="container">
    @include('nav_bar')
    <div id="filters">
        <form action="/search" method="post">
            @csrf
            <input type="hidden" name="search" value="{{$query}}">

            <label for="styles">Filter by style</label>
            <select name="styles" id="styles">
                @foreach(\App\Style::all() as $style)
                <option value="{{$style->id}}">{{$style->style}}</option>
                @endforeach
            </select>

            <label for="rating">Filter by rating</label>
            <select name="rating" id="rating">
                <option>2+</option>
                <option>3+</option>
                <option>4+</option>
            </select>
            <button type="submit">Filter results</button>

        </form>
    </div>

    <div id="gallery">
        @if($artists)
            @foreach($artists as $artist)
                <a href="/user/{{$artist->user->id}}">
                    <div><img src="/uploads/avatars/{{$artist->user->avatar}}" style="width:235px; height:235px;"></div>
                    <h3>{{$artist->user->name}}</h3>
                    <p>{{$artist->user->surname}}</p>
                </a>
            @endforeach
        @endif
    </div>
    @include('footer')


</div>





