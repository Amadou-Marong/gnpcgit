<div>
    {{-- course list  --}}
    <div class="row">
        <h4>Course List:</h4>
        @foreach ($courses as $item)
        <div class="col-md-4">
            <div class="card text-left mt-4 shadow">
                <a href="{{ asset('course/'.$item->id) }}" class="text-decoration-none">
                    <img class="card-img-top" src="{{ asset('classroom.jpg') }}" alt="">
                </a>
                <div class="card-body">
                    <a href="{{ asset('course/'.$item->id) }}" class="text-decoration-none">
                        <h4 class="card-title">{{$item->course_name}}</h4>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
