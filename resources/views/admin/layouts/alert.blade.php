@if ($message = Session::get('success'))
    @include('admin.layouts.pnotify', ['message' => $message, 'type' => 'success'])
@endif


@if ($message = Session::get('error'))
    @include('admin.layouts.pnotify', ['message' => $message, 'type' => 'error'])
@endif


@if ($message = Session::get('warning'))
    @include('admin.layouts.pnotify', ['message' => $message, 'type' => 'warning'])
@endif


@if ($message = Session::get('info'))
    @include('admin.layouts.pnotify', ['message' => $message, 'type' => 'info'])
@endif


@if ($errors->any())
    @php
        $message = '<ul class="mb-0 ml-0">';
        foreach ($errors->all() as $error) {
            $message .= '<li class=' . 'ml-0' . '">' . $error . '</li>';
        }
        $message .= '</ul>'
    @endphp
    @include('admin.layouts.pnotify', ['message' => $message, 'type' => 'error'])
@endif
