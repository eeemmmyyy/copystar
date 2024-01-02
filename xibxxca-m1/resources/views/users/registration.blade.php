@extends('welcome')
@section('title', 'Регистрация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">

                <form method="post">
                    @csrf
                    <h2 class="text-center">Регистрация</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror"  id="name" name="name" >
                        @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="surname" class="form-label">Фамилия</label>
                        <input type="text" class="form-control @error('surname') is-invalid @enderror"  id="surname" name="surname" >
                        @error('surname')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="patronymic" class="form-label">Отчество</label>
                        <input type="text" class="form-control @error('patronymic') is-invalid @enderror"  id="patronymic" name="patronymic" >
                        @error('patronymic')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="login" class="form-label">Логин</label>
                        <input type="text" class="form-control @error('login') is-invalid @enderror"  id="login" name="login" >
                        @error('login')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"  id="email" name="email" >
                        @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" >
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password_repeat" class="form-label">Подтверждение пароля</label>
                        <input type="password" class="form-control @error('password_repeat') is-invalid @enderror" id="password_repeat" name="password_repeat" >
                        @error('password_repeat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input @error('rules') is-invalid @enderror" id="rules">
                        <label class="form-check-label" for="rules">Соглашение с правилами регистрации</label>
                        @error('rules')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>

    </div>
@endsection
