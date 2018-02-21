@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">New event</div>

                    <div class="card-body">
                        <form method="POST" action="/event">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <textarea name="title" required>

                                    </textarea>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="url" class="col-md-4 col-form-label text-md-right">Url</label>

                                <div class="col-md-6">
                                    <input type="url" name="url" required>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="class" class="col-md-4 col-form-label text-md-right">Event class</label>

                                <div class="col-md-6">
                                    <select name="ev_class" required>
                                        <option value="event-important">event-important</option>
                                        <option value="event-success">event-success</option>
                                        <option value="event-warning">event-warning</option>
                                        <option value="event-info">event-info</option>
                                        <option value="event-inverse">event-inverse</option>
                                        <option value="event-special">event-special</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start" class="col-md-4 col-form-label text-md-right">Event start</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" name="start" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end" class="col-md-4 col-form-label text-md-right">Event end</label>

                                <div class="col-md-6">
                                    <input type="datetime-local" name="end" required>
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
