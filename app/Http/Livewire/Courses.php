<?php

namespace App\Http\Livewire;

use App\Models\Course;
// use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;
use Livewire\WithPagination;

class Courses extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    protected $listeners = [
        'confirmed',
        'cancelled',
        'bulkDelete',
    ];

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $deleteId, $checkedAll, $course_name, $course_unique_id, $lecturer_id;
    public $checked = [];
    public $perPage = 10;
    public $lecturers = [];

    public function render()
    {
        $this->authorize('course-list');

        // $this->lecturers = User::all();
        

        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.courses.index', [
            'courses' => Course::latest()
                ->orWhere('course_name', 'LIKE', $keyWord)
                ->orWhere('course_unique_id', 'LIKE', $keyWord)
                ->orWhere('lecturer_id', 'LIKE', $keyWord)
                ->paginate($this->perPage),
        ])->extends('layouts.app');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetInput()
    {
        $this->course_name = null;
        $this->course_unique_id = null;
        $this->lecturer_id = null;
    }

    public function updatedCourseName()
    {
        $this->course_unique_id = rand(1, 99999);
    }

    public function store()
    {
        $this->authorize('course-create');

        $this->validate([
            'course_name' => 'required',
            'course_unique_id' => 'required',
        ]);

        Course::create([
            'course_name' => $this->course_name,
            'course_unique_id' => $this->course_unique_id,
            'lecturer_id' => auth()->user()->id,
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        // $this->alert('success', 'Course Successfully created.');
    }

    public function edit($id)
    {
        $this->resetInput();
        $record = Course::findOrFail($id);
        $this->selected_id = $id;
        $this->course_name = $record->course_name;
        $this->course_unique_id = $record->course_unique_id;
        $this->lecturer_id = $record->lecturer_id;

    }
    public function show($id)
    {
        $record = Course::findOrFail($id);

        $this->selected_id = $id;
        $this->course_name = $record->course_name;
        $this->course_unique_id = $record->course_unique_id;
        $this->lecturer_id = $record->lecturer_id;

    }

    public function update()
    {
        $this->authorize('course-edit');

        $this->validate([
            'course_name' => 'required',
            'course_unique_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Course::find($this->selected_id);
            $record->update([
                'course_name' => $this->course_name,
                'course_unique_id' => $this->course_unique_id,
                'lecturer_id' => auth()->user()->id,
            ]);

            $this->resetInput();
            $this->alert('success', 'Course Successfully updated.');
        }
    }

    public function triggerConfirm($id)
    {
        $this->deleteId = $id;
        // $this->confirm('Do you want to delete?', [
        //     'toast' => false,
        //     'position' => 'center',
        //     'showConfirmButton' => true,
        //     'cancelButtonText' => 'Cancel',
        //     'onConfirmed' => 'confirmed',
        //     'onCancelled' => 'cancelled',
        // ]);
        $this->destroy();

        // if(confirm('are you sure!') == true){
        //     confirmed;
        // }else{
        //     cancelled;
        // }
    }

    public function confirmed()
    {
        $this->destroy();
        // $this->alert('success', 'Deleted successfully.');
    }

    public function cancelled()
    {
        // $this->alert('info', 'Understood');
    }

    public function destroy()
    {
        $this->authorize('course-delete');

        if ($this->deleteId) {
            $record = Course::where('id', $this->deleteId);
            $record->delete();
        }
    }

    public function bulkDeleteTriggerConfirm()
    {
        // $this->confirm('Do you want to delete?', [
        //     'toast' => false,
        //     'position' => 'center',
        //     'showConfirmButton' => true,
        //     'cancelButtonText' => 'Cancel',
        //     'onConfirmed' => 'bulkDelete',
        //     'onCancelled' => 'cancelled',
        // ]);
        // if(confirm('are you sure!') == true){
        //     bulkDelete;
        // }else{
        //     cancelled;
        // }

        
    }

    public function bulkDelete()
    {
        $this->authorize('course-delete');

        Course::whereKey($this->checked)->delete();
        $this->checked = [];
        // $this->alert('success', 'Deleted successfully.');
    }

    public function updatedCheckedAll($value)
    {
        if ($value) {
            $this->checked = Course::pluck('id');
        } else {
            $this->checked = [];
        }
    }

}
