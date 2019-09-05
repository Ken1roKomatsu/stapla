@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/task/index.css') }}">
@endsection

@section('header-profile')
<div class="header-proflie">
    <div class="option">
        <div class="user-name">
            {{ $company_user->name }}
        </div>

        <div class="icon-imgbox">
            <img src="../../../images/icon_small-down.png" alt="">
        </div>
    </div>
    
    <div class="optionBox">
        <div class="balloon">
            <ul>
                <li><a href="">プロフィール設定</a></li>
                <li>
                    <form method="POST" action="{{ route('company.logout') }}">
                        @csrf
                        <button type="submit">ログアウト</button>
                    </form>
                </li>
            </ul>
        </div>
        
    </div>

    <div class="user-imgbox">
        <img src="/{{ str_replace('public/', 'storage/', $company_user->picture) }}" alt="プロフィール画像">
    </div>
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
                <li>
                    <a href="#">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_home.png" alt="">
                        </div>
                        <div class="textbox">
                            ホーム
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/dashboard">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_dashboard.png" alt="">
                        </div>
                        <div class="textbox">
                            ダッシュボード
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/project">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_inbox.png" alt="">
                        </div>
                        <div class="textbox">
                            プロジェクト
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/task" class="isActive">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_products.png" alt="">
                        </div>
                        <div class="textbox">
                            タスク
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/document">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_invoices.png" alt="">
                        </div>
                        <div class="textbox">
                            書類
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/partner">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_customers.png" alt="">
                        </div>
                        <div class="textbox">
                            パートナー
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_calendar.png" alt="">
                        </div>
                        <div class="textbox">
                            カレンダー
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_help-center.png" alt="">
                        </div>
                        <div class="textbox">
                            ヘルプセンター
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/setting/general">
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_setting.png" alt="">
                        </div>
                        <div class="textbox">
                            設定
                        </div>
                    </a>
                </li>
            </ul>
            
        </aside>
    </div>
</div>
@endsection

