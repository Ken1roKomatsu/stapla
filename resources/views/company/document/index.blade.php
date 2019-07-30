@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/document/index.css') }}">
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
<div class="main__container">
    <div class="main__container__wrapper">
        <!--main__container__wrapperに記述していく-->
        <div class="page-title-container">
            <div class="page-title-container__page-title">書類一覧</div>
        </div>
        <div class="head-container">
            <div class="head-container__wrapper">
                <div class="head-container__wrapper__item-container">
                    <div class="head-container__wrapper__item-container__wrapper">
                        <div class="head-container__wrapper__item-container__wrapper__icon-container">
                            <div class="icon-imgbox"><img src="../../../images/invoice.png" alt=""></div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__content-container">
                            <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper">
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__text">請求書未対応</div>
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__number">{{ $invoices_0status->count() }}</div>
                            </div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__create-container">
                            <div class="head-container__wrapper__item-container__wrapper__create-container__create"><a href="">確認</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="head-container__wrapper">
                <div class="head-container__wrapper__item-container">
                    <div class="head-container__wrapper__item-container__wrapper">
                        <div class="head-container__wrapper__item-container__wrapper__icon-container">
                            <div class="icon-imgbox"><img src="../../../images/order.png" alt=""></div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__content-container">
                            <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper">
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__text">発注書未対応</div>
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__number">{{ $purchaseOrders_0status->count() }}</div>
                            </div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__create-container">
                            <div class="head-container__wrapper__item-container__wrapper__create-container__create"><a href="">確認</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="head-container__wrapper">
                <div class="head-container__wrapper__item-container">
                    <div class="head-container__wrapper__item-container__wrapper">
                        <div class="head-container__wrapper__item-container__wrapper__icon-container">
                            <div class="icon-imgbox"><img src="../../../images/non-disclosur.png" alt=""></div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__content-container">
                            <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper">
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__text">機密保持契約書未対応</div>
                                <div class="head-container__wrapper__item-container__wrapper__content-container__wrapper__number">{{ $ndas_0status->count() }}</div>
                            </div>
                        </div>
                        <div class="head-container__wrapper__item-container__wrapper__create-container">
                            <div class="head-container__wrapper__item-container__wrapper__create-container__create"><a href="">確認</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="main-container">
                <div class="main-container__wrapper">
                    <div class="item-name-wrapper">
                        <div class="item-name-wrapper__item-name">書類</div>
                    </div>
                    <div class="main-container__wrapper__table-container">
                        <div class="main-container__wrapper__table-container__wrapper">
                            <table class="document-table">
                                <tr class="document-table__head-row">
                                    <th class="document-table__head-row__table-header icon-th"></th>
                                    <th class="document-table__head-row__table-header">書類</th>
                                    <th class="document-table__head-row__table-header">未対応</th>
                                    <th class="document-table__head-row__table-header">他依頼中</th>
                                    <th class="document-table__head-row__table-header">パートナー依頼中</th>
                                    <th class="document-table__head-row__table-header">完了</th>
                                </tr>
                                <tr class="document-table__data-row">
                                    <td class="document-table__data-row__table-data"><div class="icon-imgbox"><img src="../../../images/invoice.png" alt=""></div></td>
                                    <td class="document-table__data-row__table-data doc-title">請求書</td>
                                    <td class="document-table__data-row__table-data">{{ $invoices_0status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $invoices_1status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $invoices_2status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $invoices_3status->count() }}件</td>
                                </tr>
                                <tr class="document-table__data-row">
                                    <td class="document-table__data-row__table-data"><div class="icon-imgbox"><img src="../../../images/order.png" alt=""></div></td>
                                    <td class="document-table__data-row__table-data doc-title">発注書</td>
                                    <td class="document-table__data-row__table-data">{{ $purchaseOrders_0status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $purchaseOrders_1status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $purchaseOrders_2status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $purchaseOrders_3status->count() }}件</td>
                                </tr>
                                <tr class="document-table__data-row">
                                    <td class="document-table__data-row__table-data"><div class="icon-imgbox"><img src="../../../images/non-disclosur.png" alt=""></div></td>
                                    <td class="document-table__data-row__table-data doc-title">機密保持契約書</td>
                                    <td class="document-table__data-row__table-data">{{ $ndas_0status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $ndas_1status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $ndas_2status->count() }}件</td>
                                    <td class="document-table__data-row__table-data">{{ $ndas_3status->count() }}件</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 請求書 -->
            <div class="main-container">
                <div class="main-container__wrapper">
                    <div class="item-name-wrapper icon-item-name-wrpper">
                        <div class="icon-imgbox"><img src="../../../images/invoice.png" alt=""></div>
                        <div class="item-name-wrapper__item-name">請求書</div>
                    </div>
                    <div class="main-container__wrapper__table-container">
                        <div class="main-container__wrapper__table-container__wrapper">
                        <table class="invoice-table">
                            <tr class="invoice-table__head-row">
                                <!-- <th class="invoice-table__head-row__table-header">ステータス</th> -->
                                <th class="invoice-table__head-row__table-header">タスク</th>
                                <th class="invoice-table__head-row__table-header">請求日</th>
                                <th class="invoice-table__head-row__table-header">担当者</th>
                                <th class="invoice-table__head-row__table-header">金額</th>
                                <th class="invoice-table__head-row__table-header">PDF</th>
                                <th class="invoice-table__head-row__table-header">作成</th>
                            </tr>
                            @foreach($invoices as $invoice)
                            <tr class="invoice-table__data-row">
                                <!-- <td class="invoice-table__data-row__table-data">
                                    @if($invoice->status === 0)
                                        未対応
                                    @elseif($invoice->status === 1)
                                        他依頼中
                                    @elseif($invoice->status === 2)
                                        パートナー依頼中
                                    @else
                                        完了
                                    @endif
                                </td> -->
                                
                                <td class="invoice-table__data-row__table-data task-data">{{ $invoice->task->name }}</td>
                                <td class="invoice-table__data-row__table-data">{{ explode(' ', $invoice->task->ended_at)[0] }}</td>
                                <td class="invoice-table__data-row__table-data staff-data">
                                    <div class="imgbox">
                                        <img src="../../../images/photoimg.png" alt="">
                                    </div>
                                    <div class="name">
                                    @foreach($invoice->task->taskCompanies as $taskCompany)
                                        {{ $taskCompany->companyUser->name }}
                                    @endforeach
                                    </div>
                                </td>
                                <td class="invoice-table__data-row__table-data">{{ $invoice->task->price }}</td>
                                <td class="invoice-table__data-row__table-data">○</td>
                                <td class="invoice-table__data-row__table-data">
                                    <div class="invoice-table__data-row__table-data__create-container">
                                        <div class="invoice-table__data-row__table-data__create-container__create">
                                            @if($invoice->status === 3)
                                                <a href="document/invoice/create">詳細</a>
                                            @else
                                                <a href="document/invoice/create">作成</a>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                        <!-- Show More部分 -->
                        <div class="more-container">
                            <div class="more-container__wrapper">
                                <p id="invoiceShowMoreBtn" class="more-container__wrapper__showmore">もっと見る</p>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
             <!-- 発注書 -->
             <div class="main-container">
                <div class="main-container__wrapper">
                    <div class="item-name-wrapper icon-item-name-wrpper">
                    <div class="icon-imgbox"><img src="../../../images/order.png" alt=""></div>
                        <div class="item-name-wrapper__item-name">発注書</div>
                    </div>
                    <div class="main-container__wrapper__table-container">
                        <div class="main-container__wrapper__table-container__wrapper">
                            <table class="order-table">
                                <tr class="order-table__head-row">
                                    <!-- <th class="order-table__head-row__table-header">ステータス</th> -->
                                    <th class="order-table__head-row__table-header">タスク</th>
                                    <th class="order-table__head-row__table-header">請求日</th>
                                    <th class="order-table__head-row__table-header">担当者</th>
                                    <th class="order-table__head-row__table-header">金額</th>
                                    <th class="order-table__head-row__table-header">PDF</th>
                                    <th class="order-table__head-row__table-header">作成</th>
                                </tr>
                                @foreach($purchaseOrders as $purchaseOrder)
                                <tr class="order-table__data-row">
                                    <!-- <td class="order-table__data-row__table-data">
                                        @if($purchaseOrder->status === 0)
                                            未対応
                                        @elseif($purchaseOrder->status === 1)
                                            他依頼中
                                        @elseif($purchaseOrder->status === 2)
                                            パートナー依頼中
                                        @else
                                            完了
                                        @endif
                                    </td> -->
                                    <td class="order-table__data-row__table-data task-data">{{ $purchaseOrder->task_name }}</td>
                                    <td class="order-table__data-row__table-data">{{ explode(' ', $purchaseOrder->task_ended_at)[0] }}</td>
                                    <td class="order-table__data-row__table-data staff-data">
                                        <div class="imgbox">
                                            <img src="../../../images/photoimg.png" alt="">
                                        </div>
                                        <div class="name">
                                            {{ $purchaseOrder->company_user_name }}
                                        </div>
                                    </td>
                                    <td class="order-table__data-row__table-data">{{ $purchaseOrder->task->price }}</td>
                                    <td class="order-table__data-row__table-data">○</td>
                                    <td class="order-table__data-row__table-data">
                                        <div class="order-table__data-row__table-data__create-container">
                                            <div class="order-table__data-row__table-data__create-container__create">
                                                @if($purchaseOrder->status === 3)
                                                    <a href="document/invoice/create">詳細</a>
                                                @else
                                                    <a href="document/invoice/create">作成</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <!-- Show More部分 -->
                            <div class="more-container">
                                <div class="more-container__wrapper">
                                    <p id="orderShowMoreBtn" class="more-container__wrapper__showmore">もっと見る</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 機密保持契約書 -->
            <div class="main-container">
                <div class="main-container__wrapper">
                    <div class="item-name-wrapper icon-item-name-wrpper">
                    <div class="icon-imgbox"><img src="../../../images/non-disclosur.png" alt=""></div>
                        <div class="item-name-wrapper__item-name">機密保持契約書</div>
                    </div>
                    <div class="main-container__wrapper__table-container">
                        <div class="main-container__wrapper__table-container__wrapper">
                            <table class="nda-table">
                                <tr class="nda-table__head-row">
                                    <!-- <th class="nda-table__head-row__table-header">ステータス</th> -->
                                    <th class="nda-table__head-row__table-header">タスク</th>
                                    <th class="nda-table__head-row__table-header">請求日</th>
                                    <th class="nda-table__head-row__table-header">担当者</th>
                                    <th class="nda-table__head-row__table-header">金額</th>
                                    <th class="nda-table__head-row__table-header">PDF</th>
                                    <th class="nda-table__head-row__table-header">作成</th>
                                </tr>
                                @foreach($ndas as $nda)
                                <tr class="nda-table__data-row">
                                    <!-- <td class="nda-table__data-row__table-data">
                                        @if($nda->status === 0)
                                            未対応
                                        @elseif($nda->status === 1)
                                            他依頼中
                                        @elseif($nda->status === 2)
                                            パートナー依頼中
                                        @else
                                            完了
                                        @endif
                                    </td> -->
                                    <td class="nda-table__data-row__table-data task-data">{{ $nda->task->name }}</td>
                                    <td class="nda-table__data-row__table-data">{{ explode(' ', $nda->task->ended_at)[0] }}</td>
                                    <td class="nda-table__data-row__table-data staff-data">
                                        <div class="imgbox">
                                            <img src="../../../images/photoimg.png" alt="">
                                        </div>
                                        <div class="name">
                                            @foreach($nda->task->taskCOmpanies as $taskCompany)
                                                {{ $taskCompany->companyUser->name }}
                                            @endforeach
                                        </div>
                                    </td>
                                    <td class="nda-table__data-row__table-data">{{ $nda->task->price }}</td>
                                    <td class="nda-table__data-row__table-data">○</td>
                                    <td class="nda-table__data-row__table-data">
                                        <div class="nda-table__data-row__table-data__create-container">
                                            <div class="nda-table__data-row__table-data__create-container__create">
                                                @if($nda->status === 3)
                                                    <a href="document/invoice/create">詳細</a>
                                                @else
                                                    <a href="document/invoice/create">作成</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                            <!-- Show More部分 -->
                            <div class="more-container">
                                <div class="more-container__wrapper">
                                    <p id="ndaShowMoreBtn" class="more-container__wrapper__showmore">もっと見る</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
