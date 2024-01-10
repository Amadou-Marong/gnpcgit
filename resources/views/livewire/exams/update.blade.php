<!-- Modal -->
<div wire:ignore.self class="modal fade" id="examUpdateModal" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="examUpdateModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('Update Exam')}}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>

                    <div class="form-group mt-3">
                        <label for="exam_name">{{__('Exam Name')}}</label>
                        <input wire:model="exam_name" type="text" class="form-control" id="exam_name"
                            placeholder="{{__('Exam Name')}}">@error('exam_name') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mt-3">
                        <label for="per_question_mark">{{__('Per Question Mark')}}</label>
                        <input wire:model="per_question_mark" type="text" class="form-control" id="per_question_mark"
                            placeholder="{{__('Per Question Mark')}}">@error('per_question_mark') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    

                    <div class="form-group mt-3">
                        <label for="course_id">{{__('Course')}}</label>
                        <select wire:model="course_id" class="form-select" id="course_id">
                            @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Close')}}</button>
                <button type="button" wire:click.prevent="update()" data-bs-dismiss="modal"
                    class="btn btn-primary close-modal">{{__('Update')}}</button>
            </div>
        </div>
    </div>
</div>
