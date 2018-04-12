<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tick Tack Toe!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
        crossorigin="anonymous">
    <style media="screen" type="text/css">
        .square {
            border-color: black;
            border: solid;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .square-content {
            display: inline-block;

        }

        .square-row {
            height: 100px;
            margin-left: 10em;
            margin-right: 10em;
        }
    </style>

</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
            Tick Tack Toe!
        </a>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info" style="margin-top: 15px;" role="alert">
                    <h4><b>This game has ended!</b></h4>
                </div>
            </div>
        </div>
        <div class="row square-row" >
            <div class="col-4 square" style="{{ in_array('square_1',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_1 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_2',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_2 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_3',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_3 }}</p>
            </div>
        </div>
        <div class="row square-row" >
            <div class="col-4 square" style="{{ in_array('square_4',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_4 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_5',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_5 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_6',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_6 }}</p>
            </div>
        </div>
        <div class="row square-row" >
            <div class="col-4 square" style="{{ in_array('square_7',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_7 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_8',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_8 }}</p>
            </div>
            <div class="col-4 square" style="{{ in_array('square_9',$line) ? 'background-color: yellow;' : '' }}">
                <p class="square-content">{{ $game->square_9 }}</p>
            </div>
        </div>
        <div class="row square-row" >
            <div class="col-4">
            </div>
            <div style="text-align:  center; margin-top: 15px;" class="col-4">
                
                @if ($game->O_won )
                    <div class="alert alert-primary" role="alert">
                        <h4><b>Player "O" has won!</b></h4>
                    </div>
                @elseif ($game->X_won )
                    <div class="alert alert-danger" role="alert">
                        <h4><b>Player "X" has won!</b></h4>
                    </div>
                @elseif ($game->tie )
                    <div class="alert alert-warning" role="alert">
                        <h4><b>The game ended in a tie!</b></h4>
                    </div>
                @endif
            </div>
            <div class="col-4">
            </div>
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-4">
            </div>
            <div style="display: flex; align-items: center; justify-content: center;" class="col-4">
                <p><a class="btn btn-primary" href="/">Play again!</a></p>
            </div>
            <div class="col-4">
            </div>
            
        </div>
    </div>
    
</body>

</html>