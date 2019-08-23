<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Impro</title>
	<link rel="stylesheet" href="{{ mix('css/auth/initialRegister/personal.css') }}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
	<script>
	const setPreview = (input) => {
	  const preview = document.getElementById('profile_image_preview');

	  if (input.files && input.files[0]) {
 	    let reader = new FileReader();
		reader.onload = (e) => {
		  preview.src = e.target.result;
		}

		reader.readAsDataURL(input.files[0]);
	  }
	}
	</script>
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

			<form action="/company/register/initialRegistration" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="edit-container">

					<div class="profile-container">
						<div class="input-container">
							<p>名前</p>
								<input type="text" name="name" value="{{ old('name') }}">								
							@if ($errors->has('name'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('name') }}</strong>
								</div>
							@endif
						</div>

						<div class="input-container">
							<p>担当</p>
								<input type="text" name="department" value="{{ old('department') }}">
							@if ($errors->has('department'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('department') }}</strong>
								</div>
							@endif
						</div>

						<div class="input-container">
							<p>自己紹介</p>
								<textarea type="text" name="self_introduction" cols="30" rows="10">{{ old('self_introduction') }}</textarea>
							@if ($errors->has('self_introduction'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('self_introduction') }}</strong>
								</div>
							@endif
						</div>
					</div>
				</div>
				
				<div class="edit-container-company">
					<div class="top-container">
						<div class="input-container">
							<p>会社名</p>
								<input type="text" name="company_name" value="{{ old('company_name') }}">
							@if ($errors->has('company_name'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('company_name') }}</strong>
								</div>
							@endif
						</div>
						<div class="input-container">
							<p>代表者名</p>
								<input type="text" name="representive_name" value="{{ old('representive_name') }}">
							@if ($errors->has('representive_name'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('representive_name') }}</strong>
								</div>
							@endif
						</div>
					</div>

					<div class="middle-container">
						<div class="input-container">
							<p>郵便番号</p>
								<input type="text" name="zip_code" value="{{ old('zip_code') }}">
							@if ($errors->has('zip_code'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('zip_code') }}</strong>
								</div>
							@endif
						</div>
						<div class="input-container">
							<p>都道府県</p>
								<input type="text" name="address_prefecture" value="{{ old('address_prefecture') }}">
							@if ($errors->has('address_prefecture'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('address_prefecture') }}</strong>
								</div>
							@endif
						</div>
					</div>

					<div class="bottom-container">
						<div class="input-container">
							<p>市区町村・番地</p>
								<input type="text" name="address_city" value="{{ old('address_city') }}">
							@if ($errors->has('address_city'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('address_city') }}</strong>
								</div>
							@endif
						</div>
						<div class="input-container">
							<p>建物名・部屋番号</p>
								<input type="text" name="address_building" value="{{ old('address_building') }}">
							@if ($errors->has('address_building'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('address_building') }}</strong>
								</div>
							@endif
						</div>
					</div>
					<div class="bottom-container">
						<div class="input-container">
							<p>電話番号</p>
								<input type="text" name="tel" value="{{ old('tel') }}">
							@if ($errors->has('tel'))
								<div>
									<strong style='color: #e3342f;'>{{ $errors->first('tel') }}</strong>
								</div>
							@endif
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