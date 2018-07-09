# View of district, upazila dropdown:
<div class="col-md-2">
<div class="form-group">
<label>District</label>
<select id="company_district" class="form-control" name="company_district" required>
<option value="">-Select-</option>
@foreach($districts as $district)
<option value="{{$district->id}}">{{$district->name}}</option>
@endforeach
</select>
</div>
</div>
<div class="col-md-2">
<div class="form-group">
<label>Upazilla</label>
<select id="company_upazilla" class="form-control" name="company_upazilla" required>

</select>
</div>
</div>

#JS/Ajax code to get district id and post to controller then bind upazilla list in html data:
<script>
$(document).ready(function(){
	$('#company_district').change(function() {
		var district_id = $(this).val();
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$.ajax({
			type:'POST',
			url:'/getUpazillasList',
			data: {district_id: district_id},
			success: function (data) {
				$( "#company_upazilla" ).html(data);
			}
		});
	});
});
</script>

#getUpazillasList function at controller:
public function getUpazillasList()
{
$stringToSend = '<option value="">-Select-</option>';
$upazillaLists = Upazila::where('district_id', $_POST['district_id'])->get();
foreach($upazillaLists as $upazillaList){
$stringToSend = $stringToSend.'<option value="'.$upazillaList->id.'">'.$upazillaList-
>name.'</option>';
}
echo $stringToSend;
}