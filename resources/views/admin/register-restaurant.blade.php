@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.register.restaurant') }}">
                            @csrf

                            <div class="mb-4 row">
                                <label for="restaurant-name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Restaurant name') }}</label>

                                <div class="col-md-6">
                                    <input id="restaurant-name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="address"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ old('address') }}" required>

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="vat-no"
                                    class="col-md-4 col-form-label text-md-right">{{ __('VAT number') }}</label>

                                <div class="col-md-6">
                                    <input id="vat-no" type="text"
                                        class="form-control @error('VAT_no') is-invalid @enderror" name="VAT_no"
                                        value="{{ old('VAT_no') }}" required>

                                    @error('VAT_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="category"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Category (select one or more)') }}</label>

                                <div class="col-md-6">
                                    <select class="form-select" id="category" name="category" multiple required
                                        aria-label="Category type select" @error('category') is-invalid @enderror">
                                        @foreach ($categories as $category)
                                            <option @selected(in_array($category->id, old('categories', []))) value="{{ $category->id }}"
                                                name="categories[]" class="text-capitalize">
                                                {{ $category->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('category')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label for="description"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" type="text" class="form-control" rows="10" name="description">{{ old('description') }}</textarea>

                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-4 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
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
