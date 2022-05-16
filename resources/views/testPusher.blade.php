<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo Application</title>

    <!--[if lt IE 9]>
 <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 <![endif]-->
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-9" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Demo App</a>
            </div>

            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown dropdown-notifications">
                        <a href="#notifications-panel" class="dropdown-toggle" data-toggle="dropdown">
                            <i data-count="0" class="glyphicon glyphicon-bell notification-icon"></i>
                        </a>

                        <div class="dropdown-container">
                            <div class="dropdown-toolbar">
                                <div class="dropdown-toolbar-actions">
                                    <a href="#">Mark all as read</a>
                                </div>
                                <h3 class="dropdown-toolbar-title">Notifications (<span class="notif-count">0</span>)
                                </h3>
                            </div>
                            <ul class="dropdown-menu">
                            </ul>
                            <div class="dropdown-footer text-center">
                                <a href="#">View All</a>
                            </div>
                        </div>
                    </li>
                    <li><a href="#">Timeline</a></li>
                    <li><a href="#">Friends</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <script src="https://js.pusher.com/4.1/pusher.min.js"></script>
    <script>
        var pusher = new Pusher('{{ env('MIX_PUSHER_APP_KEY') }}', {
            cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
            encrypted: true
        });

        var channel = pusher.subscribe('channel-name');
        console.log(channel);
        channel.bind('App\\Events\\StatusLiked', function(data) {
            alert(data);
            console.log(data);
        });
    </script>
</body>

</html>
