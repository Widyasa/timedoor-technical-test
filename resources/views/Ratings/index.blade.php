@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('success'))
                <div class="alert alert-success mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @elseif(session()->has('failed'))
                <div class="alert alert-danger mb-4" role="alert">
                    {{ session('failed') }}
                </div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-2 d-flex flex-column gap-3">
            <p>Book Author :</p>
            <p>Book Title :</p>
            <p>Rating :</p>
        </div>
        <div class="col-3">
            <form action="{{ route('rating.store') }}" method="POST" class="w-100 d-flex flex-column gap-3">
                @csrf
                <select class="form-select" name="book_author" id="book_author">
                    <option selected>Choose book author</option>
                    @foreach ($books as $book)
                        <option value="{{ $book->author->id }}">{{ $book->author->name }}</option>
                    @endforeach
                </select>

                <select class="form-select" name="books_id" id="book_title">
                    <option selected>Choose book title</option>
                </select>

                <select class="form-select" name="rating">
                    <option selected>Choose rating author</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>

                <button type="submit" class="btn btn-primary">Search Books</button>
            </form>
        </div>
    </div>

    <script>
        $("#book_author").change(function() {
            let BookAuthorID = $(this).val();
            $('#book_title option').remove();
            $.ajax({
                type: 'get',
                url: '/rating/author/' + BookAuthorID,
                success: function(data) {
                    $('#book_title').append(
                        `<option selected>Choose book title</option>`
                    );

                    data.books.forEach(book => {
                        $('#book_title').append(
                            `<option value="${book.id}">${book.title}</option>`
                        );
                    });
                }
            });
        });
    </script>
@endsection
