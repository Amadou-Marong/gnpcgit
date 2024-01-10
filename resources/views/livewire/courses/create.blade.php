<!-- Modal -->
<div wire:ignore.self class="modal fade" id="courseCreateModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="courseCreateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Create New Course')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
           <div class="modal-body">
				<form>

            <div class="form-group mt-3">
                <label for="course_name">{{__('Course Name')}}</label>
                <input wire:model="course_name" type="text" class="form-control" id="course_name" placeholder="{{__('Course Name')}}">@error('course_name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="course_unique_id">{{__('Course Unique Id')}}</label>
                <input wire:model="course_unique_id" readonly type="text" class="form-control" id="course_unique_id" placeholder="{{__('Course Unique Id')}}">@error('course_unique_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

            <div class="form-group mt-3">
                <label for="lecturer_id">{{__('lecturer')}}</label>
                <select wire:model="lecturer_id" class="form-select" id="lecturer_id">
                    <option value="">{{__('Select Lecturer')}}</option>
                    @foreach($lecturers as $lecturer)
                    <option value="{{$lecturer->id}}">{{$lecturer->lecturer_name}}</option>
                    @endforeach
                </select>
            </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary  close-modal">{{__('Save')}}</button>
            </div>
        </div>
    </div>
</div>
