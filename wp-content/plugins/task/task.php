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
        <a href="' .getLoginPage().'"  class="btnline" ><span class="fa fa-facebook-square fa-facebook "></span> Get start with Facebook</a>
        <p style="margin-top:10px; color:#fff"><small>We promise will not post on your wall.</small></p>
      </div>
    </div>
    </div>
    </div>';
    return $out;
}
function askComment(){
    $out = '<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content site-modal">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel"><?PHP the_title();?></h4>
                      </div>
                      <div class="modal-body" style="text-align: center;">
                        <a href="'.getLoginPage().'"  class="btn btn-primary" >Login With Facebook</a>
                        <p><small>We promise will not post on your wall.</small></p>
                      </div>
                    </div>
                </div>
            </div>';
    return $out;
}