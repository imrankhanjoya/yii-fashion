<?php

namespace frontend\components;

use yii\base\Component;
use Yii;

class TextUtility extends Component {

	public function showTitle($title,$w){
		return substr($title,0,$w);
	}
}
