@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/document/outsourceContract/create.css') }}">
@endsection

@section('content')
<div class="main-wrapper">
	<h3 class="main-wrapper__title">業務委託契約書の作成</h3>
	<form action="{{ route('company.document.outsource-contracts.store') }}" method="post" class="main-wrapper__content">
		@csrf
		<div class="field-wrapper">
			<div class="field">
				<label class="field__label">企業名<span class="field__label--require">（必須）</span></label>
				<input id="company_name" name="company_name" type="text" value="{{ $company->company_name }}" class="field__input form-control">
			</div>
			<div class="field">
				<label class="field__label">企業住所<span class="field__label--require">（必須）</span></label>
				<input id="company_address" name="company_address" type="text" value="{{ $company->address_prefecture. ' '.$company->address_city. ' '. $company->address_building}}" class="field__input form-control">
			</div>
			<div class="field">
				<label class="field__label">企業代表者名<span class="field__label--require">（必須）</span></label>
				<input id="representive_name" name="representive_name" type="text" value="{{ $company->representive_name }}" class="field__input form-control">
			</div>
			<div class="field">
				<label class="field__label">パートナー名<span class="field__label--require">（必須）</span></label>
				<input id="partner_name" name="partner_name" type="text" value="{{ $partner->name }}" class="field__input form-control">
			</div>
			<div class="field">
				<label class="field__label">パートナー住所<span class="field__label--require">（必須）</span></label>
				<input id="partner_address" name="partner_address" type="text" value="{{ $partner->prefecture. ' '.$partner->city. ' '. $partner->street. ' '. $partner->building}}" class="field__input form-control">
			</div>
			<div class="field">
				<label class="field__label">契約締結日<span class="field__label--require">（必須）</span></label>
				<i id="calender_icon" class="fas fa-calendar-alt calender-icon"></i>
				<input id="contract_date_input" name="contract_date" type="text" value="" class="field__input field__input--icon form-control">
			</div>
			<div class="control">
				<label class="field__label">裁判所<span class="field__label--require">（必須）</span></label>
				<div class="select is">
					<select id="court" name="court" class="form-control">
						<option disabled selected></option>
						@include('company.document.outsourceContract.components.court')
					</select>
				</div>
			</div>
			<input name="company_id" type="hidden" value="{{ $company->id }}">
			<input name="partner_id" type="hidden" value="{{ $partner->id }}">
		</div>
		<div class="contract-wrapper">
			<div class="contract">
				@include('company.document.outsourceContract.components.contract')
			</div>

			<button class="contract-wrapper__btn" data-impro-button="once" type="button" onclick="submit();">プレビューを確認する</button>
		</div>
	</form>
</div>
@endsection

@section('asset-js')
<script>
	const COMPANY_NAME = "{{ $company->company_name }}";
	const COMPANY_ADDRESS = "{{ $company->address_prefecture. ' '.$company->address_city. ' '. $company->address_building}}";
	const REPRESENTIVE_NAME = "{{ $company->representive_name }}";
	const PARTNER_NAME = "{{ $partner->name }}";
	const PARTNER_ADDRESS = "{{ $partner->prefecture. ' '.$partner->city. ' '. $partner->street. ' '. $partner->building}}";
</script>

<script src="{{ asset('js/pages/company/document/outsourceContract/create.js') }}" defer></script>
@endsection
