@extends('partner.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/pdf/paper.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/partner/document/invoice/show.css') }}">
@endsection

@section('content')
<div class="main-wrapper">
	<div class="title-container">
		<h3>請求書プレビュー</h3>
		<!-- downloadボタン -->
		<div class="download-btn-container">
			<a id="print_btn" class="button download-button">ダウンロード</a>
		</div>
	</div>
	<div id="print" class="document-container A4">
		<!-- 印刷用 -->
		<div class="pageout">
			<div id="pdf_content" class="document-container__wrapper sheet padding-10mm">
				<div class="title-container">
					<h4>請求書</h4>
				</div>
		
				<div class="company-container">
					<div class="left">
						<p>〒{{ substr($invoice->company->zip_code, 0, 3) . "-" . substr($invoice->company->zip_code, 3) }}</p>
						<p>{{ $invoice->company->address_prefecture }}{{ $invoice->company->address_city }}{{ $invoice->company->address_building }}</p>
						<p>{{ $invoice->company->company_name }}</p>
						@if($invoice->billing_to_text)
						<p>{{ $invoice->billing_to_text }}様</p>
						@else
						<p>{{ $invoice->companyUser->name }}様</p>
						@endif  
					</div>
		
					<div class="right">
						<p>発注日: {{ date("Y年m月d日", strtotime($invoice->requested_at)) }}</p>
						<p>{{ $invoice->partner->name }}</p>
						<p>{{ $invoice->partner->prefecture }}{{ $invoice->partner->city }}{{ $invoice->partner->building }}</p>
					</div>
				</div>
		
				<div class="invoice-container">
					<table>
						<thead>
							<tr>
								<th>商品名</th>
								<th>数量</th>
								<th>単価</th>
								<th>税区分</th>
								<th>合計</th>
							</tr>
						</thead>
		
						<tbody>
							@foreach($invoice->requestTasks as $requestTask)
								<tr>
									<td>{{ $requestTask->name }}</td>
									<td>{{ $requestTask->num }}</td>
									<td>{{ number_format($requestTask->unit_price) }}</td>
									@if($requestTask->tax == 1.10)
									<td>10%</td>
									@elseif($requestTask->tax == 1.08)
									<td>軽減8%</td>
									@else
									<td>非課税</td>
									@endif
									<td>{{ number_format($requestTask->total) }}</td>
								</tr>
							@endforeach
		
							@foreach($invoice->requestExpences as $requestExpence)
								<tr>
									<td>{{ $requestExpence->name }}</td>
									<td>{{ $requestExpence->num }}</td>
									<td>{{ number_format($requestExpence->unit_price) }}</td>
									@if($requestExpence->tax == 1.10)
									<td>10%</td>
									@elseif($requestExpence->tax == 1.08)
									<td>軽減8%</td>
									@else
									<td>非課税</td>
									@endif
									<td>{{ number_format($requestExpence->total) }}</td>
								</tr>
							@endforeach
							@if ((count($invoice->requestTasks) + count($invoice->requestExpences)) < 6) 
								@for ($i = 0; $i < 6 - (count($invoice->requestTasks) + count($invoice->requestExpences)); $i++)
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								@endfor
							@endif
						</tbody>
					</table>
		
					<div class="total-container">
						<div class="text-container">
							<p>合計</p>
						</div>
		
						<div class="section-container">
							<p class="sub-column">税抜</p>
							<p>{{ number_format($total_sum_notax) }}</p>
						</div>
		
						<div class="section-container">
							<p class="sub-column">消費税</p>
							<p>{{ number_format($total_sum - $total_sum_notax) }}</p>
						</div>
		
						<div class="section-container">
							<p class="sub-column">総額</p>
							<p class="total-text">{{ number_format($total_sum) }}</p>
						</div>
					</div>
		
					<div class="sub-container">
						<span>備考</span>
					</div>
				</div>
		
				<div class="deadline-container">
					<div class="header-container">
						<p>ご入金期限: {{ date("Y年m月d日", strtotime($invoice->deadline_at)) }}</p>
					</div>
		
					<div class="content-container">
						<p>お振込み先: {{ Auth::user()->partnerInvoice->account_holder }}</p>
						<p>{{ Auth::user()->partnerInvoice->financial_institution }} {{ Auth::user()->partnerInvoice->branch }} ({{ Auth::user()->partnerInvoice->deposit_type }}) {{ Auth::user()->partnerInvoice->account_number }}</p>
					</div>
				</div>
			</div>
		</div>
		
		<!-- 表示用 -->
		<div class="document-container__wrapper sheet padding-10mm">
			<div class="title-container">
				<h4>請求書</h4>
			</div>
	
			<div class="company-container">
				<div class="left">
					<p>〒{{ substr($invoice->company->zip_code, 0, 3) . "-" . substr($invoice->company->zip_code, 3) }}</p>
					<p>{{ $invoice->company->address_prefecture }}{{ $invoice->company->address_city }}{{ $invoice->company->address_building }}</p>
					<p>{{ $invoice->company->company_name }}</p>
					@if($invoice->billing_to_text)
					<p>{{ $invoice->billing_to_text }}様</p>
					@else
					<p>{{ $invoice->companyUser->name }}様</p>
					@endif  
				</div>
	
				<div class="right">
					<p>発注日: {{ date("Y年m月d日", strtotime($invoice->requested_at)) }}</p>
					<p>{{ $invoice->partner->name }}</p>
					<p>{{ $invoice->partner->prefecture }}{{ $invoice->partner->city }}{{ $invoice->partner->building }}</p>
				</div>
			</div>
	
			<div class="invoice-container">
				<table>
					<thead>
						<tr>
							<th>商品名</th>
							<th>数量</th>
							<th>単価</th>
							<th>税区分</th>
							<th>合計</th>
						</tr>
					</thead>
	
					<tbody>
						@foreach($invoice->requestTasks as $requestTask)
							<tr>
								<td>{{ $requestTask->name }}</td>
								<td>{{ $requestTask->num }}</td>
								<td>{{ number_format($requestTask->unit_price) }}</td>
								@if($requestTask->tax == 1.10)
								<td>10%</td>
								@elseif($requestTask->tax == 1.08)
								<td>軽減8%</td>
								@else
								<td>非課税</td>
								@endif
								<td>{{ number_format($requestTask->total) }}</td>
							</tr>
						@endforeach
	
						@foreach($invoice->requestExpences as $requestExpence)
							<tr>
								<td>{{ $requestExpence->name }}</td>
								<td>{{ $requestExpence->num }}</td>
								<td>{{ number_format($requestExpence->unit_price) }}</td>
								@if($requestExpence->tax == 1.10)
								<td>10%</td>
								@elseif($requestExpence->tax == 1.08)
								<td>軽減8%</td>
								@else
								<td>非課税</td>
								@endif
								<td>{{ number_format($requestExpence->total) }}</td>
							</tr>
						@endforeach

						@if ((count($invoice->requestTasks) + count($invoice->requestExpences)) < 6) 
							@for ($i = 0; $i < 6 - (count($invoice->requestTasks) + count($invoice->requestExpences)); $i++)
							<tr>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endfor
						@endif
					</tbody>
				</table>
	
				<div class="total-container">
					<div class="text-container">
						<p>合計</p>
					</div>
	
					<div class="section-container">
						<p class="sub-column">税抜</p>
						<p>{{ number_format($total_sum_notax) }}</p>
					</div>
					
					<div class="section-container">
						<p class="sub-column">消費税</p>
						<p>{{ number_format($total_sum - $total_sum_notax) }}</p>
					</div>
	
					<div class="section-container">
						<p class="sub-column">総額</p>
						<p class="total-text">{{ number_format($total_sum) }}</p>
					</div>
				</div>
	
				<div class="sub-container">
					<span>備考</span>
				</div>
			</div>
	
			<div class="deadline-container">
				<div class="header-container">
					<p>ご入金期限: {{ date("Y年m月d日", strtotime($invoice->deadline_at)) }}</p>
				</div>
	
				<div class="content-container">
					<p>お振込み先: {{ Auth::user()->partnerInvoice->account_holder }}</p>
					<p>{{ Auth::user()->partnerInvoice->financial_institution }} {{ Auth::user()->partnerInvoice->branch }} ({{ Auth::user()->partnerInvoice->deposit_type }}) {{ Auth::user()->partnerInvoice->account_number }}</p>
				</div>
			</div>
		</div>
	</div>

	@if($task->status === 12 && $task->partner->id === Auth::user()->id)
		<div class="actionButton">
			<a href="{{ route('partner.document.invoice.edit', ['id' => $invoice->id]) }}" class="undone">作り直す</a>
			<form action="{{ route('partner.task.status.change') }}" method="POST">
			@csrf
				<input type="hidden" name="task_id" value="{{ $invoice->task->id }}">
				<input type="hidden" name="status" value="13">
				<input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
				<button type="button" class="done confirm" data-toggle="modal" data-target="#exampleModalCenter">送信</button>
				<!-- Modal -->
				<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<button type="button" class="close text-right" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
							<div class="modal-header border border-0">
								<h5 class="center-block" id="exampleModalLabel">確認</h5>
							</div>
							<div class="modal-body">
								<p class="text-center">{{ $task->companyUser->name }} さんに請求書の確認を依頼します。</p>
								<p class="text-center">よろしいですか？</p>
							</div>
							<div class="modal-footer center-block  border border-0">
								<button type="button" class="undone confirm-btn confirm-undone" data-dismiss="modal">キャンセル</button>
								<button type="submit" class="done confirm-btn confirm-done" name="confirm-btn" >依頼</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	@elseif($task->status > 12 && $task->partner->id === Auth::user()->id)
		<p class="send-done">この請求書は提出済みです</p>
	@else
		<p class="send-done">必要なアクションはありません</p>
	@endif

	<div class="error-message-wrapper">
		@if ($errors->has('task_id'))
			<div class="error-msg" role="alert">
				<strong>{{ $errors->first('task_id') }}</strong>
			</div>
		@endif
		@if ($errors->has('status') && !$errors->has('task_id'))
			<div class="error-msg" role="alert">
				<strong>{{ $errors->first('status') }}</strong>
			</div>
		@endif
	</div>
</div>
@endsection

@section('asset-js')
    <script src="{{ asset('js/pdf.js') }}" defer></script>
@endsection
