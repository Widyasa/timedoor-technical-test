
@extends('layouts.main')

@section('content')
    <div class="row justify-content-end">
        <div class="col-12 d-flex flex-column gap-3">


        </div>
        <div class="col-3">
            <form action="{{ route('books') }}" class="w-100 d-flex flex-column gap-3">
                <div>List Shown :</div>
                <select class="form-select" name="list_shown" required>
                    <option selected value="{{ isset($keyword->list_shown) ? $keyword->list_shown : '' }}">{{ isset($keyword->list_shown) ? $keyword->list_shown : 'Choose list shown' }}</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                    <option value="40">40</option>
                    <option value="50">50</option>
                    <option value="60">60</option>
                    <option value="70">70</option>
                    <option value="80">80</option>
                    <option value="90">90</option>
                    <option value="100">100</option>
                </select>
                <div>Search :</div>
                <div class="input-group">
                    <input required type="search" class="form-control" name="search_book" value="{{ isset($keyword->search_book) ? $keyword->search_book : '' }}" placeholder="search books here...">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Search Books</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-striped">
                <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Author</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Average Rating</th>
                    <th scope="col">Total Rating</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($books as $i =>$book)
                    <tr>
                        <th>{{ $i + 1 }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->bookCategory->name }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ number_format($book->average_rating, 1, '.', '') }}</td>
                        <td>{{ $book->total_rating }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if (!isset($keyword))
        <div class="row">
            <div class="col-12 d-flex justify-content-end mt-4">
                {{ $books->links() }}
            </div>
        </div>
    @endif
@endsection
