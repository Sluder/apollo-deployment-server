@extends('layouts.base')

@section('content')
    <div class="environments">
        <div class="container">
            <div class="row header-wrapper">
                <div class="col-md-11">
                    <div class="header">
                        <p>Environments</p>
                    </div>
                </div>
                <div class="col-md-1">
                    <a href="{{ route('create.environment') }}" class="btn">Create</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('partials.message')

                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>IP Address</th>
                                <th>Authentication Type</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse (\App\Models\Environment::all() as $environment)
                            <tr>
                                <td>{{ $environment->title }}</td>
                                <td>{{ $environment->ip_address }}</td>
                                <td>{{ ucfirst($environment->authentication_type) }}</td>
                                <td>
                                    <button data-toggle="modal" data-target="#delete-environment-{{ $environment->id }}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    <a href="{{ route('edit.environment', compact('environment')) }}">
                                        <i class="fa fa-cog"></i>
                                    </a>
                                </td>
                            </tr>
                            @include('partials.delete-environment-modal', compact('environment'))
                        @empty
                            <tr class="empty">
                                <td colspan="100">No environments found</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

