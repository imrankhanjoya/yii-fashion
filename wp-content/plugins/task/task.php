<?php
/*
Plugin Name:Task
Plugin URI: http://simplysocial.co.in
description:-
My custom pages
Version: 1.2
Author: Mr. Imran khan joya
License: GPL2
 */

function loginModal(){
    $out = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content site-modal">
      <div class="modal-body" style="text-align: center; font-size:20px;">
        <a href="' .getLoginPage().'"  class="btnline showloading" ><span class="fa fa-facebook-square fa-facebook "></span> Get start with Facebook</a>
        <p style="margin-top:10px; color:#fff"><small>We promise will not post on your wall.</small></p>
      </div>
    </div>
    </div>
    </div>';
    return $out;
}

function loading(){
    $out = '<div class="modal fade" id="loading" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel" style="background-color:#fff">
    <div class="modal-dialog" role="document">
      <div class="modal-body" style="text-align:center; margin-top:30%; font-size:20px; background-color:rgb(255,255,255,0.2)">
        <img src="'.get_template_directory_uri().'/images/loading.svg" >
      </div>
    </div>
    </div>';
    echo  $out;
}
add_action('wp_footer', 'loading'); 

function pushNotificaton(){
    $out = '<div style="margin-top:90px" class="modal fade" id="pushNotificaton" data-backdrop="static">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body"  style="text-align:center; font-size:20px; background-color:rgb(255,255,255,0.2)">
        <img onClick="mypush()" src="https://cdnmediablog.files.wordpress.com/2018/08/adobe_post_20180821_142312.jpg" >
        <span onClick="mypushclose()" style="text-decoration:underline; cursor:pointer; font-size:12px;">No, Let me be ignorant</span>
      </div>
    </div>
    </div>
    </div>';
    echo  $out;
}
add_action('wp_footer', 'pushNotificaton'); 
function startDiscuss(){
    $out = '<div class="modal fade" id="startDiscuss" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h3>Start Discussion</h3>
                      </div>
                      <div class="modal-body" >
                          <form method="post" id="myComment" action="">
                            <div class="form-group">
                            <label for="exampleFormControlInput1">Title</label>
                            <input name="title" type="text"  class="form-control" id="exampleFormControlInput1" placeholder="Hair skin eyes" minlength="10" maxlength="200" required>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Your question</label>
                            <textarea name="desc" class="form-control" id="exampleFormControlTextarea1" minlength="30" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlInput1">Category</label>
                            <select name="category" type="select" class="form-control" id="category" placeholder="Select topic" required>
                              <option value="">Select Topic</option>
                              <option value="skin-care">Skin Care</option>
                              <option value="hair-care">Hair Care</option>
                              <option value="Eye-care">Eye Makeup</option>
                              <option value="nail-care">Nails Makeup</option>
                            </select>
                            </div>
                            <div class="form-group item-right">
                            <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                          </form>
                      </div>
                    </div>
                </div>
            </div>';
    echo $out;
}
add_action('wp_footer', 'startDiscuss');

function footPrints(){
    $theme_path = get_template_directory_uri();
    $val = get_page_by_path( 'get-start');
    $loginUrl = add_query_arg(array('fbgo' =>'true'),get_page_link($val->ID));
    $out = '<div  class="modal fade" id="yourFootPrints">
    <div class="modal-dialog" role="document" style="width:100%; position:fixed;bottom:0px;right:0px;margin:0px;">
    <div class="modal-content" style="border-radius:0px">
      <div class="modal-body" style="border-radius:0px;">
        <div class="row hidden-xs">
        <div class="col-md-5 align-items-right" style="text-align:center">
          <img src="'.$theme_path.'/images/milk.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/bonut.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/pooky.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/sutu.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/henna.png" class="img-circle" style="height:50px" >
        </div>
        <div class="col-md-2">
          <center>
          <a href="'.$loginUrl.'">
          <img src="'.$theme_path.'/images/footprints.svg" style="height:100px; margin-top:-60px;" />
          </a>
          </center>
        </div>
        <div class="col-md-5  align-items-left">
            <img src="'.$theme_path.'/images/Leave.png" />
        </div>
        </div>
        <div class="row hidden-lg hidden-md">
        <div class="col-xs-12">
          <center>
          <a href="'.$loginUrl.'">
          <img src="'.$theme_path.'/images/footprints.svg" style="height:60px; margin-top:-60px;" />
          </a>
          </center>
        </div>
        <div class="col-xs-12 align-items-right" style="text-align:center">
          <img src="'.$theme_path.'/images/milk.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/bonut.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/pooky.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/sutu.png" class="img-circle" style="height:50px" >
          <img src="'.$theme_path.'/images/henna.png" class="img-circle" style="height:50px" >
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>';
    echo  $out;
}
add_action('wp_footer', 'footPrints');
function showLove(){
    $theme_path = get_template_directory_uri();
    $out = '<div  class="modal fade" id="yourFootPrints">
    <div class="modal-dialog" role="document" style="width:100%; position:fixed;bottom:0px;right:0px;margin:0px;">
    <div class="modal-content" style="border-radius:0px">
      <div class="modal-body" style="border-radius:0px;">
        <div class="row">
        <div class="col-md-4">
          <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fgloatme%2F&tabs=timeline&width=400&height=600&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=280996468577026" width="100%" height="600" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
        </div>
        <div class="col-md-4" style="height:600px">
          <blockquote class="instagram-media" data-instgrm-permalink="https://www.instagram.com/p/Bm-CMBhBBuU/?utm_source=ig_embed" data-instgrm-version="9" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; max-width:540px; min-width:326px; padding:0; width:99.375%; width:-webkit-calc(100% - 2px); width:calc(100% - 2px);"><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div><p style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; line-height:17px; margin-bottom:0; margin-top:8px; overflow:hidden; padding:8px 0 7px; text-align:center; text-overflow:ellipsis; white-space:nowrap;"><a href="https://www.instagram.com/p/Bm-CMBhBBuU/?utm_source=ig_embed" style=" color:#c9c8cd; font-family:Arial,sans-serif; font-size:14px; font-style:normal; font-weight:normal; line-height:17px; text-decoration:none;" target="_blank">A post shared by GloatMe (@gloat.me)</a> on <time style=" font-family:Arial,sans-serif; font-size:14px; line-height:17px;" datetime="2018-08-27T04:41:15+00:00">Aug 26, 2018 at 9:41pm PDT</time></p></div></blockquote> 
          <script async defer src="//www.instagram.com/embed.js"></script>
        </div>
        <div class="col-md-4" style="height:300px">
        <center>
        <h2 style="text-align:center">Show your love</h2>
        <img src="'.$theme_path.'/images/like.svg" style="height:200px" />
        </center>
        </div>
        </div>
      </div>
    </div>
    </div>
    </div>';
    echo  $out;
}
add_action('wp_footer', 'showLove'); 