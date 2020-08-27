<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Cart</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
	<section id="app">
    <router-view />
  </section>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="https://portifolio.fip-moc.edu.br/assets/js/c2cc743add.js"></script>
</body>
</html>
