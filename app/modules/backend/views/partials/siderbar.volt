<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/assets/static/adminlte/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>Frank Yuan</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="搜索...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="header">主导航</li>
        <li class="active treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>仪表盘</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="active"><a href="/backend"><i class="fa fa-circle-o"></i> 首页</a></li>
                <li><a href="/backend/lockscreen"><i class="fa fa-circle-o"></i> 锁屏</a></li>
                <li><a href="/backend/session/end"><i class="fa fa-circle-o"></i> 退出</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>系统设置</span>
                <span class="pull-right-container">
                    <span class="label label-primary pull-right">4</span>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/system/gerenal"><i class="fa fa-circle-o"></i> 站点通过设置</a></li>
                <li><a href="/backend/system/ads"><i class="fa fa-circle-o"></i> 广告业务管理</a></li>
                <li><a href="/backend/system/links"><i class="fa fa-circle-o"></i> 友情链接管理</a></li>
                <li><a href="/backend/system/interfaces"><i class="fa fa-circle-o"></i> 通过接口设置</a></li>
                <li><a href="/backend/system/payment"><i class="fa fa-circle-o"></i> 支付账户设置</a></li>
                <li><a href="/backend/system/trade"><i class="fa fa-circle-o"></i> 业务参数设置</a></li>
            </ul>
        </li>
        <li>
            <a href="/backend/nav/index">
                <i class="fa fa-th"></i> <span>导航管理</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-green">重要</small>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/nav/index"><i class="fa fa-circle-o"></i> 导航列表</a></li>
                <li><a href="/backend/nav/frontend"><i class="fa fa-circle-o"></i> 前台导航</a></li>
                <li><a href="/backend/nav/user"><i class="fa fa-circle-o"></i> 会员导航</a></li>
                <li><a href="/backend/nav/backend"><i class="fa fa-circle-o"></i> 后台导航</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/member/index">
                <i class="fa fa-pie-chart"></i>
                <span>会员管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/members/index"><i class="fa fa-circle-o"></i> 会员列表</a></li>
                <li><a href="/backend/members/info"><i class="fa fa-circle-o"></i> 详细资料</a></li>
                <li><a href="/backend/members/finicial"><i class="fa fa-circle-o"></i> 财务信息</a></li>
                <li><a href="/backend/members/tech"><i class="fa fa-circle-o"></i> 技能信息</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/contents/types">
                <i class="fa fa-laptop"></i>
                <span>内容管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/contents/types"><i class="fa fa-circle-o"></i> 内容列表</a></li>
                <li><a href="/backend/post/tags"><i class="fa fa-circle-o"></i> 标签分类</a></li>
                <li><a href="/backend/post/filter"><i class="fa fa-circle-o"></i> 内容过滤</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/post/index">
                <i class="fa fa-laptop"></i>
                <span>问答管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/post/index"><i class="fa fa-circle-o"></i> 内容列表</a></li>
                <li><a href="/backend/post/comments"><i class="fa fa-circle-o"></i> 评论列表</a></li>
                <li><a href="/backend/post/category"><i class="fa fa-circle-o"></i> 栏目分类</a></li>
                <li><a href="/backend/post/tags"><i class="fa fa-circle-o"></i> 标签分类</a></li>
                <li><a href="/backend/post/search"><i class="fa fa-circle-o"></i> 内容检索</a></li>
                <li><a href="/backend/post/sort"><i class="fa fa-circle-o"></i> 内容排行</a></li>
                <li><a href="/backend/post/filter"><i class="fa fa-circle-o"></i> 内容过滤</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/trade/index">
                <i class="fa fa-edit"></i> <span>交易管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/trade/index"><i class="fa fa-circle-o"></i> 交易列表</a></li>
                <li><a href="/backend/trade/debet"><i class="fa fa-circle-o"></i> 交易审核</a></li>
                <li><a href="/backend/trade/comments"><i class="fa fa-circle-o"></i> 交易评价</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/payment/index">
                <i class="fa fa-table"></i> <span>支付管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/payment/index"><i class="fa fa-circle-o"></i> 充值管理</a></li>
                <li><a href="/backend/payment/withdraw"><i class="fa fa-circle-o"></i> 提现管理</a></li>
                <li><a href="/backend/payment/transfer"><i class="fa fa-circle-o"></i> 转账管理</a></li>
            </ul>
        </li>
        <li>
            <a href="/backend/data/index">
                <i class="fa fa-calendar"></i> <span>数据统计</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-red">3%</small>
                    <small class="label pull-right bg-blue">17%</small>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/data/member"><i class="fa fa-circle-o"></i> 用户统计</a></li>
                <li><a href="/backend/data/visitor"><i class="fa fa-circle-o"></i> 访客统计</a></li>
                <li><a href="/backend/data/trade"><i class="fa fa-circle-o"></i> 交易统计</a></li>
                <li><a href="/backend/data/money"><i class="fa fa-circle-o"></i> 资金统计</a></li>
                <li><a href="/backend/data/payment"><i class="fa fa-circle-o"></i> 支付统计</a></li>
            </ul>
        </li>
        <li>
            <a href="/backend/notify/index">
                <i class="fa fa-envelope"></i> <span>通知管理</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    <small class="label pull-right bg-green">16</small>
                    <small class="label pull-right bg-red">5</small>
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="/backend/logs/index">
                <i class="fa fa-folder"></i> <span>日志管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/logs/login"><i class="fa fa-circle-o"></i> 后台登陆日志</a></li>
                <li><a href="/backend/logs/manage"><i class="fa fa-circle-o"></i> 管理操作日志</a></li>
                <li><a href="/backend/logs/system"><i class="fa fa-circle-o"></i> 系统日志信息</a></li>
                <li><a href="/backend/logs/request"><i class="fa fa-circle-o"></i> 网站请求日志</a></li>
                <li><a href="/backend/logs/visitor"><i class="fa fa-circle-o"></i> 访客日志管理</a></li>
                <li><a href="/backend/logs/error404"><i class="fa fa-circle-o"></i> 404错误</a></li>
                <li><a href="/backend/logs/error500"><i class="fa fa-circle-o"></i> 500错误</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/users/index">
                <i class="fa fa-share"></i> <span>管理员</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/users/index"><i class="fa fa-circle-o"></i> 管理员</a></li>
                <li><a href="/backend/usergroups/index"><i class="fa fa-circle-o"></i> 用户组</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-share"></i> <span>多级菜单</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One</a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-circle-o"></i> Level One
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                        <li>
                            <a href="#"><i class="fa fa-circle-o"></i> Level Two
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-circle-o"></i> Level One</a>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/backend/market/index">
                <i class="fa fa-book"></i> <span>营销管理</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/backend/market/login"><i class="fa fa-circle-o"></i> 后台登陆日志</a></li>
                <li><a href="/backend/market/manage"><i class="fa fa-circle-o"></i> 管理操作日志</a></li>
                <li><a href="/backend/market/system"><i class="fa fa-circle-o"></i> 系统日志信息</a></li>
                <li><a href="/backend/market/request"><i class="fa fa-circle-o"></i> 网站请求日志</a></li>
                <li><a href="/backend/market/visitor"><i class="fa fa-circle-o"></i> 访客日志管理</a></li>
            </ul>
        </li>
        <li class="header">层级</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>警告</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>信息</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->