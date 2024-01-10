<?php

namespace App\Http\Livewire;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Exam;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Exams extends Component
{
    use WithPagination;
     use AuthorizesRequests;

     protected $listeners = [
        'confirmed',
        'cancelled',
        'bulkDelete'
    ];

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,$deleteId,$checkedAll, $exam_name, $per_question_mark, $course_id;
    public $checked = [];
    public $perPage = 10;
    public $courses = [];




    public function render()
    {
        $this->authorize('exam-list');



        $this->courses = Course::all();

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.exams.index', [
            'exams' => Exam::latest()
						->orWhere('exam_name', 'LIKE', $keyWord)
						->orWhere('per_question_mark', 'LIKE', $keyWord)
						->orWhere('course_id', 'LIKE', $keyWord)
						->paginate($this->perPage),
        ])->extends('layouts.app');
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetInput()
    {
		$this->exam_name = null;
		$this->per_question_mark = null;
		$this->course_id = null;
    }

    public function store()
    {
        $this->authorize('exam-create');

        $this->validate([
		'exam_name' => 'required',
		'per_question_mark' => 'required',
		'course_id' => 'required',
        ]);

        Exam::create([
			'exam_name' => $this-> exam_name,
			'per_question_mark' => $this-> per_question_mark,
			'course_id' => $this-> course_id
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		// $this->alert('success', 'Exam Successfully created.');
    }

    public function edit($id)
    {
        $this->resetInput();
        $record = Exam::findOrFail($id);
        $this->selected_id = $id;
		$this->exam_name = $record-> exam_name;
		$this->per_question_mark = $record-> per_question_mark;
		$this->course_id = $record-> course_id;

    }
    public function show($id)
    {
        $record = Exam::findOrFail($id);

        $this->selected_id = $id;
		$this->exam_name = $record-> exam_name;
		$this->per_question_mark = $record-> per_question_mark;
		$this->course_id = $record-> course_id;

    }

    public function update()
    {
        $this->authorize('exam-edit');

        $this->validate([
		'exam_name' => 'required',
		'per_question_mark' => 'required',
		'course_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Exam::find($this->selected_id);
            $record->update([
			'exam_name' => $this-> exam_name,
			'per_question_mark' => $this-> per_question_mark,
			'course_id' => $this-> course_id
            ]);

            $this->resetInput();
			// $this->alert('success', 'Exam Successfully updated.');
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
        if(confirm('are you sure!') == true){
            bulkDelete;
        }else{
            cancelled;
        }
    }

    public function confirmed()
    {
        $this->destroy();
        // $this->alert( 'success', 'Deleted successfully.');
    }

    public function cancelled()
    {
        // $this->alert('info', 'Understood');
    }

    public function destroy()
    {
        $this->authorize('exam-delete');

        if ($this->deleteId) {
            $record = Exam::where('id', $this->deleteId);
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
        if(confirm('are you sure!') == true){
            bulkDelete;
        }else{
            cancelled;
        }
    }

    public function bulkDelete()
    {
        $this->authorize('exam-delete');

        Exam::whereKey($this->checked)->delete();
        $this->checked = [];
        // $this->alert( 'success', 'Deleted successfully.');
    }

    public function updatedCheckedAll($value)
    {
        if ($value) {
            $this->checked = Exam::pluck('id');
        }else{
            $this->checked = [];
        }
    }


}

