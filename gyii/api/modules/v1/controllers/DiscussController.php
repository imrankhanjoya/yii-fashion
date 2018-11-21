<?php
namespace api\modules\v1\controllers;

use yii\rest\Controller;
use common\models\WpTermRelationships;
use common\models\WpTermTaxonomy;
use common\models\WpPostsQuery;
use common\models\WpCommentsQuery;
use common\models\WpTermsQuery;
use frontend\components\TextUtility;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
/**
 * This is the model class for table "wp_posts".
 *
 * @property string $ID
 * @property string $post_author
 * @property string $post_date
 * @property string $post_date_gmt
 * @property string $post_content
 * @property string $post_title
 * @property string $post_excerpt
 * @property string $post_status
 * @property string $comment_status
 * @property string $ping_status
 * @property string $post_password
 * @property string $post_name
 * @property string $to_ping
 * @property string $pinged
 * @property string $post_modified
 * @property string $post_modified_gmt
 * @property string $post_content_filtered
 * @property string $post_parent
 * @property string $guid
 * @property int $menu_order
 * @property string $post_type
 * @property string $post_mime_type
 * @property int $comment_count
 */
class DiscussController extends Controller
{

    public function actionIndex($page=0,$limit=10){
        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getList($page,"discuss",$limit,true);

        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }

    public function actionByTag($key,$page=0,$limit=10){
        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getListByTag($key,$page,"discuss",$limit,true);

        if(!empty($allPosts)){
            return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        }else{
            return ["status"=>false,"msg"=>"Discussion topic list","data"=>$allPosts];
        }
        Yii::app()->end();
    }

    public function actionNocomment($page=0,$limit=10,$nocomment=true){
        $postModel = new WpPostsQuery();
        $allPosts = $postModel->getNocomments($page,"discuss",$limit,false,$nocomment);

        return ["status"=>true,"msg"=>"Discussion topic list","data"=>$allPosts];
        Yii::app()->end();
    }


    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/detail&slug=this-sgre
    public function actionDetail($slug){
        $postModel = new WpPostsQuery();
        $onePosts = $postModel->getDetail($slug,'discuss');


        $WpTermRelationships = new WpTermRelationships();
        $term_taxonomy_ids = $WpTermRelationships->getTags($onePosts['ID']);

        $WpTermTaxonomy = new WpTermTaxonomy();
        $term_names_ids = $WpTermTaxonomy->find()->select(["wp_terms.name","wp_term_taxonomy.taxonomy","wp_terms.slug","wp_term_taxonomy.term_taxonomy_id"])
        ->join("left join","wp_terms","wp_terms.term_id = wp_term_taxonomy.term_id")
        ->where(["in","term_taxonomy_id",$term_taxonomy_ids])->asArray()->all();
        $onePosts['tags'] =$term_names_ids;

        $WpCommentsQuery = new WpCommentsQuery();
        $onePosts['postComments'] = $WpCommentsQuery->getCommentByPost($onePosts['ID'],false);



        return ["status"=>true,"msg"=>"Product list","data"=>$onePosts];
        Yii::app()->end();
    }


    public function actionTopuser(){
        $WpCommentsQuery = new WpCommentsQuery();
        $topUser = $WpCommentsQuery->getTopUsers();

        return ["status"=>true,"msg"=>"Product list","data"=>$topUser];
        Yii::app()->end();
    }

