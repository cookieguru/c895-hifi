<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>List | C89.5 Hi-Fi</title>

	{{ HTML::style('bower_components/bootstrap/dist/css/bootstrap.min.css') }}

	{{ HTML::style('bower_components/metisMenu/dist/metisMenu.min.css') }}

	{{ HTML::style('bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css') }}

	{{ HTML::style('bower_components/font-awesome/css/font-awesome.min.css') }}

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	{{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
	{{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js') }}
	<![endif]-->

</head>

<body>

<div id="wrapper">

	<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">C89.5 HiFi</a>
		</div>

		<ul class="nav navbar-top-links navbar-right">
			<li class="dropdown">
				<a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
				</a>
				<ul class="dropdown-menu dropdown-user">
					<li><a href="/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
					</li>
				</ul>
			</li>
		</ul>

		<div class="navbar-default sidebar" role="navigation">
			<div class="sidebar-nav navbar-collapse">
				<ul class="nav" id="side-menu">
					<li>
						<a href="/list/"><i class="fa fa-list fa-fw"></i> List</a>
					</li>
					<li>
						<a href="/upload/"><i class="fa fa-upload fa-fw"></i> Upload</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div id="page-wrapper">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">List</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<table class="table table-striped table-hover">
									<thead>
										<th>Key</th><th></th>
									</thead>
									<tbody>
										@foreach($files as $file)
											<tr>
												<td><a href="/storage/fetch/{{ $file['uri'] }}">{{ $file['uri'] }}</a></td>
												<td><a href="/storage/delete/{{ $file['uri'] }}"><span class="glyphicon glyphicon-trash"></span></a></td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

{{ HTML::script('bower_components/jquery/jquery.min.js') }}
{{ HTML::script('bower_components/bootstrap/dist/js/bootstrap.min.js') }}
{{ HTML::script('bower_components/metisMenu/dist/metisMenu.min.js') }}
{{ HTML::script('bower_components/startbootstrap-sb-admin-2/dist/js/sb-admin-2.js') }}

</body>

</html>
