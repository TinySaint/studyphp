<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="/thinkstudy/Public/bootstrap-3.3.7-dist/css/bootstrap-theme.css"/>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/npm.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
    <script src="/thinkstudy/Public/bootstrap-3.3.7-dist/js/userjs.js"></script>
    <!-- <script src="https://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
</head>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">后台</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="">欢迎 <?php echo (session('admin_username')); ?> ！</span></a></li>
                <li class="active"><a href="/thinkstudy/index.php/Admin/Login/logout">退出</span></a></li>
            </ul>
        </div>
    </nav>

</div>
<div class="container">
    <div class="col-md-2 left" style="height: 100%">
        <?php if($_SESSION['admin_type']== 0 ): ?><ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">用户管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/adduser">添加用户</a></li>
            </ul>
            <ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">学生管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">添加学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">待审核学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">无效学生</a></li>
            </ul><?php endif; ?>

        <?php if($_SESSION['admin_type']== 1 ): ?><ul class="list-group">
            <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
            </ul><?php endif; ?>

        <?php if($_SESSION['admin_type']== 2 ): ?><ul class="list-group">
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/read">学生管理</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/User/add">添加学生</a></li>
                <li class="list-group-item"><a href="/thinkstudy/index.php/Admin/Index/index">审核通过学生</a></li>
            </ul><?php endif; ?>

    </div>
    <div style="height: 100%"></div>
    <div class="col-md-10 right">
        

    <form class="form-horizontal" role="form" action="/thinkstudy/index.php/Admin/User/insertstudent" enctype="multipart/form-data"
          method="post">
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">学生名字:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="name" id="name"
                       placeholder="请输入名字">
            </div>

            <label class="col-sm-1 control-label ">性别:</label>
            <div class="col-sm-2">
                <select name="gender" class="form-control">
                    <option selected>男</option>
                    <option>女</option>
                </select>
            </div>

            <label class="col-sm-2 control-label" style="width: 100px">出生日期:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="dataofbirth">
            </div>


        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">顾问:</label>
            <div class="col-sm-2">
                <!--<input type="text" class="form-control" name="introducename"-->
                <!--placeholder="请输入名字">-->
                <?php if(($_SESSION['admin_type']) == "0"): ?><select name="introducename" class="form-control">
                        <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo['username']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                    <?php else: ?>
                    <input type="hidden" name="introducename" value="<?php echo (session('admin_username')); ?>"/>
                    <div type="text" class="form-control"
                    ><?php echo (session('admin_username')); ?>
                    </div><?php endif; ?>
            </div>

            <label class="col-md-2 control-label ">固定电话:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="fixedline">
            </div>

        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">QQ:</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" name="qq">
            </div>
            <label class="col-sm-2 control-label ">手机:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="telephone">
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">户口所在地:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="registered">
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">资源编号:</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="infotype">
                </div>
            </div>
        </div>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label ">在读学校:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="university">
            </div>
            <div class="form-group">
                <label class="col-sm-1 control-label " style="width: 100px">文化程度:</label>
                <div class="col-sm-2">
                    <select name="education" class="form-control">
                        <option>大专以下</option>
                        <option>大专</option>
                        <option selected>本科</option>
                        <option>研究生</option>
                        <option>博士</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">专业:</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="major">
            </div>
            <div class="form-group">
                <label class="col-md-1 control-label ">Email:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="email">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">毕业时间:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="graduatedate">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">留学国家:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="studyabroad">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">留学时间:</label>
            <div class="col-sm-3">
                <input type="date" class="form-control" name="abroaddate">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">平均成绩:</label>
                <div class="col-md-3">
                    <input type="text" class="form-control" name="grade">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">文案老师:</label>
            <div class="col-sm-3">
                <select name="fileteacher" class="form-control">
                    <option>无</option>
                    <?php if(is_array($userlist)): $i = 0; $__LIST__ = $userlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option><?php echo ($vo['username']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label ">学生状态:</label>
                <div class="col-md-3">
                    <select type="text" class="form-control" name="state">
                        <option value="1">无</option>
                        <option value="2">联系不上</option>
                        <option value="3">联系上</option>
                        <option value="4">约来访</option>
                        <option value="5">已来访</option>
                        <option value="6">待签约</option>
                        <?php if(($_SESSION['admin_type']) < "2"): ?><option value="7">签约</option>
                            <option value="8">缴费（押金）</option>
                            <option value="9">缴费（首款）</option>
                            <option value="10">缴费（全款）</option>
                            <option value="11">通过</option>
                            <option value="12">退款</option>
                            <option value="13">归档</option><?php endif; ?>
                    </select>
                </div>
            </div>
        </div>
        <script>

            //监听上传进度
            $(document).ready(function () {
//            var xhrOnProgress = function (fun) {
//                xhrOnProgress.onprogress = fun; //绑定监听
//                return function () {
//                    //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
//                    var xhr = $.ajaxSettings.xhr();
//                    //判断监听函数是否为函数
//                    if (typeof xhrOnProgress.onprogress !== 'function')
//                        return xhr;
//                    //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
//                    if (xhrOnProgress.onprogress && xhr.upload) {
//                        xhr.upload.onprogress = xhrOnProgress.onprogress;
//                    }
//                    return xhr;
//                }
//            };

                $("#upfile").on('click', function () {
                    var formData = new FormData();// 自动搜索#form里面的name值不为空的input(注意：type=file的input会被搜索到，但不能携带文件流，所以在下面我主动添加进了formData) <=ie9不支持FormData
                    formData.append('file', $('#accessory')[0].files[0]);
                    formData.append('sid', $('#sid').val());
                    formData.append('name', $('#name').val());
//                formData.append('file', document.querySelector('[type=file]').files[0]);// 由于上面不会搜索到type=file的input，所以在这里将它主动添加到formData中(注意：需使用原生方式获取)
                    $.ajax({
                        type: 'post',
                        url: "/thinkstudy/index.php/Admin/User/uploadfile",
                        data: formData,
                        dataType: 'json',
                        //用ajax的话：这几个参数应该是 要设置的：
                        cache: false,
                        enctype: 'multipart/form-data',
                        contentType: false,// 当有文件要上传时，此项是必须的，否则后台无法识别文件流的起始位置(详见：#1)
                        processData: false,// 是否序列化data属性，默认true(注意：false时type必须是post，详见：#2)
//                    xhr: xhrOnProgress(function (e) ),
                        success: function (response) {
                            if (response.status == 1) {
                                //判断返回的status来确定文件是否上传成功，以及上传成功后要做的操作
                                alert(response.msg);
                                $("#accessory").val("");
                                $("#filelistdiv").append("<p id='" + response.fid + "'><input type='checkbox' name='filelist' value='" + response.fid + "'/>" + response.fname + "---" + response.fid + "</p>");
                            }
                        },
                        error: function (XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败" + XMLHttpRequest.status + "---------" + XMLHttpRequest.readyState + "----------" + textStatus);
                        }
                    })
                });

                $("#detelefile").on('click', function () {

                    var arr = new Array();
                    var result = "";
                    var items = document.getElementsByName("filelist");
                    for (i = 0; i < items.length; i++) {
                        if (items[i].checked) {
                            arr.push(items[i].value);
                        }
                    }
                    console.log(arr);
                    if (arr.length > 0) {
                        $.ajax({
                            url: "/thinkstudy/index.php/Admin/User/deletefile",
                            //data: { "selectedIDs": _list },
                            data: {'flist': arr},
                            dataType: "json",
                            type: "POST",
                            //traditional: true,
                            success: function (responseJSON) {
                                // your logic
                                $.each(responseJSON.flist, function (name, value) {
                                    if (value = 1) {
                                        result = result + name + "删除成功 \n";
                                    } else {
                                        result = result + name + "删除失败 \n";
                                    }
                                });
                                $.each(responseJSON.fidlist, function (name, value) {
                                    if (value = 1) {
                                        $("p#" + name).remove();
                                    }
                                });
                                alert(result);
                            }
                        });
                    } else {
                        alert("请选择要删除的文件");
                    }
                });
            });
        </script>
        <div class="form-group" align="center">
            <label class="col-sm-2 control-label">文件列表:</label>
            <div class="col-sm-4">
                <div class="form-control" id="filelistdiv" style="height: 120px;padding-left: 20px" align="left">

                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">成绩附件:</label>
            <div class="col-sm-3">
                <input type="file" id="accessory" name="accessory" size="30">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-2">
                <div class="btn btn-default" id="upfile" size="30">上传文件</div>
            </div>
            <div class="col-sm-1">
                <div class="btn btn-default" id="detelefile" size="30">删除文件</div>
            </div>
        </div>

        <!-- next -->
        <h2 align="center"> 英语成绩 </h2>
        <div class="form-group">
            <label class="col-md-2 control-label ">SAT1:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="sat1">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="sat1date">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">SAT2:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="sat2">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="sat2date">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">TOEFL:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="toefl">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="toefldate">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">TELTS:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="telts">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="teltsdate">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">GMAT:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="gmat">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="gmatdate">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">GRE:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="grt">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="grtdate">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-2 control-label ">LSAT:</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="lsat">
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label " style="width: 100px">考试时间:</label>
                <div class="col-md-3">
                    <input type="date" class="form-control" name="lsatdate">
                </div>
                <p>(如未考，请选择考试时间！)</p>
            </div>
        </div>
        <input type="hidden" name="state" value="1"/>
        <div class="form-group">
            <div class="col-md-offset-3 col-md-5">
                <button type="submit" class="btn btn-default">提交</button>
            </div>
            <div class="col-md-3">
                <button type="reset" class="btn btn-danger">重置</button>
            </div>
        </div>
        <div style="height: 200px;"></div>
    </form>

    </div>
</div>
</body>
</html>