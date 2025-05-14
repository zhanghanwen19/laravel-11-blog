# Build a blog with Laravel 11.*

## 📅 2025/05/09

#### 今天运行的命令

1. 创建静态页面

    - 创建一个新的分支
        ```bash
        git checkout -b static-pages
        ```

    - 删除无用的页面
        ```bash
        rm resources/views/welcome.blade.php
        ```

    - 生成静态页面用的控制器
        ```bash
        php artisan make:controller StaticPagesController
        ```
    - 生成静态页面用的视图
        ```bash
        php artisan make:view static_pages/home
        php artisan make:view static_pages/help
        php artisan make:view static_pages/about
        ```
    - 做完以上的操作之后, 提交
        ```bash
        git add .
        git commit -m "创建静态页面"
        ```

2. 模板切分

    - 生成布局文件
        ```bash
        php artisan make:view layouts/default
        ```
    - 生成导航栏
        ```bash
        git add .
        git commit -m "模板切分"
        ```
    - 可以通过以下命令查看所有的命令
        ```bash
        php artisan list
        ```

- 提交代码到远程仓库
    ```bash
    git checkout main
    git merge static-pages
    git push
    ```

## 📅 2025/05/12

- 创建一个新的分支
    ```bash
    git checkout main
    git checkout -b filling-layout-style
    ```
- 安装 laravel/ui
    ```bash
    composer require laravel/ui
    php artisan ui bootstrap
    ```

- 处理静态资源加载的问题,确认安装了 bootstrap sass
    ```bash
    npm install bootstrap sass --save-dev
    ```

- 提交初始化样式
    ```bash
    git add .
    git commit -m "初始化样式"
    ```

- 完成拆分 _header.blade.php 和 _footer.blade.php
    ```bash
    git add .
    git commit -m "完成拆分 _header.blade.php 和 _footer.blade.php"
    ```

- 完成 logo 引入以及跳转链接使用 route
    ```bash
    git add .
    git commit -m "完成 logo 引入以及跳转链接使用 route"
    ```

- 完成注册页面
    ```bash
    git add .
    git commit -m "完成注册页面"
    ```

- 合并分支
    ```bash
    git checkout main
    git merge filling-layout-style
    git push
    ```

## 📅 2025/05/13

- 创建一个新的分支
    ```bash
    git checkout main
    git checkout -b sign-up
    ```

- 完成用户显示页面
    ```bash
    git add -A
    git commit -m "用户显示页面"
    ```

- 完成用户注册页面
    ```bash
    git add -A
    git commit -m "用户注册表单"
    ```

- 安装 barryvdh/laravel-ide-helper
    ```bash
    composer require --dev barryvdh/laravel-ide-helper
    php artisan ide-helper:generate
    php artisan ide-helper:meta
    php artisan ide-helper:models
    ```

- 安装完成之后提交
    ```bash
    git add -A
    git commit -m "安装 barryvdh/laravel-ide-helper"
    ```

- 完成用户注册功能
    ```bash
    git add -A
    git commit -m "完成用户注册功能"
    git checkout main
    git merge sign-up
    git push
    ```

- 创建一个新的分支来开发登录登出功能
    ```bash
    git checkout main
    git checkout -b login-logout
    ```

- 创建 SessionsController
    ```bash
    php artisan make:controller SessionsController
    ```
- 实现登录功能
    ```bash
    git add -A
    git commit -m "实现登录功能"
    ```
- 完成登录后的导航逻辑
    ```bash
    git add -A
    git commit -m "完成登录后的导航逻辑"
    ```

- 完成登录登出功能
    ```bash
    git add -A
    git commit -m "完成登录登出功能"
    ```

- 完成记住我功能, 提交之后切换 main 分支 将 login-logout 分支合并到主分支, 并推送到远程仓库
    ```bash
    git add -A
    git commit -m "记住我功能"
    git checkout main
    git merge login-logout
    git push
    ```

- 创建 user-crud 分支
    ```bash
    git checkout main
    git checkout -b user-crud
    ```

- 完成用户编辑功能
    ```bash
    git add -A
    git commit -m "完成用户编辑功能"
    ```

- 完成授权策略, 提交之后切换到 main 分支, 将 user-crud 分支合并到主分支, 并推送到远程仓库
    ```bash
    git add -A
    git commit -m "完成授权策略"
    git checkout main
    git merge user-crud
    git push
    ```
