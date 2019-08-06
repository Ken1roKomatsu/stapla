@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/document/invoice/show.css') }}">
@endsection

@section('header-profile')
<div class="navbar-item">
    {{ $company_user->name }}
</div>
<div class="navbar-item">
    <img src="/{{ str_replace('public/', 'storage/', $company_user->picture) }}" alt="プロフィール画像">
</div>
@endsection

@section('sidebar')
<div class="sidebar__container">
    <div class="sidebar__container__wrapper">
        <aside class="menu menu__container">
            <div class="menu__container--label">
                <div class="menu-label">
                    <img src="../../../images/logo.png" alt="logo">
                </div>
            </div>
            <ul class="menu-list menu menu__container__menu-list">
                <li><a href="#"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="/company/dashboard"><i class="fas fa-chart-bar"></i>Dashboard</a></li>
                <li><a href="/company/project"><i class="fas fa-envelope"></i>プロジェクト</a></li>
                <li><a href="/company/task"><i class="fas fa-tasks"></i>タスク</a></li>
                <li class="isActive"><a href="/company/document"><i class="fas fa-newspaper"></i>書類</a></li>
                <li><a href="/company/partner"><i class="fas fa-user-circle"></i>パートナー</a></li>
                <li><a href="#"><i class="fas fa-calendar-alt"></i>Calendar</a></li>
                <li><a href="#"><i class="fas fa-question"></i>Heip Center</a></li>
                <li><a href="/company/setting/general"><i class="fas fa-cog"></i>設定</a></li>
                <li>
					<form method="POST" action="{{ route('company.logout') }}">
						@csrf
						<button type="submit">ログアウト</button>
					</form>
				</li>
            </ul>
        </aside>
    </div>
</div>
@endsection

@section('content')
<div class="main-wrapper">
	<div class="title-container">
		<h3>請求書</h3>

		<button type="button">印刷</button>
	</div>

	<div class="document-container">
		<div class="title-container">
			<h4>請求書</h4>
		</div>

		<div class="company-container">
			<div class="left">
				<p>〒{{ substr($invoice->company->zip_code, 0, 3) . "-" . substr($invoice->company->zip_code, 3) }}</p>
				<p>{{ $invoice->company->address_prefecture }}{{ $invoice->company->address_city }}{{ $invoice->company->address_building }}</p>
				<p>{{ $invoice->company->company_name }}</p>
				<p>{{ $invoice->companyUser->name }}様</p>
			</div>

			<div class="right">
				<p>発注日 : {{ $invoice->requested_at }}</p>
				<p>{{ $invoice->partner->name }}</p>
				<p>{{ $invoice->partner->prefecture }}{{ $invoice->partner->city }}{{ $invoice->partner->building }}</p>
			</div>
		</div>
		<div class="task-container">
			<p>タスク</p>
			<ul>
				<li>WebサービスiOS化</li>
				<li>バックエンドコーディング</li>
			</ul>

		</div>

		<div class="invoice-container">
			<table>
				<thead>
					<tr>
						<th>商品名</th>
						<th>数量</th>
						<th>単価</th>
						<th>合計</th>
					</tr>
				</thead>

				<tbody>
					@foreach($invoice->requestTasks as $requestTask)
						<tr>
							<td class="name">{{ $requestTask->name }}</td>
							<td>{{ $requestTask->num }}</td>
							<td>{{ number_format($requestTask->unit_price) }}</td>
							<td>{{ number_format($requestTask->total) }}</td>
						</tr>
					@endforeach

					@foreach($invoice->requestExpences as $requestExpence)
						<tr>
							<td class="name">{{ $requestExpence->name }}</td>
							<td>{{ $requestExpence->num }}</td>
							<td>{{ number_format($requestExpence->unit_price) }}</td>
							<td>{{ number_format($requestExpence->total) }}</td>
						</tr>
					@endforeach
					<tr>
						<td class="name">コーディング作業</td>
						<td>1</td>
						<td>30,000</td>
						<td>30,000</td>
					</tr>
					<tr>
						<td class="name"></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>

			<div class="total-container">
				<div class="text-container">
					<p>合計</p>
				</div>

				<div class="section-container">
					<p class="sub-column">税抜</p>
					@if ($invoice->tax === 0)
						<p>{{ number_format($total_sum) }}</p>
					@else
						<p>{{ number_format($total_sum / 1.08) }}</p>
					@endif
				</div>

				<div class="section-container">
					<p class="sub-column">消費税</p>
					@if ($invoice->tax === 0)
						<p>{{ number_format($total_sum * 0.08) }}</p>
					@else
						<p>{{ number_format($total_sum / 1.08 * 0.08) }}</p>
					@endif
				</div>

				<div class="section-container">
					<p class="sub-column">総額</p>
					@if ($invoice->tax === 0)
						<p class="total-text">{{ number_format($total_sum * 1.08) }}</p>
					@else
						<p class="total-text">{{ number_format($total_sum) }}</p>
					@endif
				</div>
			</div>

			<div class="sub-container">
				<span>備考</span>
			</div>
		</div>

		<div class="deadline-container">
			<div class="header-container">
				<p>ご入金期限 : {{ $invoice->deadline_at }}</p>
			</div>

			<div class="content-container">
				<p>お振込み先: {{ $partner->partnerInvoice->account_holder }}</p>
				<p>{{ $partner->partnerInvoice->financial_institution }} {{ $partner->partnerInvoice->branch }} ({{ $partner->partnerInvoice->deposit_type }}) {{ $partner->partnerInvoice->account_number }}</p>
			</div>
        </div>
	</div>

	@if($task->status === 12 && in_array($company_user->id, $company_user_ids))
	<div class="actiionButton">
		<form action="{{ url('company/task/status') }}" method="POST">
		@csrf
			<input type="hidden" name="task_id" value="{{ $invoice->task->id }}">
			<input type="hidden" name="status" value="11">
			<div class="button-container">
				<button class="undone" type="submit">請求書を拒否する</button>
			</div>
		</form>
		<form action="{{ url('company/task/status')}}" method="POST">
		@csrf
			<input type="hidden" name="task_id" value="{{ $invoice->task->id }}">
			<input type="hidden" name="status" value="13">
			<div class="button-container">
				<button class="done" type="submit">請求書を承認する</button>
			</div>
		</form>
	</div>
	@elseif($task->status > 12 && in_array($company_user->id, $company_user_ids))
	<p class="send-done">この請求書は承認済みです</p>
	@else
	<p class="send-done">必要なアクションはありません</p>
	@endif
</div>
@endsection
