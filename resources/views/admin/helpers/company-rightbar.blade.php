			<!-- BEGIN RIGHTBAR -->
			<div class="hbox-column col-md-3 style-default-light" id="sidebar_right">
				<div class="row" style='height:100%;'>
					<div class="col-xs-12">
						@if(isset($branch['contacts']))
							<h4>Kontak</h4>
						@endif
						<br/>
						<dl class="dl-horizontal dl-icon">
							@foreach($branch['contacts'] as $key => $value)
								@if($value['item']=='phone_number')
									<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
									<dd>
									<span class="opacity-50">NOMOR TELEPON</span><br/>
								@elseif($value['item']=='email')
									<dt><span class="fa fa-fw fa-envelope fa-lg opacity-50" style="font-size:12px;margin-top:3px"></span></dt>
									<dd>
									<span class="opacity-50">EMAIL</span><br/>
								@elseif($value['item']=='address')
									<dt><span class="fa fa-fw fa-location-arrow fa-lg opacity-50"></span></dt>
									<dd>
									<span class="opacity-50">ALAMAT</span><br/>
								@else
									<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
									<dd>
									<span style="text-transform: uppercase;" class="opacity-50">{{$value['item']}}</span><br/>
								@endif
									<span style="word-wrap:break-word;"class="text-medium">{{$value['value']}}</span> &nbsp;<span class="opacity-50"></span><br/>
								</dd>
							@endforeach
						</dl>
					</div>
				</div>			
				<div class="clearfix"></div>
			</div>	