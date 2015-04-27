{!! Form::select('relationship', array(
	''			=> 'Pilih',
    'parent' 	=> 'Orang Tua',
    'spouse' 	=> 'Pasangan',
    'child' 	=> 'Anak'
	),$data_value, ['class' => 'form-control', 'id' => 'relationship']);
!!}