@extends('adminlte::layouts.app')

@section('htmlheader_title')
	{{ trans('adminlte_lang::message.system') }}
@endsection


@section('main-content')
	<div class="container-fluid spark-screen">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">

				<!-- /.modal -->
				<!-- Default box -->
				<div class="box">
					<div class="box-header with-border text-center">
						<h1 class="box-title"><b>MasterBudget</b></h1>
					</div>
					<div class="box-body">
                        <p>Una completa, poderosa e innovadora plataforma, sin los costos ni complejidad de los sistemas web tradicionales.</p>
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->

			</div>
		</div>
	</div>
@endsection
