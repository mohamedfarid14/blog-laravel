<button type="button"  class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete{{$Premium->id}}">مسح</button>
<!--Modal: modalPush-->
<div id="delete{{$Premium->id}}" class="modal fade">
<div class="modal-dialog modal-confirm">
  <div class="modal-content">
    <div class="modal-header">				
      <h4 class="modal-title">هل انت متأكد؟</h4>	
      <button type="button"  class="btn " data-toggle="modal" data-target="#delete{{$Premium->id}}"><i class="fas fa-times"></i></button>
    </div>
    <div class="modal-body text-center">
      {{-- <i class="far fa-times-circle"></i> --}}
      <i class="far fa-times-circle fa-4x animated rotateIn mb-4 text-danger "></i>
      <p>ان كنت متأكد اضغط علي مسح</p>
    </div>
    <div class="modal-footer  d-flex justify-content-center">
      <form action="{!!route('destroy.dealer.Premiums')!!}" method="POST" class="d-inline">
        @csrf
        <input type="hidden" name="id" value="{{$Premium->id}}">
        <button type="submit" class="btn btn-danger">مسح</button>
        <button type="button" class="btn btn-info" data-dismiss="modal">الغاء</button>
      </form>
    </div>
  </div>
</div>
</div>