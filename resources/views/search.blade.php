<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name = "description" content="search_bar"/>
    <title>Search page</title>
    <link id="pagestyle" rel="stylesheet" href="/css/search.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/css/nav_bar.css" />
    <link rel="stylesheet" href="/css/footer.css" />

</head>

<div id="container">

    @include('nav_bar')

    <div class="wrap">
        <div class="search">
            <form action="/search" method="post">
                @csrf
            <input type="text" class="searchTerm" name="search" placeholder="What are you looking for?">
            <button type="submit" class="searchButton">
                <i class="fa fa-search"></i>
            </button>
            </form>
        </div>
    </div>

    @include('footer')

</div>
<body>

</body>
</html>
