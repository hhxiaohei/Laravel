<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>微博数据分析</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        /*tr,td{*/
            /*border: 2px #ccc solid ;*/
        /*}*/
        form{
            margin-bottom:20px;
        }
        .container{
            margin-top:30px;
        }
    </style>
</head>
<body>
    <div class="container">
    <form action="" method="post" id="form" role="form">
        <div class="input-group">
            {{csrf_field()}}
            <label for="name">输入用户名:</label>
            <input type="text"  id="name" class="form-control" placeholder="输入你的微博名称">

        </div>
    </form>
    <table style="border-collapse: collapse" class="table table-bordered">
        <caption>微博个人信息</caption>
        <thead>
            <td>用户名</td>
            <td>性别</td>
            <td>可否私信</td>
            <td>地区</td>
            <td>注册时间</td>
            <td>头像地址</td>
            <td>使用语言</td>
            <td>微博地址</td>
            <td>个人简介</td>
            <td>微博数</td>
            <td>粉丝数</td>
            <td>关注数</td>
        </thead>
        <tbody>
        <tr>
            <td id="myname" class="success">&nbsp;</td>
            <td id="gender"></td>
            <td id="sxsx"></td>
            <td id="location"></td>
            <td id="created_at"></td>
            <td><img src="" id="avatar_large" class="img-responsive"></td>
            <td id="lang"></td>
            <td><a href="" id="fw" target="_blank">点击访问</a></td>
            <td id="description"></td>
            <td id="statuses_count"></td>
            <td id="followers_count"></td>
            <td id="friends_count"></td>
        </tr>
        </tbody>
    </table>
    </div>
    <script src="/js/jquery.js"></script>
    <script>
        $('#name').blur(function(){
            var screen_name = $('#name').val();
            var access_token = '2.00vO8kIDjfN4hBd877b4d41eXlSmVB';
            var uids = '';
            //账号主要信息
            $.get('https://api.weibo.com/2/users/show.json?',{access_token:access_token,screen_name:screen_name},function(data){
                var uids = data.id;
                document.getElementById('myname').innerText = data.name;
                var aa = (data.gender == 'm'?'男':'女');
                document.getElementById('gender').innerText = aa;
                document.getElementById('location').innerText = data.location;
                var sx = (data.allow_all_act_msg == true?'是':'否');
                document.getElementById('sxsx').innerText = sx;
                document.getElementById('created_at').innerText = data.created_at.slice(-4)+'年';
                document.getElementById('avatar_large').src = data.avatar_large;
                document.getElementById('lang').innerText = data.lang;
                document.getElementById('fw').href = 'http://weibo.com/u/'+data.id;
                document.getElementById('description').innerText = data.description;

                //账号粉丝/关注数
                $.get('https://api.weibo.com/2/users/counts.json?',{access_token:access_token,uids:uids},function(data2){
                    //console.log(data.allow_all_act_msg);
                    document.getElementById('followers_count').innerText = data2[0].followers_count;
                    document.getElementById('friends_count').innerText = data2[0].friends_count;
                    document.getElementById('statuses_count').innerText = data2[0].statuses_count;
                });
            });
        })
    </script>
</body>
</html>