@extends('layouts')

@section('title', 'Dashboard')

@section('style')
    .card {
    margin-top: 20px;
    }

    thead {
    text-align: center;
    }

    {{-- .pagination {
    margin-top: 1rem;
    }

    .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
    }

    .page-link {
    color: #0d6efd;
    border: 1px solid #dee2e6;
    }

    .page-link:hover {
    color: #fff;
    background-color: #0d6efd;
    border-color: #0d6efd;
    } --}}

@endsection

@section('content')
    <nav class="navbar sticky-top navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><i class="bi bi-journal-check me-2"></i>Tracking</a>
            @if (Route::has('login'))
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @auth
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-person-circle"></i>
                                    {{ ucwords(Auth::user()->name) }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-lg-end">
                                    <li><a class="dropdown-item disabled" href="#"><i
                                                class="bi bi-person-fill me-2"></i>Profile</a>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit" class="dropdown-item"><i
                                                    class="bi bi-box-arrow-right me-2"></i>Logout</button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link active" aria-current="page" href="{{ route('login') }}"><i
                                        class="bi bi-box-arrow-in-right"></i> Login</a>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item dropdown">
                                    <a class="nav-link active" aria-current="page" href="{{ route('register') }}"><i
                                            class="bi bi-person-plus"></i> Register</a>
                                </li>
                        </ul>
                    </div>
                @endif
            @endauth
            @endif
        </div>
    </nav>

    @auth
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <h1 class="text-center">Dashboard</h1>
                        </div>
                        <div class="col-md-12">
                            <label for="NoteTextarea" class="form-label">Note</label>
                            <textarea class="form-control" id="NoteTextarea" name="Note" rows="3"></textarea>
                        </div>
                        <div id="alert"></div>

                        <ul class="nav nav-tabs" id="tab-header" role="tablist"></ul>
                        <div class="tab-content" id="tab-contents"></div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary" type="button" id="btn-save"><i class="bi bi-save"></i>
                                Save</button>
                            <button class="btn btn-success" type="button" id="btn-update"><i class="bi bi-save"></i>
                                Update</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Note</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Create By</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $index = 1 @endphp
                                @foreach ($notes as $note)
                                    <tr>
                                        <th scope="row" class="text-center" style="width: 5%">{{ $index }}</th>
                                        <td class="text-truncate" style="max-width: 150px;">{{ $note->n_text }}</td>
                                        <td class="text-center" style="width: 20%">{{ $note->created_at }}</td>
                                        <td class="text-center" style="width: 10%">{{ $note->name }}</td>
                                        <td class="text-center" style="width: 20%">
                                            <div class="d-grid gap-2 d-md-block">
                                                <a class="btn btn-primary btn-edit" data-id="{{ $note->n_id }}">
                                                    <i class="bi bi-pencil-square me-2"></i>Edit
                                                </a>
                                                <a class="btn btn-danger btn-delete" data-id="{{ $note->n_id }}"
                                                    onclick="delete_note({{ $note->n_id }})">
                                                    <i class="bi bi-trash me-2"></i>Delete
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @php $index++ @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item{{ $notes->currentPage() == 1 ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $notes->previousPageUrl() }}" tabindex="-1"
                                        aria-disabled="{{ $notes->currentPage() == 1 ? 'true' : 'false' }}">Previous</a>
                                </li>
                                @for ($i = 1; $i <= $notes->lastPage(); $i++)
                                    <li class="page-item{{ $notes->currentPage() == $i ? ' active' : '' }}"><a
                                            class="page-link" href="{{ $notes->url($i) }}">{{ $i }}</a></li>
                                @endfor
                                <li class="page-item{{ $notes->currentPage() == $notes->lastPage() ? ' disabled' : '' }}">
                                    <a class="page-link" href="{{ $notes->nextPageUrl() }}"
                                        aria-disabled="{{ $notes->currentPage() == $notes->lastPage() ? 'true' : 'false' }}">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            let text = $('#NoteTextarea');
            let update = $('#btn-update');
            let before_value = '';
            let after_value = '';
            let added_value = '';
            let deleted_value = '';

            $(document).ready(function() {
                update.hide();
                $('#tab-header').hide();
                $('#tab-contents').hide();

                // text.keyup(function() {
                //     $('#alert').empty();
                // });

                text.keyup(function() {
                    $('#alert').empty();

                    after_value = $(this).val();
                    console.log("After", after_value);

                    var common = before_value.slice(0, after_value.length);
                    if (common === after_value) {
                        // The user deleted some text
                        deleted_value = '';
                        deleted_value = before_value.slice(after_value.length);
                        console.log("Deleted text:", deleted_value);
                    } else if (after_value.slice(0, common.length) === common) {
                        // The user added some text
                        added_value = '';
                        added_value = after_value.slice(common.length);
                        console.log("Added text:", added_value);
                    } else {
                        // The user changed some text
                        console.log("Changed text:", after_value);
                    }
                });

                $('#btn-save').click(function() {
                    var note = $('#NoteTextarea').val();

                    if (note === '') {
                        $('#NoteTextarea').focus();
                        $('#alert').html(
                            '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle"></i> Please enter a note</div>'
                        );
                        return;
                    }
                    Swal.fire({
                        title: 'Confirm Save?',
                        text: "Are you sure you want to save this note?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Confirm',
                        cancelButtonText: 'Cancel',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '/save',
                                method: 'POST',
                                data: {
                                    n_text: note,
                                    created_by: '{{ Auth::user()->id }}',
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        Swal.fire({
                                            title: 'Success!',
                                            text: response.message,
                                            icon: 'success',
                                            confirmButtonText: 'OK'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                location.reload();
                                            }
                                        })
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(xhr.responseText);
                                }
                            });
                        }
                    })
                });

                $('.btn-edit').click(function(e) {
                    e.preventDefault();
                    var note = $(this).data('id');
                    after_value = '';
                    $.ajax({
                        url: '/notes/' + note,
                        type: 'GET',
                        success: function(response) {
                            $('#NoteTextarea').val(response.n_text);
                            update.data('id', response.n_id);
                            update.show();

                            before_value = response.n_text;
                            console.log("Before", before_value);
                            note_view(response.n_id);
                        },
                        error: function(response) {
                            console.log('Error:', response);
                        }
                    });
                });

                update.click(function() {
                    console.log("Before", before_value ? before_value : '-', "After", after_value ?
                        after_value : '-',
                        "Added", added_value ? added_value : '-', "Deleted", deleted_value ? deleted_value :
                        '-');
                    var note_id = $(this).data('id');
                    var user_id = '{{ Auth::user()->id }}';

                    if (before_value === $('#NoteTextarea').val()) {
                        $('#alert').html(
                            '<div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle"></i> Please change the note</div>'
                        );
                        return;
                    } else {
                        Swal.fire({
                            title: 'Confirm Update?',
                            text: "Are you sure you want to update this note?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Confirm',
                            cancelButtonText: 'Cancel',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: '/change',
                                    type: 'POST',
                                    data: {
                                        n_id: note_id,
                                        before_change: before_value,
                                        after_change: after_value,
                                        added_line: added_value,
                                        deleted_line: deleted_value,
                                        user_id: user_id,
                                        _token: '{{ csrf_token() }}'
                                    },
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            update_note(note_id);
                                        }
                                    },
                                    error: function(response) {
                                        console.log('Error:', response);
                                    }
                                });
                            }
                        })
                    }
                });
            });

            function update_note(id) {
                $.ajax({
                    url: '/update',
                    type: 'POST',
                    data: {
                        n_id: id,
                        n_text: after_value,
                        updated_by: '{{ Auth::user()->id }}',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status === 'success') {
                            Swal.fire({
                                title: 'Success!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload();
                                }
                            })
                        }
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            }

            function delete_note(id) {
                if (confirm('Are you sure you want to delete this note?')) {
                    $.ajax({
                        url: '{{ route('notes.delete') }}',
                        method: 'POST',
                        data: {
                            n_id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                alert(response.message);
                                location.reload();
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('An error occurred while deleting the note');
                        }
                    });
                }
            }

            function note_view(id) {
                $('#tab-header').show();
                $('#tab-contents').show();
                $.ajax({
                    url: '/view',
                    type: 'GET',
                    data: {
                        n_id: id,
                    },
                    success: function(response) {
                        console.log(response);
                        let data = response.data;
                        if (data.length > 0) {
                            let header = '';
                            for (i = 0; i < data.length; i++) {
                                let activeClass = '';
                                if (i === 0) {
                                    activeClass = 'active';
                                }
                                header += `<li class="nav-item" role="presentation">
                                    <button class="nav-link ${activeClass}" id="home-tab" data-bs-toggle="tab" data-bs-target="#tab-pane-${i}" type="button" role="tab" aria-controls="tab-pane-${i}"
                                        aria-selected="true">${data[i].name.split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1).toLowerCase()).join(' ')}</button>
                                </li>`;
                            }
                            $('#tab-header').empty().append(header);

                            let content = '';
                            for (i = 0; i < data.length; i++) {
                                let activeClass = '';
                                if (i === 0) {
                                    activeClass = 'show active';
                                }
                                const updated = new Date(data[i].updated_at);
                                const timeAgo = getTimeAgo(updated);
                                const beforeChangeWords = data[i].before_change.split(' ');
                                const afterChangeWords = data[i].after_change.split(' ');
                                let highlightedAfterChange = '';

                                afterChangeWords.forEach((word, index) => {
                                    if (word !== beforeChangeWords[index]) {
                                        highlightedAfterChange += `<mark>${word}</mark> `;
                                    } else {
                                        highlightedAfterChange += `${word} `;
                                    }
                                });

                                content += `<div class="tab-pane fade ${activeClass}" id="tab-pane-${i}" role="tabpanel" aria-labelledby="tab-pane-${i}" tabindex="0">
                                    ${data[i].added_line ? `<p class="text-muted"><b>Added </b><mark>${data[i].added_line}</mark></p>` : ''}
                                    ${data[i].deleted_line ? `<p class="text-muted"><b>Deleted </b><del>${data[i].deleted_line}</del></p>` : ''}
                                    <p class="text-muted">Change from <b><u>${data[i].before_change}</u></b> <i class="bi bi-arrow-right-short"></i>  <b><u>${highlightedAfterChange.trim()}</u></b></p>
                                    <p class="text-muted"><em>Updated ${timeAgo}</em></p>
                                </div>`;
                            }
                            $('#tab-contents').empty().append(content);

                            // Bind a click event to the tab links
                            // $('.nav-link').click(function() {
                            //     const index = $(this).parent().index();
                            //     const beforeChange = data[index].before_change;
                            //     const currentNote = $('#NoteTextarea').val();
                            //     console.log(beforeChange);

                            //     if (!currentNote.includes(beforeChange)) {
                            //         $('#NoteTextarea').val(beforeChange + ' ' + $('#NoteTextarea').val());
                            //     }
                            // });

                        } else {
                            $('#tab-header').empty().hide();
                            $('#tab-contents').empty().hide();
                        }
                    },
                    error: function(response) {
                        console.log('Error:', response);
                    }
                });
            }

            function getTimeAgo(date) {
                const seconds = Math.floor((new Date() - date) / 1000);

                let interval = Math.floor(seconds / 31536000);
                if (interval >= 1) {
                    return `${interval} year${interval === 1 ? '' : 's'} ago`;
                }
                interval = Math.floor(seconds / 2592000);
                if (interval >= 1) {
                    return `${interval} month${interval === 1 ? '' : 's'} ago`;
                }
                interval = Math.floor(seconds / 86400);
                if (interval >= 1) {
                    return `${interval} day${interval === 1 ? '' : 's'} ago`;
                }
                interval = Math.floor(seconds / 3600);
                if (interval >= 1) {
                    return `${interval} hour${interval === 1 ? '' : 's'} ago`;
                }
                interval = Math.floor(seconds / 60);
                if (interval >= 1) {
                    return `${interval} minute${interval === 1 ? '' : 's'} ago`;
                }
                return 'just now';
            }
        </script>
    @endauth
@stop
