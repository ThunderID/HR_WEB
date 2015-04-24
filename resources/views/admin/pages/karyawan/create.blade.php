@section('breadcrumb')
	<li>Home</li>
	<li class='active'>{{ucwords(($controller_name))}}</li>
@stop

@section('content')
	<div class="card">
		@if($data['id'])
			<form class="form" role="form" action="{{route('hr.persons.update', $data['id'])}}" method="post">
		@else
			<form class="form" role="form" action="{{route('hr.persons.store')}}" method="post">
		@endif
			<!-- END DEFAULT FORM ITEMS -->
			<div class="card-head style-primary">
				<ul class="nav nav-tabs tabs-text-contrast tabs-accent" data-toggle="tabs">
					<li class="active"><a>PROFIL</a></li>
				</ul>
			</div><!--end .card-head -->
			<!-- BEGIN FORM TAB PANES -->
			<div class="card-body tab-content">
				<div class="tab-pane active" id="profil">
					<div class="row">
						<div class="col-md-4">
							<div class="height-6 border-gray border-lg m-0auto style-gray-bright dropzone profile dz-clickable p-0" id="profile_picture" style="height:270px;width:204px;background-color:#E5E6E6;border:2px solid #333">
								<div class="dz-message">
									<h4 class="text" style="line-height:200px">Unggah Foto</h4>
								</div>
								<input type="hidden" name="link_profile_picture" id="profile_picture_url">
							</div>
						</div>						
						<div class="col-md-8">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="prefix_title" name="prefix_title" value=@if (isset($data['prefix_title'])){{ $data['prefix_title'] }}@endif>
										<label for="company">Gelar Depan</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="name" name="name" value=@if (isset($data['name'])){{ $data['name'] }}@endif>
										<label for="name">Nama Lengkap</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-3">
									<div class="form-group">
										<input type="text" class="form-control input-lg" id="suffix_title" name="suffix_title" value=@if (isset($data['suffix_title'])){{ $data['suffix_title'] }}@endif>
										<label for="functiontitle">Gelar Belakang</label>
									</div>
								</div><!--end .col -->									
							</div>


							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value=@if (isset($data['place_of_birth'])){{ $data['place_of_birth'] }}@endif>
										<label for="place_of_birth">Tempat Lahir</label>
									</div>
								</div><!--end .col -->
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group" id="date_of_birth" style="width:100%;">
											<div class="form-group">
												<input type="text" class="form-control" data-inputmask="'alias': 'date'" id="date_of_birth" name="date_of_birth" value=@if (isset($data['date_of_birth'])){{ $data['date_of_birth'] }}@endif>
												<label>Tanggal Lahir</label>
											</div>		
										</div>
									</div>
								</div>
							</div><!--end .row -->	

							<div class="row">
							</div>

							<div class="row">
								<div class="col-md-2">
									<div class="form-group">
										<label>
											Jenis Kelamin
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="male"
											@if (isset($data['gender']))
												@if ($data['gender'] = "male")
													 checked="checked"
												@Endif
											@endif
											>
											<span>Laki-laki</span>
										</label>
									</div>
								</div>
								<div class="col-md-2">
									<div class="radio radio-styled">
										<label>
											<input name="gender" type="radio" value="female"
											@if (isset($data['gender']))
												@if ($data['gender'] = "female")
													 checked="checked"
												@Endif
											@endif
											>
											<span>Perempuan</span>
										</label>
									</div>
								</div>
							</div><!--end .row -->
						</div><!--end .col -->

					</div><!--end .row -->
				</div><!--end .tab-pane -->		
			</div>	

			<div class="card-actionbar">
				<div class="card-actionbar-row">
					<a class="btn btn-flat" href="{{route('hr.persons.index')}}">BATAL</a>
					<button type="submit" class="btn btn-flat btn-accent">SIMPAN DATA</button>
				</div>
			</div>

		</form>
	</div>
@stop

@section('css')
	{!! HTML::style('css/datepicker3.css')!!}
	{!! HTML::style('css/summernote.css')!!}
	{!! HTML::style('css/dropzone.css')!!}	
@stop

@section('js')
	{!! HTML::script('js/bootstrap-datepicker.js')!!}
	{!! HTML::script('js/summernote.min.js')!!}
	{!! HTML::script('js/microtemplating.min.js')!!}
	{!! HTML::script('js/pluginmicrotemplating.min.js')!!}
	{!! HTML::script('js/dropzone.min.js')!!}
	{!! HTML::script('js/libs/jquery.inputmask.bundle.min.js')!!}

	<script type="text/javascript">
		$(document).ready(function () {
	        $("#document_upload").dropzone({ 
    			url: '{{ route("hr.images.upload") }}' ,
    			maxFilesize: 1,
    			addRemoveLinks: true,
    			init: function(){
    				this.on('success', function(file){
    					var accepted_files = this.getAcceptedFiles();
    					var uploaded_files = [];
    					var gallery_json;

    					if (accepted_files.length > 0)
    					{
    						accepted_files.forEach(function(cur_value, index, array){
    							var response = $.parseJSON(cur_value.xhr.response);
    							uploaded_files.push(response.file.url);
    						});
    					}

    					$('#gallery_file_url').val(JSON.stringify(uploaded_files));
    				});
    			}
    		});	

	        $("#profile_picture").dropzone({ 
    			url: '{{ route("hr.images.upload") }}' ,
    			maxFilesize: 1,
    			addRemoveLinks: true,
    			init: function(){
    				this.on('success', function(file){
    					var accepted_files = this.getAcceptedFiles();
    					var uploaded_files = [];
    					var gallery_json;

    					if (accepted_files.length > 0)
    					{
    						accepted_files.forEach(function(cur_value, index, array){
    							var response = $.parseJSON(cur_value.xhr.response);
    							uploaded_files.push(response.file.url);
    						});
    					}

    					$('#profile_picture_url').val(uploaded_files);
    				});
    			}
    		});	        
        });	
	</script>
@stop