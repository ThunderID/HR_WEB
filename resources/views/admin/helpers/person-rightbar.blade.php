			<!-- BEGIN RIGHTBAR -->
			<div class="hbox-column col-md-3 style-default-light" id="sidebar_right">
				<div class="row style-default-light">
					<div class="col-xs-12">
						<h4>Ringkas</h4>
						<br/>
						<dl class="dl-horizontal dl-icon">
							<dt><span class="fa fa-fw fa-gift fa-lg opacity-50"></span></dt>
							<dd>
								<span class="opacity-50">Ulang Tahun</span><br/>
								<?php $indomonth = ['january' => 'januari', 'february' => 'februari', 'march' => 'maret', 'april' => 'april',
									'june' => 'juni', 'july' => 'juli', 'august' => 'agustus', 'september' => 'september', 'october' => 'oktober',
									'november' => 'november', 'december' => 'desember'
								];?>
								<span class="text-medium">{{date("d ", strtotime($data['date_of_birth']))}} {{ucwords($indomonth[strtolower(date("F", strtotime($data['date_of_birth'])))])}}</span>
							</dd>
						</dl><!--end .dl-horizontal -->
						<br/>
						@if(isset($data['contacts']))
							<h4>Kontak</h4>
						@endif
						<br/>
						<dl class="dl-horizontal dl-icon">
							@foreach($data['contacts'] as $key => $value)
								@if($value['item']=='phone_number')
									<dt><span class="fa fa-fw fa-mobile fa-lg opacity-50"></span></dt>
									<dd>
									<span class="opacity-50">NOMOR TELEPON</span><br/>
								@elseif($value['item']=='email')
									<dt><span class="fa fa-fw fa-envelope-square fa-lg opacity-50"></span></dt>
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