    public function actionCreatePost(){
        $rawJson = file_get_contents("php://input");
        $postData  = json_decode($rawJson,true);
        $isPostValid = false;
        
        



        /*VALIDATE THE POST*/
        if(strlen($postData['post_title'])>200){
            $isPostValid = false;
            return ["status"=>false,"msg"=>"Title is too large","data"=>$postData];
            Yii::app()->end();
        }if(strlen($postData['post_title'])<4){
            $isPostValid = false;
            return ["status"=>false,"msg"=>"Title is too short","data"=>$postData];
            Yii::app()->end();
        }elseif(strlen($postData['post_content'])<100){
            $isPostValid = false;
            return ["status"=>false,"msg"=>"Content is too small","data"=>$postData];
            Yii::app()->end();
        }elseif($postData['post_type']!="discuss"){
            $isPostValid = false;
            return ["status"=>false,"msg"=>"Error while processing","data"=>$postData];
            Yii::app()->end();
        }

        

        if(isset($postData['ID']) && $postData['ID']!=""){
            
            $postModel = new WpPostsQuery();
            $postModel = $postModel->find();
            $postModel = $postModel->where(["ID"=>$postData['ID'],"post_type"=>$postData['post_type'],"post_author"=>$postData['post_author']]);
            //echo $postModel->createCommand()->getRawSql();exit;
            $indbPost = $postModel->one();


        }else{
            $postModel = new WpPostsQuery();
            $postModel = $postModel->find();
            
            $postModel = $postModel->where(["post_title"=>$postData['post_title'],"post_type"=>$postData['post_type'],"post_author"=>$postData['post_author']]);
            //echo $postModel->createCommand()->getRawSql();exit;
            $indbPost = $postModel->one();
        }



        /*END VALIDATE THE POST*/


            $postData['menu_order'] = 0;
            $postModel = new WpPostsQuery();
            $TextUtility = new TextUtility();
           
            $ifsaved = false;  
            if(!empty($indbPost)){


                $indbPost->post_title = $postData['post_title'];
                $indbPost->post_content = $postData['post_content'];
                $indbPost->post_excerpt = $postData['post_excerpt'];
                $indbPost->post_name = $TextUtility->gen_slug($postData['post_title']);
                $indbPost->update(true);
                $ifsaved = true ; 
                $pID = $indbPost->ID;
                $slug = $indbPost->post_name;   
                
            }else{
                $postModel->load($postData);
                $postModel->attributes = $postData;
                $slug = $postModel->post_name = $TextUtility->gen_slug($postData['post_title']);

                if($postModel->save(true)){
                    $ifsaved = true;
                    $pID = $postModel->ID;
                }else{
                    return ["status"=>false,"msg"=>"Error while createing post please try again","data"=>['slug'=>$slug]];
                    Yii::app()->end();
                }

            }


            
            if($ifsaved){

                $WpTermsQueryModel = new WpTermRelationships();
                $WpTermsQueryModel->deleteAll(["object_id"=>$pID]);
                
                $this->addTags($pID,$postData['tags'],"post_tag");
                $this->addTags($pID,$postData['category'],"category");

                return ["status"=>true,"msg"=>"Post has been saved","data"=>['slug'=>$slug]];
                Yii::app()->end();
            }else{
                return ["status"=>false,"error_add"=>$postModel->errors,"data"=>$indbPost->errors];
                Yii::app()->end();
            }        

    }

    

    function addTags($postId,$alltags,$posttype){

        
        $tags = explode(",",$alltags);
        if(is_array($tags)){
            foreach($tags as $tag){
                //Save Or Get Term
                $WpTermsModel = new WpTermsQuery();
                $term_id = $WpTermsModel->saveInTerm($tag);
                
                //Save or get Term Texanomy
                $WpTermTaxonomyModel = new WpTermTaxonomy();
                $term_texonomy_id = $WpTermTaxonomyModel->saveGet($term_id,$posttype);  

                //Save or get Term Texanomy in product terms
                $WpTermsQueryModel = new WpTermRelationships();
                $inDb = $WpTermsQueryModel->find()->where(["term_taxonomy_id"=>$term_texonomy_id,"object_id"=>$postId])->one();
                if($inDb){
                    continue;
                }else{
                    $WpTermsQueryModel = new WpTermRelationships();
                    $WpTermsQueryModel->term_taxonomy_id = $term_texonomy_id;
                    $WpTermsQueryModel->object_id = $postId;
                    $WpTermsQueryModel->save();    
                }
                
            }
        }else{
            $tag = $alltags;
            //Save Or Get Term
            $WpTermsModel = new WpTermsQuery();
            $term_id = $WpTermsModel->saveInTerm($tag,1);
            
            //Save or get Term Texanomy
            $WpTermTaxonomyModel = new WpTermTaxonomy();
            $term_texonomy_id = $WpTermTaxonomyModel->saveGet($term_id,$posttype);  

            //Save or get Term Texanomy in product terms
            $WpTermsQueryModel = new WpTermRelationships();
            $inDb = $WpTermsQueryModel->find()->where(["term_taxonomy_id"=>$term_texonomy_id,"object_id"=>$postId])->one();

            
            if($inDb){
                return true;
            }else{
                $WpTermsQueryModel = new WpTermRelationships();
                $WpTermsQueryModel->term_taxonomy_id = $term_texonomy_id;

                $WpTermsQueryModel->object_id = $postId;
                $WpTermsQueryModel->save();    
            }
        }
        /**PRODUCT END OF TAGS**/
    }



}


