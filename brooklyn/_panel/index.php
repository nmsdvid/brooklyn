<?php
include '../_cms/index.php';

Cms::pageProtect();

?>
<!DOCTYPE html>
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>brooklyn panel</title>
      <meta name="description" content="brooklyn panel">
      <meta name="keywords" content="brooklyn panel">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" type="image/x-icon" href="../brooklyn/_assets/_img/_favicon/favicon.ico" />
      <link rel="stylesheet" href="../brooklyn/_assets/_css/style.css">
  </head>
  <body>

    <nav>
        <ul>
            <li class="logo"><a href="#"><img src="../brooklyn/_assets/_img/logo.png"></a></li>
            <li class="js-page js-parent"><a href="/article/"><span class="icon-file"></span></a>
            <ul class="ul-child">
                <li class="js-create"><a href="/article/"><span class="icon-plus"></span></a></li>
            </ul>
            </li>
            <li class="js-page"><a href="/settings/"><span class="icon-cog"></span></a></li>
            <li><a href="/logout/"><span class="icon-log-out"></span></a></li>
        </ul>
    </nav>

    <div class="top-bar">
        <span class="website-url"><a href="<?php echo "http://$_SERVER[HTTP_HOST]"; ?>" title="<?php echo $_SERVER[HTTP_HOST] ?>" target="_blank"><span class="icon-eye-open"></span></a></span>
    </div><!-- .top-bar -->

    <div class="container js-container"></div><!-- .container -->

    <div class="modal-window js-create-new">
        <span class="content-title">Create new</span>
        <div class="modal-window__close js-close"><span class="icon-remove"></span></div>


            <div class="modal-window__inside">
                <div class="label-wrapper">
                    <label>Title:</label>
                    <div class="description_icon js-show-desc"><span class="icon-question-sign"></span></div>
                    <div class="description_content js-desc-text"><p>Title helps you to identify the content.</p></div>
                </div>
                <input type="text" placeholder="required!" class="js-create-title required" data-valtype="text" name="title[]" value="">
                <div class="label-wrapper">
                    <label>ID:</label>
                    <div class="description_icon js-show-desc"><span class="icon-question-sign"></span></div>
                    <div class="description_content js-desc-text"><p>ID is an unique id. This ID is used to “receive” the content from the backend.</p></div>
                </div>
                <input type="text" placeholder="required!" class="js-create-id required" data-valtype="text" name="id[]" value="">
                <label>Content:</label>
                <input type="text" placeholder="required!" class="js-create-content required" data-valtype="text" name="content[]" value="">
                <label>Description:</label>
                <input type="text" placeholder="optional" class="js-create-description" name="description[]" value="">
                <input type="submit" class="save-progress js-createNew-btn" value="Save" />
            </div><!-- .modal-window__inside -->
    </div><!-- .modal-window -->

    <div class="modal-window js-edit-content">
        <span class="content-title">Edit content</span>
        <div class="modal-window__close js-close"><span class="icon-remove"></span></div>


        <div class="modal-window__inside">
            <label>Title:</label>
            <input type="text" placeholder="required!" class="js-title required" data-valtype="text" name="" value="">
            <label>ID:</label>
            <input type="text" placeholder="required!" class="js-id required" data-valtype="text" name="" value="">
            <label>Description:</label>
            <input type="text" placeholder="optional" class="js-description" name="" value="">
            <input type="submit" class="save-progress js-editContent-btn" value="Save" />

            <input type="submit" class="delete js-delete-btn" value="Delete" />
        </div><!-- .modal-window__inside -->
    </div><!-- .modal-window -->

    <div class="overlay"></div>

    <script src="../brooklyn/_assets/_js/jquery.1.8.3.min.js"></script>
    <script src="../brooklyn/_assets/_js/main.min.js"></script>
  </body>
</html>