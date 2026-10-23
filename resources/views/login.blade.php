@extends('layout')

@section('content')
    <div class="row justify-content-center mt-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Giriş Yap
                </div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Kullanıcı Adı</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Şifre</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Giriş</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
