{!! Form::select('work_status', array(
	''				=> 'Pilih',
    'contract' 		=> 'Contract',
    'trial' 		=> 'Trial',
    'permanent' 	=> 'Permanent',
    'internship' 	=> 'Internship',
    'previous' 		=> 'Previous'
	),$data_value, ['class' => 'form-control modal_work_status', 'id' => 'work_status']);
!!}