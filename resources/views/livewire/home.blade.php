<div>
    <div class="card bg-light text-dark shadow">
        <div class="card-body">
            <h1 class="card-title">Register Course :-</h1>
            <p class="card-text">
                <form wire:submit.prevent="store">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" wire:model='course_id' placeholder="Enter The Course Id">
                        <button class="btn btn-outline-secondary" type="submit">Register</button>
                    </div>
                    @error('course_id') <span class="error">{{ $message }}</span> @enderror
                </form>

        </div>
    </div>
</div>
