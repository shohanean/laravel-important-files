#At controller side:

use Session;

Session::flash('settingsChangedYes','Settings changed successfully!');
return back();

#At blade side

@if (Session::has('settingsChangedYes'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		{{ Session::get('settingsChangedYes') }}
	</div>
@endif