@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/document/purchaseOrder/index.css') }}">
@endsection

@section('content')
<div class="main-wrapper">
	<div class="title-container">
		<h3>発注書作成</h3>
	</div>

	<form action="{{ route('company.document.purchaseOrder.store') }}" method="POST">
		@csrf
		<div class="purchaseOrder-container">
			
			<div class="form-container">
				<dl>
					<dt>
                        タスク
                    </dt>
					<dd>
                        <p>{{ $task->name }}</p>
                        <input type="hidden" name="task_id" value="{{ $task->id }}">
					</dd>
                </dl>
                
                <dl>
                    <dt>
                        件名
                        <span class="required-label">( 必須 )</span>
                    </dt>
                    <dd>
						<div class="input-container">
							<input class="task-name" type="text" name="task_name" value="{{ old('task_name', $task->name) }}">
						</div>
                        @if ($errors->has('task_name'))
                            <div class="error-msg">
                                <strong>{{ $errors->first('task_name') }}</strong>
                            </div>					
                        @endif
                    </dd>
                </dl>

                <dl>
					<dt>
                        納品日
                        <span class="required-label">( 必須 )</span>
                    </dt>
					<dd>
                        <div class="date-container">
                            <div class="calendars">
                                <div class="calendars__wrapper">
                                    <input
                                        type="date"
                                        name="task_ended_at"
                                        value="{{ old('task_ended_at', date('Y-m-d')) }}"
                                    >

                                    @if($errors->has('task_ended_at'))
                                        <div class="error-mes-wrp">
                                            <strong style='color: #e3342f;'>{{ $errors->first('task_ended_at') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>						
                        </div>
						
					</dd>
                </dl>
                <dl>
					<dt>
                        担当者
                    </dt>
					<dd>
						<div class="select-container">
                            <div class="select-arrow">
								<select name="companyUser_id" id="staff_name" onchange="selectStaff();">
									<option value="" hidden></option>
									@foreach($companyUsers as $companyUser)
										@if(old('companyUser_id'))
										<option value="{{ $companyUser->id }}" {{ old('companyUser_id') === $companyUser->id ? 'selected' : ''}}>{{ $companyUser->name }}</option>
										@else
										<option value="{{ $companyUser->id }}" {{ $task->companyUser->id === $companyUser->id ? 'selected' : ''}}>{{ $companyUser->name }}</option>
										@endif
									@endforeach
								</select>
							</div>
							<input type="button" value="×" onclick="setNonSelect('staff_name');">
                        </div>
						@if ($errors->has('companyUser_id'))
							<div class="error-msg">
								<strong>{{ $errors->first('companyUser_id') }}</strong>
							</div>					
						@endif
					</dd>
                </dl>

				<dl>
					<dt>担当者 (自由記入)</dt>
					<dd>
						<div class="input-container">
							<input type="text" name="billing_to_text" id="free_staff_name" disabled onchange="billingText();">
                        </div>
						@if ($errors->has('billing_to_text'))
							<div class="error-msg">
								<strong>{{ $errors->first('billing_to_text') }}</strong>
							</div>					
						@endif
					</dd>
                </dl>
                
                <dl>
                    <dt>パートナー</dt>
                    <dd>
                        <p>{{ $task->partner->name }}</p>
                        <input type="hidden" name="partner_id" value="{{ $task->partner_id }}">
					</dd>
                </dl>

			</div>
		</div>

		<div class="btn02-container">
			<button type="submit">作成</button>
		</div>
    </form>
    
</div>
@endsection

@section('asset-js')
<script>
	// 担当者が選択された場合、担当者(自由記入)の記入不可へ 
	function selectStaff() {
		var free_staff_name = document.getElementById('free_staff_name');
		free_staff_name.disabled = true;
	}
	// 担当者selectbox未選択状態へ
	function setNonSelect(idname){
		var selectedStaff = document.getElementById(idname);
		selectedStaff.selectedIndex = -1;
		free_staff_name.disabled = false;
	}

	// 担当者(自由記入) input記入不可状態へ
	function billingText(){
		var input_staff_name = document.getElementById('free_staff_name').value;
		if(input_staff_name != "") {
			staff_name.disabled = true;
		} else {
			staff_name.disabled = false;
		}
	}
	
</script>

@endsection
