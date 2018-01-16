<div class="col-md-6">
  <div class="form-group">
    <label>{{ __('Tenant Photo') }}</label>
    <input name="tenant_photo" id="tenant_photo" type="file" class="form-control" accept="image/x-png, image/jpeg" onchange="readURL(this);">
    <img class="hidden" id="tenant_photo_viewer" src="#" alt="your image" />
    <script>
    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#tenant_photo_viewer').attr('src', e.target.result).width(150).height(195);
        };
        $('#tenant_photo_viewer').removeClass('hidden');
        reader.readAsDataURL(input.files[0]);
      }
    }
    </script>
  </div>
</div>

#upload the photo at directory and storing the informations at database

if($request->hasFile('tenant_photo')){
    $insertIntoDB = Tenant::findorfail($insertedTenantId);
    $tenant_photo = $request->file('tenant_photo');

    $filename = $insertedTenantId . '.' . $tenant_photo->getClientOriginalExtension();
    Image::make($tenant_photo)->resize(150, 195)->save( base_path('public/uploads/tenant_avatars/' . $filename ),40 );
    $insertIntoDB->tenant_avatar = $filename;
    $insertIntoDB->save();
}