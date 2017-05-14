<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DragonPHP User</title>
    <meta name="description" content="dragonphp">
    <meta name="keywords" content="loser, hub">
    <meta name="author" content="dragonphp">
    <!-- Bootstrap 3.3.7 -->
    {{ stylesheet_link('/assets/static/bootstrap/css/bootstrap.min.css') }}
    <!-- Font Awesome -->
    {{ stylesheet_link('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ stylesheet_link('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ stylesheet_link('/assets/static/adminlte/css/AdminLTE.min.css') }}
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Main Content -->
    {{ content() }}

</html>