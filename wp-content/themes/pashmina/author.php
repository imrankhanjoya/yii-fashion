<?php
   /**
    * The template for displaying archive pages.
    *
    * @link https://codex.wordpress.org/Template_Hierarchy
    *
    * @package Pashmina
    */
   
   get_header(); ?>
<?PHP
   $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
   $user_id = $author->ID;


   $userdata = get_userdata( $user_id );
   $usermeta = get_user_meta($user_id);
   
   $img = $usermeta['cupp_upload_meta'][0];
   if($_GET['debug']){
      //print_r($userdata);
      print_r($usermeta['mycred_default_total']);
   }
   ?>
<!-- Go to www.addthis.com/dashboard to customize your tools --> <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=imrankhanjoya"></script>

<div class="container">
   <div class="row">
      <div class="col-lg-3 col-xs-12 col-md-3 col-sm-12 panel-body">
         <div class="row">
            <div class="col-lg-12 col-sm-4 col-md-12 text-center author-img-heiht">
               <img class="img-responsive prodct-crd-img" alt="<?=$userdata->data->display_name?>" title="<?=$userdata->data->display_name?>" src="<?=$img?>" >
            </div>
            <div class="col-lg-12 col-sm-8 col-md-12">
               <span><b><?=$userdata->data->display_name?></b></span>
               <?php if($user_id == get_the_ID()):?>
               <a class="pull-right" href="/get-start/?show=profile"><i class="fa fa-edit"></i> Edit</a>
               <?PHP endif;?>
               <h5 class=""><?=$usermeta['description'][0]?></h5>
               <h6 class=""><b>Skin Type:</b> <?=$usermeta['skinType'][0]?></h6>
               <h6 class=""><b>Skin Color:</b> <?=$usermeta['skin'][0]?></h6>
               <h6 class=""><b>Eye Type:</b> <?=$usermeta['eye'][0]?></h6>
               
            </div>
            <?php if($user_id == get_the_ID()):?>
            <div class="col-lg-12">
               <a href="<?=wp_logout_url(); ?>" class="btn btn-block">Log Out</a>
            </div>
            <?PHP endif;?>
         </div>
      </div>
      <div class="col-lg-9 col-xs-12 col-md-9 col-sm-12 media">
         <div class="tabbable-panel">
            <div class="author-its-tab">
               <ul class="nav nav-tabs ">
                  
                  <li class="active">
                     <a href="#tab_default_1" data-toggle="tab">
                     <span class=""><i class="fa fa-gift"></i></span>
                     <span class=""><?=$usermeta['mycred_default_total'][0]?></span>
                     <span class="">Rewards</span>
                     </a>
                  </li>
                  <?php $args = array(
                        'user_id' => $user_id,
                        'post_type' => 'product',
                        'comment_approved'=>1 
                     );
                  $comments = get_comments($args);
                  $commentcount = count($comments); ?>
                  <li>
                     <a href="#tab_default_2" data-toggle="tab">
                     <span class=""><i class="fa fa-star-o"></i></span>
                     <span class=""><?=$commentcount?></span>
                     <span class="">Reviews</span>
                     </a>
                  </li>
                  <?php                    
                     $WeDevs_Favorite_Posts = new WeDevs_Favorite_Posts();
                     $limit = 10;
                     $post_type = 'product';
                     $favposts = $WeDevs_Favorite_Posts->get_favorites('product', $user_id, $limit );
                     $myfavpost = [];
                     $myfavpostvar = '';
                     foreach ($favposts as $key => $favpost) {
                        $myfavpost[] = $favpost->post_id;
                        $myfavpostvar .= $favpost->post_id;
                     }

                     $favCount = get_fav_count($user_id,'product');

                  ?>
                  <li >
                     <a href="#tab_default_3" data-toggle="tab">
                     <span class=""><i class="fa fa-heart-o"></i></span>
                     <span class=""><?=$favCount?></span>
                     <span class="">Favs</span>
                     </a>
                  </li>
                  <li>
                     <a href="#tab_default_4" data-toggle="tab">
                     <span class=""><i class="fa fa-user-o"></i></span>
                     <span class="">
                     <span class="">0</span>
                     <span class="">Babes</span>
                     </span>
                     </a>
                  </li>
                  <li>
                     <a href="#tab_default_5" data-toggle="tab">
                     <span class=""><i class="fa fa-bullhorn"></i></span>
                     <span class="">0</span>
                     <span class="">Sponsors</span>
                     </a>
                  </li>
                  <li>
                     <a href="#tab_default_6" data-toggle="tab">
                     <span class="">Address</span>
                     </a>
                  </li>
               </ul>
               <div class="tab-content media">
                  <div class="author-tab-div active tab-pane" id="tab_default_1">
                     <div class="panel panel-body">
                        
                        <h4>Glad to see you here!</h4>
                        <p>With every review, discuss and referral you make, you collect coins that takes you a step closer to FREE beauty products, FREE samples, exclusive discounts and brand sponsorships catered to you.</p>
                        <?PHP
                        $shareUrl = site_url().do_shortcode("[mycred_affiliate_link]",true);
                        ?>
                        <textarea style="width: 100%;" disabled="true"></textarea>
                        <div class="addthis_sharing_toolbox" data-url="<?=$shareUrl?>" data-title="Hi Friends this is <?=$userdata->data->display_name?>" data-description="Join me at Gloat.Me and lets discuss about beauty and products #Gloat.Me" data-media="<?=$img?>"></div>


                        <div class="row">
                           <div class="col-sm-4">
                              <h3>Total Glaot Points: <br>
                                 <span class="text-danger"><?=$usermeta['mycred_default_total'][0]?></span>
                              </h3>
                           </div>
                           <div class="col-sm-8">
                              <div>
                                 <h4>Get more GloatMe Points with:</h4>
                                 <table class="table authore-table">
                                    <tbody>
                                       <tr>
                                          <td class="text-left">Every Visit you Earn</td>
                                          <td class="text-right">1 Gloat</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Registration you Earn</td>
                                          <td class="text-right">5 Gloats</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Every Starting Discussion</td>
                                          <td class="text-right">5 Gloats</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Every discuss reply</td>
                                          <td class="text-right">3 Gloats</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Every approved Review</td>
                                          <td class="text-right">3 Gloats</td>
                                       </tr>
                                       <tr>
                                          <td class="text-left">Every every referral.
                                             
                                          </td>

                                          <td class="text-right">5 Gloats</td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <div class="text-right">
                                 <a href=""><button type="button" class="btn btn-danger"> Choose a product to review now</button></a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4">
                           <div class="panel">
                              <div class="panel-body author-crd-heiht">
                                 <div class="col-lg-12 text-center author-img-heiht">
                                    <img class="img-responsive prodct-crd-img" src="http://d1acy2vp0zxghs.cloudfront.net/products/images/000/009/645/medium/Etude_House_Wonder_Pore_Freshner_500ml-500x500.jpg?1466148158">
                                 </div>
                                 <div class="text-center">
                                    <h4 class=""> Etude House </h4>
                                    <h5 class="">Etude House Wonder Pore Freshner 250ml </h5>
                                    <small>115 reviews</small><br>
                                    <small>Lowest price from</small><br>
                                    0
                                 </div>
                              </div>
                              <a href=""><button type="button" class="btn-block btn-danger">Redeem</button></a>
                           </div>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4">
                           <div class="panel">
                              <div class=" panel-body author-crd-heiht">
                                 <div class="col-lg-12 text-center author-img-heiht">
                                    <img class="img-responsive prodct-crd-img" src="http://d1acy2vp0zxghs.cloudfront.net/products/images/000/009/645/medium/Etude_House_Wonder_Pore_Freshner_500ml-500x500.jpg?1466148158">
                                 </div>
                                 <div class="text-center">
                                    <h4 class=""> Etude House </h4>
                                    <h5 class="">Etude House Wonder Pore Freshner 250ml </h5>
                                    <small>115 reviews</small><br>
                                    <small>Lowest price from</small><br>
                                    0
                                 </div>
                              </div>
                              <button type="button" class="btn-block btn-danger">Redeem</button>
                           </div>
                        </div>
                        <div class="col-lg-4 col-xs-12 col-md-4 col-sm-4">
                           <div class="panel">
                              <div class=" panel-body author-crd-heiht">
                                 <div class="col-lg-12 text-center author-img-heiht">
                                    <img class="img-responsive prodct-crd-img" src="http://d1acy2vp0zxghs.cloudfront.net/products/images/000/009/645/medium/Etude_House_Wonder_Pore_Freshner_500ml-500x500.jpg?1466148158">
                                 </div>
                                 <div class="text-center">
                                    <h4 class=""> Etude House </h4>
                                    <h5 class="">Etude House Wonder Pore Freshner 250ml </h5>
                                    <small>115 reviews</small><br>
                                    <small>Lowest price from</small><br>
                                    0
                                 </div>
                              </div>
                              <button type="button" class="btn-block btn-danger">Redeem</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane author-tab-div" id="tab_default_2">
                     <button type="button" class="btn a-btn-knowmore">Approved (0)</button>
                     <button type="button" class="btn a-btn-knowmore">Pending (0)</button>
                     <button type="button" class="btn a-btn-knowmore">Rejected (0)</button>
                     <div class="row media">


                        <?php foreach ($comments as $key => $comment) {
                           $ago = human_time_diff($comment->comment_date,date() );
                           
                           $useravatar = get_avatar_url($comment->user_id); ?>
                           
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                           <div class="panel-default panel-body panel">
                              <div class="media">
                                 <div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 all-div-padding0">
                                    <img class="img-responsive img-circle" src="<?=$useravatar?>">
                                 </div>
                                 <div class="col-lg-10 col-sm-10 col-md-10 col-xs-10">
                                    <p class="commnt-time-dtl small">By <b class="text-info"><?=$comment->comment_author?></b>
                                    </p>
                                    
                                    <p class="text-muted small"><a href="<?php echo get_permalink($comment->comment_post_ID); ?>#comment-<?php echo $comment->comment_ID; ?>" ><?=$comment->comment_content?></a></p>
                                    <i class="fa fa-clock-o commnt-time-dtl"><span class=""> <?=$ago?> ago</span></i>
                                 </div>
                              </div>
                           </div>
                        </div>
                     <?php  } ?>
                     </div>
                  </div>
                  <div class="tab-pane " id="tab_default_3">
                     <div class="container discussion-page">
                        <div class="row">
                           <?php
                              
                              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                              $custom_query = new WP_Query($args); 
                              $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                              $args = array( 'post_type' => 'product','post__in' => $myfavpost, 'posts_per_page' =>10, 'paged' => $paged,"orderby"=>"meta_value_num","order"=>"DESC" );
                              $custom_query = new WP_Query($args); ?>
                           <?PHP while($custom_query->have_posts()) : $custom_query->the_post(); ?>
                           <?PHP  get_template_part('template-parts/content-product','page'); ?>
                           <?php endwhile; ?>
                           <?php next_posts_link( '&larr; Older posts', $custom_query->max_num_pages); ?>
                           <?php previous_posts_link( 'Newer posts &rarr;' ); ?>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane author-tab-div" id="tab_default_4">
                     
                     <div class="panel-body">
                        <p class="panel-body"> No approve review yet</p>
                     </div>
                     <div class="row">
                        <div class="col-md-4 col-lg-4 col-xs-12 col-sm-4">
                           <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 list-group-item">
                              <div class="col-lg-4 col-md-4 col-xs-4 col-sm-4">
                                 <img class="img-circle" src="http://d1acy2vp0zxghs.cloudfront.net/users/avatars/000/019/934/original/picture?1522166151" alt="Picture?1522166151">
                              </div>
                              <div class="col-lg-8 col-md-8 col-xs-8 col-sm-8" style="padding: 0px;">
                                 <a class="" title="Elleena Zaini" href="">
                                    <h5 class="media-heading"><b>Elleena Zaini</b></h5>
                                 </a>
                                 <a href="">
                                    <h6 class="media-heading">Unfollow</h6>
                                 </a>
                                 <h6 class="media-heading">no user beauty profile</h6>
                                 <h6 class="media-heading">650 pts - 7 reviews</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane author-tab-div" id="tab_default_5">
                     <div class="panel-body">
                        <h3>Does your word on product have high influence level?</h3>
                        <p>Fill in the form below to get sponsored by brands for your review on social media:</p>
                        <h4><b>Total Influences:
                           1842</b>
                        </h4>
                        <a href=""><button type="button" class="btn a-btn-knowmore">Fill Now</button></a>
                     </div>
                  </div>
                  <div class="tab-pane author-tab-div" id="tab_default_6">
                     <h3>Shipping Address</h3>
                     <p>If you are selected in our <a class="text-danger" href="" target="_blank">GloatMe Sampling Program</a>, you will receive new products samples from us. Items will be delivered to the address you provide below.</p>
                     <div class="address-holder">
                        <form id="" action="" accept-charset="" method="">
                           <input name="" type="hidden" value="✓"><input type="hidden" name="authenticity_token" value="">
                           <div class="row">
                              <div class="col col-sm-12 media">
                                 <label class="form-label">
                                    <h6 class="media-heading">Recipient name:*</h6>
                                 </label>
                                 <input type="text" name="r" id="" value="anjali sharma" class="form-control">
                              </div>
                              <div class="col col-sm-6 media">
                                 <label class="form-label">
                                    <h6 class="media-heading">Recipient email:*</h6>
                                 </label>
                                 <input type="email" name="recipient_email" id="recipient_email" value="anjalisharma@gmail.com" class="form-control">
                              </div>
                              <div class="col col-sm-6 media">
                                 <label class="form-label">
                                    <h6 class="media-heading">Recipient contact:*</h6>
                                 </label>
                                 <input type="text" name="recipient_contact" id="recipient_contact" class="form-control" required="required">
                              </div>
                              <div class="col col-sm-12 media">
                                 <label class="form-label">
                                    <h6 class="media-heading">Shipping Address:*</h6>
                                 </label>
                                 <input type="text" name="address_1" id="address_1" class="form-control" placeholder="Address line 1">
                                 <input type="text" name="address_2" id="address_2" class="form-control media" placeholder="Address line 2">
                              </div>
                              <div class="col col-sm-6 media">
                                 <input type="text" name="post_code" id="post_code" class="form-control" placeholder="Post code">
                              </div>
                              <div class="col col-sm-6 media">
                                 <input type="text" name="city" id="city" class="form-control" placeholder="City">
                              </div>
                              <div class="col col-sm-6 media">
                                 <input type="text" name="state" id="state" class="form-control" placeholder="State">
                              </div>
                              <div class="col col-sm-6 media">
                                 <select name="country" id="c" class="form-control">
                                    <option>Malaysia</option>
                                    <option>Singapore</option>
                                    <option>Thailand</option>
                                 </select>
                              </div>
                              <div class="col col-sm-12 media">
                                 <input type="checkbox" name="" id="save_address" value="yes" checked="checked">
                                 <span>Make this as default shipping address</span>
                              </div>
                              <div class="col col-sm-12">
                                 <input type="checkbox" name="agree_terms" id="" value="yes">
                                 <span>I agree to the <a href="s" target="">terms &amp; conditions</a></span>
                              </div>
                              <div class="col col-sm-12 media">
                                 <input type="submit" name="commit" value="Save Address" class="btn btn-success">
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<?php
get_footer();
