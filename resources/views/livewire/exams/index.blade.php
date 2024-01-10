@section('title', __('Exams'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">{{__('Exams Listing')}}</h3>
                </div>
                <div>
                @can('exam-create')
                    <button type="button"  data-bs-toggle="modal" wire:click.prevent="resetInput()"  data-bs-target="#examCreateModal"
                        class="btn btn-white"><i class="fa fa-plus"></i> {{__('Create New Exams')}}</button>
                @endcan
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.exams.create')
                    @include('livewire.exams.update')
                    @include('livewire.exams.view')

                    
                    <div class="col-md-12">
                        <div class="row mb-2 mt-2 justify-content-md-between">
                            <div class="col-md-2 pb-sm-3">
                                <div class="row g-3 align-items-center border-1 ">
                                    {{-- <div class="col-auto">
                                        <label for="" class="col-form-label">{{__('Per Page')}}</label>
                                    </div> --}}
                                    {{-- <div class="col-auto">
                                        <select wire:model='perPage' class="form-select">
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="20">20</option>
                                            <option value="50">50</option>
                                        </select>
                                    </div> --}}

                                    @can('exam-delete')
                    <button class="btn btn-danger btn-sm mb-2" {{ count($checked) == 0 ? 'disabled' : '' }}
                        wire:click='bulkDeleteTriggerConfirm()'> <i class="fa fa-trash" aria-hidden="true"></i> {{__('Delete')}}({{ count($checked) }})
                    </button>
                    @endcan
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group mb-3">
                                    <span class="input-group-text border-right-0 border"><i class="fa fa-search"></i></span>
                                    <input wire:model='keyWord' type="text" class="form-control border-left-0 border" name="search" id="search"
                                    placeholder="{{__('Search Exams')}}">
                                </div>
                            </div>
                        </div>
                    </div>
				<div class="table-responsive">
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
                            @can('exam-delete')

                            <td><input type="checkbox" value="1" wire:model="checkedAll"></td>

                            @endcan
								<td>#</td>
								<th>{{__('Exam Name')}}</th>
								<th>{{__('Per Question Mark')}}</th>
								<th>{{__('Course')}}</th>
								<td>{{__('ACTIONS')}}</td>
							</tr>
						</thead>
						<tbody>
							@foreach($exams as $row)
							<tr>
                            @can('exam-delete')

                            <td><input type="checkbox" value="{{ $row->id }}" wire:model="checked">
                                        </td>
                                @endcan
								<td>{{ $loop->iteration }}</td>
								<td>{{ $row->exam_name }}</td>
								<td>{{ $row->per_question_mark }}</td>
								<td>{{ $row->course->course_name }}</td>
								<td width="200">

                                        {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#examShowModal" class="btn btn-warning btn-sm"wire:click="show({{ $row->id }})"><i
                                            class="fa fa-eye"></i></button> --}}

                                        @can('exam-edit')

                                        <button type="button" data-bs-toggle="modal" data-bs-target="#examUpdateModal" class="btn btn-success btn-sm"wire:click="edit({{ $row->id }})">Edit   <i
                                            class="fa fa-edit"></i></button>

                                        @endcan

                                        @can('exam-delete')

                                            <button class="btn btn-danger btn-sm"
                                            wire:click="triggerConfirm({{ $row->id }})">Delete   <i
                                                class="fa fa-trash"></i> </button>
                                        @endcan


								</td>
							@endforeach
						</tbody>
					</table>
					{{ $exams->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
