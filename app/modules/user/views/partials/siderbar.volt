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
                <li><a href="/user/lockscreen"><i class="fa fa-circle-o"></i> 锁屏</a></li>
                <li><a href="/frontend/account/end"><i class="fa fa-circle-o"></i> 退出</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-files-o"></i>
                <span>个人设置</span>
                <span class="pull-right-container">
                    <span class="label label-primary pull-right">4</span>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/setting/profiles"><i class="fa fa-circle-o"></i> 个人信息</a></li>
                <li><a href="/user/setting/password"><i class="fa fa-circle-o"></i> 密码管理</a></li>
                <li><a href="/user/setting/interfaces"><i class="fa fa-circle-o"></i> 头像管理</a></li>
                <li><a href="/user/setting/payment"><i class="fa fa-circle-o"></i> 支付管理</a></li>
                <li><a href="/user/setting/bind"><i class="fa fa-circle-o"></i> 账号绑定</a></li>
                <li><a href="/user/setting/privacy"><i class="fa fa-circle-o"></i> 隐私设置</a></li>
                <li><a href="/user/setting/message"><i class="fa fa-circle-o"></i> 消息设置</a></li>
                <li><a href="/user/setting/prefer"><i class="fa fa-circle-o"></i> 偏好设置</a></li>
                <li><a href="/user/setting/links"><i class="fa fa-circle-o"></i> 友情链接</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/users/index">
                <i class="fa fa-share"></i> <span>学院管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/collage/join"><i class="fa fa-circle-o"></i> 我加入的学院</a></li>
                <li><a href="/user/collage/create"><i class="fa fa-circle-o"></i> 我创建的学院</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/member/index">
                <i class="fa fa-pie-chart"></i>
                <span>问答管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/member/index"><i class="fa fa-circle-o"></i> 会员列表</a></li>
                <li><a href="/user/member/info"><i class="fa fa-circle-o"></i> 详细资料</a></li>
                <li><a href="/user/member/finicial"><i class="fa fa-circle-o"></i> 财务信息</a></li>
                <li><a href="/user/member/tech"><i class="fa fa-circle-o"></i> 技能信息</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/post/index">
                <i class="fa fa-laptop"></i>
                <span>投票管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/post/index"><i class="fa fa-circle-o"></i> 内容列表</a></li>
                <li><a href="/user/post/comments"><i class="fa fa-circle-o"></i> 评论列表</a></li>
                <li><a href="/user/post/category"><i class="fa fa-circle-o"></i> 栏目分类</a></li>
                <li><a href="/user/post/tags"><i class="fa fa-circle-o"></i> 标签分类</a></li>
                <li><a href="/user/post/search"><i class="fa fa-circle-o"></i> 内容检索</a></li>
                <li><a href="/user/post/sort"><i class="fa fa-circle-o"></i> 内容排行</a></li>
                <li><a href="/user/post/filter"><i class="fa fa-circle-o"></i> 内容过滤</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/post/index">
                <i class="fa fa-laptop"></i>
                <span>知识管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/post/index"><i class="fa fa-circle-o"></i> 内容列表</a></li>
                <li><a href="/user/post/comments"><i class="fa fa-circle-o"></i> 评论列表</a></li>
                <li><a href="/user/post/category"><i class="fa fa-circle-o"></i> 栏目分类</a></li>
                <li><a href="/user/post/tags"><i class="fa fa-circle-o"></i> 标签分类</a></li>
                <li><a href="/user/post/search"><i class="fa fa-circle-o"></i> 内容检索</a></li>
                <li><a href="/user/post/sort"><i class="fa fa-circle-o"></i> 内容排行</a></li>
                <li><a href="/user/post/filter"><i class="fa fa-circle-o"></i> 内容过滤</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/trade/index">
                <i class="fa fa-edit"></i> <span>交易管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/trade/index"><i class="fa fa-circle-o"></i> 交易列表</a></li>
                <li><a href="/user/trade/debet"><i class="fa fa-circle-o"></i> 交易审核</a></li>
                <li><a href="/user/trade/comments"><i class="fa fa-circle-o"></i> 交易评价</a></li>
            </ul>
        </li>
        <li class="treeview">
            <a href="/user/payment/index">
                <i class="fa fa-table"></i> <span>支付管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/payment/index"><i class="fa fa-circle-o"></i> 充值管理</a></li>
                <li><a href="/user/payment/withdraw"><i class="fa fa-circle-o"></i> 提现管理</a></li>
                <li><a href="/user/payment/transfer"><i class="fa fa-circle-o"></i> 转账管理</a></li>
            </ul>
        </li>
        <li>
            <a href="/user/data/index">
                <i class="fa fa-calendar"></i> <span>数据统计</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-red">3%</small>
                    <small class="label pull-right bg-blue">17%</small>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/data/member"><i class="fa fa-circle-o"></i> 用户统计</a></li>
                <li><a href="/user/data/visitor"><i class="fa fa-circle-o"></i> 访客统计</a></li>
                <li><a href="/user/data/trade"><i class="fa fa-circle-o"></i> 交易统计</a></li>
                <li><a href="/user/data/money"><i class="fa fa-circle-o"></i> 资金统计</a></li>
                <li><a href="/user/data/payment"><i class="fa fa-circle-o"></i> 支付统计</a></li>
            </ul>
        </li>
        <li>
            <a href="/user/notify/index">
                <i class="fa fa-envelope"></i> <span>通知管理</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-yellow">12</small>
                    <small class="label pull-right bg-green">16</small>
                    <small class="label pull-right bg-red">5</small>
                </span>
            </a>
        </li>
        <li class="treeview">
            <a href="/user/logs/index">
                <i class="fa fa-folder"></i> <span>日志管理</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/logs/login"><i class="fa fa-circle-o"></i> 后台登陆日志</a></li>
                <li><a href="/user/logs/manage"><i class="fa fa-circle-o"></i> 管理操作日志</a></li>
                <li><a href="/user/logs/system"><i class="fa fa-circle-o"></i> 系统日志信息</a></li>
                <li><a href="/user/logs/request"><i class="fa fa-circle-o"></i> 网站请求日志</a></li>
                <li><a href="/user/logs/visitor"><i class="fa fa-circle-o"></i> 访客日志管理</a></li>
                <li><a href="/user/logs/error404"><i class="fa fa-circle-o"></i> 404错误</a></li>
                <li><a href="/user/logs/error500"><i class="fa fa-circle-o"></i> 500错误</a></li>
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
            <a href="/user/market/index">
                <i class="fa fa-book"></i> <span>营销管理</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="/user/market/login"><i class="fa fa-circle-o"></i> 后台登陆日志</a></li>
                <li><a href="/user/market/manage"><i class="fa fa-circle-o"></i> 管理操作日志</a></li>
                <li><a href="/user/market/system"><i class="fa fa-circle-o"></i> 系统日志信息</a></li>
                <li><a href="/user/market/request"><i class="fa fa-circle-o"></i> 网站请求日志</a></li>
                <li><a href="/user/market/visitor"><i class="fa fa-circle-o"></i> 访客日志管理</a></li>
            </ul>
        </li>
        <li class="header">层级</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>重要</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>警告</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>信息</span></a></li>
    </ul>
</section>
<!-- /.sidebar -->