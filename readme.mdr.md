# Laravel-blog-v2

---

css 命名规则：BEM规范

---

基于 Laravel 5.5 和 react 的个人博客系统

演示地址：

前台介绍：前台采用极简风格制作，注重移动端显示，只使用了最基础的 bootstrap，加载速度快：

- 文章浏览，浏览量统计，标签，标题搜索，标签搜索
- 文章评论，评论回复

后台介绍：管理后台使用 React + Ant Design 设计：

- 【后台面板】文章统计，留言统计，流量统计
- 【文章管理】集成富文本编辑器，图片使用云存储，一键导出 HTML/Markdown
- 【文章管理】新建文章默认为笔记，发表后才能在首页显示
- 【文章管理】文章置顶，首页优先显示置顶文章
- 【文章管理】文章添加标签，标签管理
- 【留言管理】管理收到的文章评论及回复
- 【访客记录】记录网站的访客信息

后台截图：

![image](https://user-images.githubusercontent.com/19741140/36642407-edee821e-1a79-11e8-8d7f-ef55c1fd3eaf.png)

更新日志：

12-7 | 安装Redis | composer require predis/predis

12-8 | 添加SQL日志监听 | php artisan make:listener QueryListener --event=Illuminate\Database\Events\QueryExecuted 



进入工程目录，安装依赖（以 www 目录下的 myblog 为例）

```
cd /var/www/myblog

composer install
```

进入 mysql，创建一个数据库，以 myblog 为例

```
create database myblog;

```

将工程目录下的 `.env.example` 文件复制一份，重命名为`.env`，然后修改数据库相关的配置

```
DB_DATABASE=quanbang
DB_USERNAME= <你的数据库账号>
DB_PASSWORD= <你的数据库密码>

COS_REGION= <你的COS区域>
COS_APPID=  <你的腾讯云API ID>
COS_KEY=    <你的腾讯云API KEY>
COS_SECRET= <你的腾讯云API SECRET>
```

执行数据库迁移，并生成 laravel key（在工程根目录执行，以 www 目录下的 myblog 为例）

```
cd /var/www/myblog

php artisan migrate

php artisan key:generate
```

最后一步，需要修改一下 storage 文件夹的权限，依旧以 www 目录下的 myblog 为例

```
cd /var/www/myblog

sudo chmod -R 777 storage
```

部署完成，博客应该可以正常访问了~（不能正确部署请提 issue 我会及时回复）

## 使用

访问 '根目录/admin' 进入后台，第一次进入会弹出登录/注册界面，请先注册一个账号，只有ID为1的账号可以进入后台

## 更新

```
git pull

composer install

php artisan migrate
```

安装Redis提示内存不足
composer require predis/predis

composer update
composer clear-cache


```
添加SQL日志监听
php artisan make:listener QueryListener --event=Illuminate\Database\Events\QueryExecuted


```
