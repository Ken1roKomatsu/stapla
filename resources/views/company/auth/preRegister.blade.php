@extends('index')

@section('assets')
<link href="{{ mix('css/auth/login/index.css') }}" rel="stylesheet">
@endsection

@section('content')
<header>
    <div class="logo_container">
        <p class="logo">impro</p>
    </div>
</header>

<main>
    <div class="main_container">
        <div class="title_wrapper">
            <h1 class="text">メールアドレスを入力してください</h1>
        </div>

        <div class="form_wrapper">
            <form method="POST" action="{{ route('company.PreRegister') }}">
                @csrf
                <div class="input_wrapper">
                    <h4 class="title">メールアドレス</h4>
                    <input class="input_text" type="email" name="email" value="{{ old('email')}}" placeholder="impro@example.com">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback error-msg" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </div>
                    @endif

                </div>

                <!-- <div class="checkbox_wrapper">
                    <a href="#">ご利用規約</a>
                    <span>に同意して</span>
                </div> -->

                <div class="button_wrapper">
                    <button type="button" onclick="submit();" class="text">新規会員登録</button>
                </div>
            </form>

            <!-- <div class="signup_wrapper">
                <a href="{{ route('company.login') }}">ログイン</a>
            </div> -->
            
        </div>
    </div>
</main>

<!-- <footer>
    <span>ご利用規約</span>
    <span>プライバシーポリシー</span>
</footer> -->
@endsection