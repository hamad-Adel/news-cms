@extends('layout.master')

@section('title', 'Dashboard')
@section('content')
	<h1>Weclome To Dashboard</h1>

	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-4">
			<div class="content-panel">
				<h4> Categories Count</h4>
				<div class="panel-body">
					<div id="hero-graph" class="graph">
						<strong style="font-size:50px">{{$categories}}</strong> &nbsp;&nbsp;
						<i class="fa fa-list fa-5x"></i>
					</div>
				</div>
			</div>
		</div>

		<div class="col-md-4">
			<div class="content-panel">
				<h4>News Count</h4>
				<div class="panel-body">
					<div id="hero-graph" class="graph">
						<strong style="font-size: 50px">{{$news}}</strong> &nbsp;&nbsp;
						<i class="fa fa-file-text fa-5x"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>
	</div>
@stop