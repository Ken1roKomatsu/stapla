@extends('company.index')

@section('assets')
<link rel="stylesheet" href="{{ mix('css/company/common/index.css') }}">
<link rel="stylesheet" href="{{ mix('css/company/document/nda/create.css') }}">
<script>
const setPreview = (input) => {
  const preview = document.getElementById('preview');
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = (e) => {
      preview.src = e.target.result;
    }
    reader.readAsDataURL(input.files[0]);
  }
}
</script>
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
                        <!-- <i class="fas fa-home"></i> -->
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
                        <!-- <i class="fas fa-chart-bar"></i> -->
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
                        <!-- <i class="fas fa-envelope"></i> -->
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_inbox.png" alt="">
                        </div>
                        <div class="textbox">
                            プロジェクト
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/task">
                        <!-- <i class="fas fa-tasks"></i> -->
                        <div class="icon-imgbox">
                            <img src="../../../images/icon_products.png" alt="">
                        </div>
                        <div class="textbox">
                            タスク
                        </div>
                    </a>
                </li>
                <li>
                    <a href="/company/document" class="isActive">
                        <!-- <i class="fas fa-newspaper"></i> -->
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
                        <!-- <i class="fas fa-user-circle"></i> -->
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
                        <!-- <i class="fas fa-calendar-alt"></i> -->
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
                        <!-- <i class="fas fa-question"></i> -->
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
                        <!-- <i class="fas fa-cog"></i> -->
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
        <!--main__container__wrapperに記述していく-->
        <div class="page-title-container">
            <div class="page-title-container__page-title">機密保持契約書</div>
        </div>
        <div class="main-container">
            <form action="{{ url('company/document/nda') }}" method="post">
            @csrf
                <div class="main-container__wrapper">
                    <!-- タスク -->
                    <dl>
                        <dt>
                            タスク
                        </dt>
                        <dd>
                        <div class="select-container">
                            <div class="select-container__wrapper select-arrow">
                                <select class="select-container__wrapper__select" name="task_id">
                                    <option disabled selected></option>
                                    <option disabled>-- 機密保持契約書 未作成 --</option>
                                    @foreach($ndaUnDoneTasks as $ndaUnDoneTask)
                                    <option value="{{ $ndaUnDoneTask->id }}">{{ $ndaUnDoneTask->name }}　[ {{ $ndaUnDoneTask->project->name }} ]</option>
                                    @endforeach
                                    <option disabled>-- 機密保持契約書 作成済み --</option>
                                    @foreach($ndaDoneTasks as $ndaDoneTask)
                                    <option value="{{ $ndaDoneTask->id }}">* {{ $ndaDoneTask->name }}　[ {{ $ndaDoneTask->project->name }} ]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        </dd>
                    </dl>
                    <!-- 担当者 -->
                    <dl>
                        <dt>
                            担当者
                        </dt>
                        <dd>
                        <div class="select-container">
                            <div class="select-container__wrapper select-plusicon">
                                <select class="select-container__wrapper__select" name='companyUser_id'>
                                    <option disabled selected></option>
                                    @foreach($companyUsers as $companyUser)
                                    <option value="{{ $companyUser->id }}">{{ $companyUser->name }}</option>
                                    @endforeach                            
                                </select>
                            </div>
                        </div>
                        </dd>
                    </dl>
                    <!-- パートナー -->
                    <dl class="last">
                        <dt>
                            パートナー
                        </dt>
                        <dd>
                        <div class="select-container">
                            <div class="select-container__wrapper select-plusicon">
                                <select class="select-container__wrapper__select" name='partner_id'>
                                    <option disabled selected></option>
                                    @foreach($partners as $partner)
                                    <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach                            
                                </select>
                            </div>
                        </div>
                        </dd>
                    </dl>
                    
                </div>

                <!-- 作成ボタン -->
                <div class="button-container">
                    <button type="submit">作成</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection