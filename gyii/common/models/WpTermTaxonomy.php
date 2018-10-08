<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "wp_term_taxonomy".
 *
 * @property string $term_taxonomy_id
 * @property string $term_id
 * @property string $taxonomy
 * @property string $description
 * @property string $parent
 * @property int $count
 */
class WpTermTaxonomy extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'wp_term_taxonomy';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_id', 'parent', 'count'], 'integer'],
            [['description'], 'required'],
            [['description'], 'string'],
            [['taxonomy'], 'string', 'max' => 32],
            [['term_id', 'taxonomy'], 'unique', 'targetAttribute' => ['term_id', 'taxonomy']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'term_taxonomy_id' => 'Term Taxonomy ID',
            'term_id' => 'Term ID',
            'taxonomy' => 'Taxonomy',
            'description' => 'Description',
            'parent' => 'Parent',
            'count' => 'Count',
        ];
    }

    public function saveGet($term_id,$type){
        $ttidfind = $this->findOne(["term_id"=>$term_id,"taxonomy"=>$type]);
        if(empty($ttidfind)){
            $this->term_id = $term_id; 
            $this->taxonomy = $type; 
            $this->description = 'Brand post category brand'; 
            $this->parent = 0; 
            $this->count = 0;
            if(!$this->save(true)){
                print_r($term_id);
                echo __LINE__;
                print_r($this->getErrors());
                exit;
            }else{
                $spttmid = $this->term_taxonomy_id;
            }
        }else{
           $spttmid = $ttidfind->term_taxonomy_id;
        }
        return $spttmid;

    }
}
