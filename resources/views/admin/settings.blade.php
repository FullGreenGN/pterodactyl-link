@extends('admin.layouts.admin')

@section('title', trans('pterodactyl-link::admin.settings.title'))

@section('content')
    <form action="{{ route('pterodactyl-link.admin.settings') }}" method="POST">
        @csrf
        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ trans('pterodactyl-link::admin.settings.panel-connect') }}</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="host" class="form-label">{{ trans('pterodactyl-link::admin.settings.host') }}</label>
                    <input class="form-control" id="host" name="host" value="{{ $host }}" required="required">
                </div>

                <div class="mb-3">
                    <label for="apikey" class="form-label">{{ trans('pterodactyl-link::admin.settings.apikey') }}</label>
                    <input class="form-control" id="apikey" name="apikey" value="{{ $apikey }}" required="required">
                </div>

            </div>
        </div>

        <div class="card shadow mb-4">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">{{ trans('pterodactyl-link::admin.settings.other-settings') }}</h6>
            </div>
            <div class="card-body">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> {{ trans('messages.actions.save') }}
                </button>
            </div>
        </div>
    </form>
@endsection
