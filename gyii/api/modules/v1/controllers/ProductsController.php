<?php

namespace api\modules\v1\controllers;

use common\models\ProductsQuery;
use common\models\WpTermsQuery;
use common\models\ProductTermsQuery;
use yii\db\Query;
use yii\rest\Controller;

/**
 * Country Controller API
 *
 * @author Budi Irawan <deerawan@gmail.com>
 */
class ProductsController extends Controller
{
    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products
    public function actionIndex($page=0){

        $productModel = new ProductsQuery();
        $offset = $page * 12;

        $productModel = $productModel->find();
        $productModel = $productModel->offset($offset)->limit(12)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return ["status"=>true,"msg"=>"Product list","data"=>$allProducts];
        Yii::app()->end();
    }

    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products
    public function actionBybrand($brand,$page=0){

        $WpTermsQueryModel = new WpTermsQuery();
        $pIds = $WpTermsQueryModel->findTag($brand,"category");

        $productModel = new ProductsQuery();
        $offset = $page * 12;

        $productModel = $productModel->find();
        $productModel = $productModel->where(["in","ID",$pIds]);
        $productModel = $productModel->offset($offset)->limit(12)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return ["status"=>true,"msg"=>"Product list by $brand","data"=>$allProducts];
        Yii::app()->end();
    }



    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products
    public function actionDetail($slug){

        $productModel = new ProductsQuery();
        $productDetail = $productModel->detail($slug);
        
        $ProductTermsQuery = new ProductTermsQuery();
        $tags = $ProductTermsQuery->productTags($productDetail['ID']);
        $productDetail['tags'] = $tags;

        return ["status"=>true,"msg"=>"Product list","data"=>$productDetail];
        Yii::app()->end();
    }
    
    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products/tag&tag=lips
    public function actionBytag($tag,$page=0){

        $WpTermsQueryModel = new WpTermsQuery();
        $pIds = $WpTermsQueryModel->findTag($tag);

        $productModel = new ProductsQuery();
        $offset = $page * 12;

        $productModel = $productModel->find();
        $productModel = $productModel->where(["in","ID",$pIds]);
        $productModel = $productModel->offset($offset)->limit(12)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return ["status"=>true,"msg"=>"Product list by $tag","data"=>$allProducts];
        Yii::app()->end();
    }


    //http://dis.deideo.com/gyii/api/web/index.php?r=v1/products/related&tag=lips
    public function actionRelated($tag,$page=0,$limit=6){

        $WpTermsQueryModel = new WpTermsQuery();
        $pIds = $WpTermsQueryModel->findTag($tag);

        $productModel = new ProductsQuery();
        $offset = $page * $limit;

        $productModel = $productModel->find();
        $productModel = $productModel->where(["in","ID",$pIds]);
        //$productModel = $productModel->where(["!=","LowestNewPrice","NA"]);
        $productModel = $productModel->offset($offset)->limit($limit)->orderBy(['id'=> SORT_DESC]);
        //echo $productModel->createCommand()->getRawSql();exit;
        $allProducts = $productModel->all();
        return ["status"=>true,"msg"=>"Product list by $tag","data"=>$allProducts];
        Yii::app()->end();
    }
}


