{!! Form::select('work_status', array(
	''				=> 'Pilih',
    'contract' 		=> 'Contract',
    'trial' 		=> 'Trial',
    'permanent' 	=> 'Permanent',
    'internship' 	=> 'Internship',
    'previous' 		=> 'Previous'
	),$data_value, ['class' => 'form-control', 'id' => 'work_status']);
!!}