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
    $out = '<div class="modal fade" id="loading" tabindex="-1" data-keyboard="false" data-backdrop="static" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body" style="text-align:center; font-size:20px; background-color:rgb(255,255,255,0.2)">
        <img src="'.get_template_directory_uri().'/images/loading.svg" >
      </div>
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
                          <form>
                          <div class="form-group">
                          <label for="exampleFormControlInput1">Email address</label>
                          <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                          </div>
                          <div class="form-group">
                          <label for="exampleFormControlTextarea1">Example textarea</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
                          <div class="form-group item-right">
                          <button type="button" class="btn btn-primary">Primary</button>
                          </div>
                          </form>
                      </div>
                    </div>
                </div>
            </div>';
    echo $out;
}
add_action('wp_footer', 'startDiscuss');