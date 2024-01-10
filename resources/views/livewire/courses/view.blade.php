<!-- Modal -->
<div wire:ignore.self class="modal fade" id="courseShowModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="courseShowModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Show Course')}} </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">


            <div class="input-group mb-3">
                <span class="input-group-text  border-0">{{__('Course Name')}}:</span>
                <div class="form-control  border-0">{{$course_name}}</div>
            </div>



            <div class="input-group mb-3">
                <span class="input-group-text  border-0">{{__('Course Unique Id')}}:</span>
                <div class="form-control  border-0">{{$course_unique_id}}</div>
            </div>







            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
            </div>
        </div>
    </div>
</div>