@section('content')
<div class="main__container">
    <div class="main__container__wrapper">
        <!-- page header -->
        <div class="top-container">
            <div class="page-title-container">
                <div class="page-title-container__page-title">タスク</div>
            </div>
        </div>
        <!-- ステータス -->
        <div class="status-container">
            <div class="status-container__wrapper">
                <!-- タイトル -->
                <div class="item-name-wrapper">
                    <div class="item-name-wrapper__item-name">ステータス</div>
                </div>
                <!-- ステータス表示部分 -->
                <div class="content">
                    <!-- ステータス各部分 -->
                    <ul class="parts-container">
                    @for($i = 0; $i < 14; $i++)
                        <li class="parts-container__wrapper"> 
                            <!-- ステータス名表示 -->
                            <div class="parts-container__wrapper__textdisplayarea">
                                <div class="parts-container__wrapper__textdisplayarea__textdisplay">
                                    <div class="parts-container__wrapper__textdisplayarea__textdisplay__text">
                                        {{ $statusName_arr[$i] }}
                                    </div>
                                </div>
                            </div>
                            <!-- ステータス表示数部分 -->
                            
                            <div class="parts-container__wrapper__numberdisplayarea">

                                <div class="parts-container__wrapper__numberdisplayarea__numberdisplay">
                                    <div class="parts-container__wrapper__numberdisplayarea__numberdisplay__number">
                                        {{ $status_arr[$i] }}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endfor
                    </ul>
                </div>
            </div>
        </div>
        <!-- Task -->
        <div class="task-container">
            <ul id="tab-button" class="tab-button">
                <li class="all"><a href="/company/task">タスク一覧</a></li>
                <li class="done isActive"><a href="/company/task/done">完了したタスク</a></li>
            </ul>
            <div class="task-container__createarea">
                <div class="task-container__createarea__buttonarea control">
                    <button class="task-container__createarea__buttonarea__button button"><a href="/company/task/create">タスク作成</a></button>
                </div>
            </div>
            <div class="task-container__wrapper">
                <!-- タイトル -->
                <div class="item-name-select-wrapper">
                    <div class="item-name-wrapper">
                        <div class="item-name-wrapper__item-name">タスク</div>
                    </div>
                    <!-- <div class="selectWrap">
                        <select class="select" name="" id="">
                            <option value="">全てのステータス</option>
                            <option value="">下書き</option>
                            <option value="">タスク上長確認前</option>
                            <option value="">タスク上長確認中</option>
                            <option value="">タスクパートナー依頼前</option>
                            <option value="">タスクパートナー依頼中</option>
                            <option value="">発注書作成中</option>
                            <option value="">発注書作成完了</option>
                            <option value="">発注書上長確認中</option>
                            <option value="">発注書パートナー依頼前</option>
                            <option value="">発注書パートナー確認中</option>
                            <option value="">作業中</option>
                            <option value="">請求書依頼中</option>
                            <option value="">請求書確認中</option>
                            <option value="">完了</option>
                            <option value="">キャンセル</option>
                        </select>
                    </div> -->
                </div>
                
                <div class="task-container__wrapper__table-wrapper">
                    <table class="task-container__wrapper__table-wrapper__table">
                        <!-- タイトルヘッダー部分 -->
                        <tr class="task-container__wrapper__table-wrapper__table__headerrow">
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">プロジェクト</th>
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">タスク</th>
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">パートナー</th>
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">ステータス</th>
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">請求額</th>
                            <th class="task-container__wrapper__table-wrapper__table__headerrow__tableheader">ステータス変更</th>
                        </tr>
                        <!-- テーブルデータ部分 -->
                        @foreach($tasks as $task)
                        <tr class="task-container__wrapper__table-wrapper__table__datarow">
                            
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata  project">{{ $task->project->name }}</td>
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata"><a href="/company/task/{{ $task->id }}">{{ $task->name }}</a></td>
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata">
                                    {{ $task->partner->name }}
                                </td>
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata">
                                    <div class="task-container__wrapper__table-wrapper__table__datarow__tabledata__statusaction">
                                        <div id ="state" class="task-container__wrapper__table-wrapper__table__datarow__tabledata__statusaction__status">
                                            @if($task->status == 0)
                                                <div class="color01">下書き</div>
                                            @elseif($task->status == 1)
                                                <div class="color01">タスク上長確認前</div>
                                            @elseif($task->status == 2)
                                                <div class="color01">タスク上長確認中</div>
                                            @elseif($task->status == 3)
                                                <div class="color01">タスクパートナー依頼前</div>
                                            @elseif($task->status == 4)
                                                <div class="color01">タスクパートナー依頼中</div>
                                            @elseif($task->status == 5)
                                                <div class="color01">発注書作成中</div>
                                            @elseif($task->status == 6)
                                                <div class="color01">発注書作成完了</div>
                                            @elseif($task->status == 7)
                                                <div class="color01">発注書上長確認中</div>
                                            @elseif($task->status == 8)
                                                <div class="color01">発注書パートナー依頼前</div>
                                            @elseif($task->status == 9)
                                                <div class="color01">発注書パートナー確認中</div>
                                            @elseif($task->status == 10)
                                                <div class="color01">作業中</div>
                                            @elseif($task->status == 11)
                                                <div class="color01">請求書依頼中</div>
                                            @elseif($task->status == 12)
                                                <div class="color01">請求書確認中</div>
                                            @elseif($task->status == 13)
                                                <div class="color02">完了</div>
                                            @elseif($task->status == 14)
                                                <div class="color03">キャンセル</div>
                                            @endif    
                                   
                                        </div>
                                    </div>
                                </td>
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata">¥{{ number_format($task->price) }}</td>
                                <td class="task-container__wrapper__table-wrapper__table__datarow__tabledata"><button><a href="">完了</a></button></td>
                        </tr>
                        @endforeach
                    </table>
                        <!-- Show More部分 -->
                        <div class="task-container__wrapper__table-wrapper__more">
                            <div class="task-container__wrapper__table-wrapper__more__area">
                                <p id="task-index_showmore-btn" class="task-container__wrapper__table-wrapper__more__area__showmore" >もっと見る</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
