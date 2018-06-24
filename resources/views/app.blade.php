<?php // resources/views/layouts/app.blade.php ?>

<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Github User Search</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css" type="text/css" />

    </head>
    <body>
        <div class="container">
            <div class="content">
            <div class="card bg-light">
                <div class="card-header">GitSearch</div>
                    <div class="card-body">
                        <h5 class="card-title">Enter a username to search for.</h5>
                        <form id="search-form" action="/search" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" class="form-control large" id="user"  placeholder="username">
                                <div class="error"></div>
                            </div>
                            <div class="form-group">
                                <button id="search-button" type="submit" name="submit" class="large btn btn-secondary wide">Search</button>
                            </div>
                        </form>
                    </div> 
                </div>
                <div id="results">
                    <div id="userinfo">
                        <div class="avatar-div"></div>
                        <div class="user-details">
                            <div class="name"></div>
                            <div class="follower-count"></div>
                        </div>
                    </div>
                    <div style="display:none;" id="followers">
                        <h3>Followers</h3>
                    </div>
                    <div class="load-more">
                        <button style="display:none;" id="load-followers" class="btn large btn-secondary mary wide">Load More</button>
                    </div>
            </div>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script src="/js/main.js" > </script>
        
    </body>
</html>