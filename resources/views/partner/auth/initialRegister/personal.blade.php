<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Impro</title>
	<link rel="stylesheet" href="{{ mix('css/auth/initialRegister/personal.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
    <header>
        <div class="logo_container">
            <p class="logo">impro</p>
        </div>
    </header>

    <main>
        <div class="main-wrapper">
			<div class="title-container">
				<h3>プロフィール登録</h3>
			</div>

			<form action="{{ url('partner/register/initial/personal') }}" method="POST">
				@csrf
				<div class="profile-container">

					<div class="name-container">
						<p>名前</p>
							<input type="text" name="name" value="{{ old('name') }}">								
							@if ($errors->has('name'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('name') }}</strong>
								</div>
							@endif
					</div>

					<div class="above-address-container">
						<div class="zipcode-container">
							<p>郵便番号</p>
								<input type="text" name="zip_code" value="{{ old('zip_code') }}">
								@if ($errors->has('zip_code'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('zip_code') }}</strong>
									</div>
								@endif
						</div>

						<div class="prefecture-container">
							<p>都道府県</p>
								<input type="text" name="prefecture" value="{{ old('prefecture') }}">
								@if ($errors->has('prefecture'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('prefecture') }}</strong>
									</div>
								@endif
						</div>
					</div>

					<div class="below-address-container">
						<div class="city-container">
							<p>市区町村区</p>
								<input type="text" name="city" value="{{ old('city') }}">
								@if ($errors->has('city'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('city') }}</strong>
									</div>
								@endif
						</div>

						<div class="building-container">
							<p>番地</p>
								<input type="text" name="street" value="{{ old('street') }}">
								@if ($errors->has('street'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('street') }}</strong>
									</div>
								@endif
						</div>
					</div>

					<div class="below-address-container">
						<div class="building-container">
							<p>建物</p>
								<input type="text" name="building" value="{{ old('building') }}">
								@if ($errors->has('building'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('building') }}</strong>
									</div>
								@endif
						</div>

						<div class="tel-container">
							<p>電話番号</p>
							<div class="tel-container__wrapper">
								<input type="text" name="tel" value="{{ old('tel') }}" placeholder="">
									<span class="hyphen">
										<hr>
									</span>
								<input type="text">
									<span class="hyphen">
										<hr>
									</span>
								<input type="text">
								@if ($errors->has('tel'))
									<div>
										<strong style='color: #e3342f;'>{{ $errors->first('tel') }}</strong>
									</div>					
								@endif
							</div>
						</div>
					</div>
				</div>

				<div class="btn-container">
					<button type="submit">確認</button>
				</div>
			</form>
        </div>
    </main>

    <footer>
        <span>ご利用規約</span>
        <span>プライバシーポリシー</span>
    </footer>
</body>
</html>
